

	<script>
		var id = 0;

		$(document).ready(function() {

			tampil_tamu()
			nama_jenisPengenal() 
			nama_perusahaan() 
			$('#tabel').DataTable({
				"language": {
					"decimal": "",
					"emptyTable": "Data Tidak Tersedia",
					"info": "Tampilkan _START_ - _END_ dari _TOTAL_ Data",
					"infoEmpty": "Showing 0 to 0 of 0 entries",
					"infoFiltered": "(filter dari _MAX_ total data)",
					"infoPostFix": "",
					"thousands": ",",
					"lengthMenu": "Tampilkan _MENU_ Data",
					"loadingRecords": "Loading...",
					"processing": "Proses...",
					"search": "Cari:",
					"zeroRecords": "Data Tidak Tersedia",
					"paginate": {
						"first": "First",
						"last": "Last",
						"next": "Lanjut",
						"previous": "Kembali"
					},
					"aria": {
						"sortAscending": ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
					}
				}
			});
			function tampil_tamu() {
				$.ajax({
					type: 'ajax',
					url: 'beranda/tampil_tamu',
					async: false,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var no = 1;
						for (i = 0; i < data.length; i++) {
							var dateTime_masuk = data[i].jam_masuk;
							var dateTIme_keluar = data[i].jam_keluar;
							if (dateTime_masuk === "0000-00-00 00:00:00") {
								dateTime_masuk = "-";
							}
							if (dateTIme_keluar === "00:00:00") {
								dateTIme_keluar = '<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#form-keluar" data-id="' + data[i].id_tamu + '"  data-nama="' + data[i].nama + '">Keluar</button>';
							}
							if(data[i].note_vendor != ""){
							note_vendor = '<button class="btn btn-xs btn-warning" style="padding-left: 10px;padding-right: 10px; margin-left: 3px" data-toggle="modal" data-target="#form-view-Note" data-nv="' + data[i].note_vendor + '"> <i class="fa fa-book"></i> </button>';
						}else{
							note_vendor = "";
						}
							html += '<tr id="' + data[i].id_tamu + '">' +
								'<td>' + no + '</td>' +
								'<td>' + data[i].wkt + '</td>' +
								'<td>' + data[i].nama + '</td>' +
								'<td>' + data[i].nama_perusahaan + '</td>' +
								'<td>' + dateTime_masuk + '</td>' +
								'<td>' + dateTIme_keluar + '</td>' +
								'<td>' +
								'<button class="btn btn-xs btn-success " style="padding-left: 10px;padding-right: 10px;" data-toggle="modal" data-target="#form-edit" id="btn-edit" data-id="' + data[i].id_tamu + '" data-nama="' + data[i].nama + '" data-jk="' + data[i].jenis_kelamin + '" data-jk="' + data[i].jenis_kelamin + '" data-ni="' + data[i].nomer_identitas + '" data-kn="' + data[i].keperluan + '" data-pn="' + data[i].perusahaan + '" data-nt="' + data[i].nomor_telepon + '" data-jp="' + data[i].jenis_pengenal + '"data-nv="' + data[i].note_vendor + '"> <i class="fa fa-pencil"></i></button> ' +
							'<button class="btn btn-xs btn-danger" style="padding-left: 10px;padding-right: 10px;" data-toggle="modal" data-target="#form-hapus" data-id="' + data[i].id_tamu + '"> <i class="fa fa-trash"></i> </button>' +
							'<button class="btn btn-xs btn-primary" style="padding-left: 10px;padding-right: 10px; margin-left: 3px" data-toggle="modal" data-target="#form-view" data-id="' + data[i].id_tamu + '" data-nama="' + data[i].nama + '" data-jk="' + data[i].jenis_kelamin + '" data-jk="' + data[i].jenis_kelamin + '" data-ni="' + data[i].nomer_identitas + '" data-kn="' + data[i].keperluan + '" data-pn="' + data[i].nama_perusahaan + '" data-jkr="' + data[i].jam_keluar + '" data-jmk="' + data[i].jam_masuk + '" data-nt="' + data[i].nomor_telepon + '" data-jp="' + data[i].jenis_pengenal + '"data-nv="' + data[i].note_vendor + '"> <i class="fa fa-eye"></i> </button>' +
							note_vendor + 
							'</td>' +
								'</td>' +
								'</tr>'
							no++;
						}
						$('#tampil_data').html(html);
					}

				});
			}
			function nama_jenisPengenal() {
				$.ajax({
					type: 'ajax',
					url: 'beranda/jenisTandaPengenal',
					async: false,
					dataType: 'json',
					success: function(data) {
						var html = '';
						for (var i = 0; i < data.length; i++) {
							html += '<option value="' + data[i].jenis_pengenal + '">' + data[i].jenis_pengenal + '</option>';
						}

						// Add the "Lainnya" option
						html += '<option value="other">Lainnya</option>';

						$('#nama_pengenal').html(html);
						$('#edit_nama_pengenal').html(html); // Assuming you have an element with id "edit_nama_pengenal"
					}
				});
			}
			function nama_perusahaan() {
				$.ajax({
					type: 'ajax',
					url: 'beranda/perusahaan',
					async: false,
					dataType: 'json',
					success: function(data) {
						var html = '';
						for (var i = 0; i < data.length; i++) {
							html += '<option value="' + data[i].id + '">' + data[i].nama_perusahaan + '</option>';
						}
						$('#nama_perusahaan').html(html);
						$('#edit_nama_perusahaan').html(html);
					}
				});
			}
			$('#form-keluar').on('show.bs.modal', function(event) {
				var html1 = '';
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var nama = button.data('nama');
				html1 += '<p class="text-center" style="font-weight: bold; font-size: 18px;">' + nama + '</p>';
				$('#keluar_idtamu').val(id);
				$('#nama_keluar').val(nama);
				$('#nama_keluar2').html(html1);
			})
			$('#btn-tambah').click(function() {
				var arg = {
					resultFunction: function(result) {
						var array_tamu = result.code;
						console.log(array_tamu);
						$('#input_nama').val("asdads");
						// document.getElementById("input_nama").innerHTML = array_tamu[0];
						// document.getElementById("input_jeniskelamin").innerHTML = array_tamu[1];
						// document.getElementById("input_alamat").innerHTML = array_tamu[2];
						// document.getElementById("input_nominal").innerHTML = array_tamu[3];
						// document.getElementById("result_tamu").innerHTML = array_tamu;
					}
				};
			})
			$('#btn-simpan').click(function() {
				$.ajax({
					url: 'Beranda/simpan',
					type: 'POST',
					data: $("#form-tambah form").serialize(),
					dataType: 'json',
					beforeSend: function() {
						// You can add any actions you want to perform before sending the request.
					},
					success: function(response) {
						// Reset input field display
						// Common actions after success or failure
						tampil_tamu();
						nama_jenisPengenal();

						if (response.status == 'sukses') {
							// Show success message
							document.getElementById("input_lainnya").style.display = "none";
							swal({
								title: "Sukses",
								type: "success",
								text: "Anda Telah Berhasil Mengiputkan Data",
								confirmButtonColor: "#469408"
							});
						} else {
							// Show error message
							swal({
								title: "Gagal",
								type: "error",
								text: "Data Yang Di Inputkan Harus Valid",
								showConfirmButton: false,
								timer: 1500
							});
						}

						// Always close the modal after success or failure
						$('#form-tambah').modal('hide');
					}
				});
			});
			$('#form-view').on('show.bs.modal', function(event) {
				var html1 = '';
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var nama = button.data('nama');
				var jk = button.data('jk');
				var ni = button.data('ni');
				var kn = button.data('kn');
				var pn = button.data('pn');
				var jmk = button.data('jmk');
				var jkr = button.data('jkr');
				var nt = button.data('nt');
				var jp = button.data('jp');
				if (jkr === "00:00:00") {
					var jkr = "-";
				}
				html1 += '<p class="text-center">Nama</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + nama + '</p></br>' + 
				'<p class="text-center">Jenis Kelamin</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + jk + '</p></br>' + 
				'<p class="text-center">Jenis Pengenal</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + jp + '</p></br>' +
				'<p class="text-center">Nomor Identitas</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + ni + '</p></br>' + 
				'<p class="text-center">Perusahaan</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + pn + '</p></br>' +
				'<p class="text-center">Nomor Telepon</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + nt + '</p></br>' + 
				'<p class="text-center">Keperluan</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + kn + '</p></br>' + 
				'<p class="text-center">Jam Masuk</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + jmk + '</p></br>' +
				'<p class="text-center">Jam Keluar</p>'+
				'<p class="text-center" style="font-weight: bold; font-size: 18px;">' + jkr + '</p></br>' 
				;
				$('#id_tamu').val(id);
				$('#detail_tamu').html(html1);
			})
			$('#btn-keluar').click(function() {
				id = $('#keluar_idtamu').val();
				$.ajax({
					url: 'beranda/ubahKeluar/' + id, // URL tujuan
					dataType: 'json',
					beforeSend: function() {},
					success: function(response) { // Ketika proses pengiriman berhasil
						if (response.status == 'sukses') {
							// Tampilkan Tabel
							tampil_tamu();
							// pesan sukses
							swal({
								title: "Sukses",
								type: "success",
								text: "Anda Telah Berhasil Memasukan Data Keluar",
								confirmButtonColor: "#469408"
							});

							$('#form-keluar').modal('hide')
						} else {
							// Tampilkan Tabel
							tampil_tamu();
							// pesan gagal
							swal({
								title: "Gagal",
								type: "error",
								text: "Gagal melakukan proses keluar",
								showConfirmButton: false,
								timer: 1500
							});

							$('#form-keluar').modal('hide')
						}
					}
				})
			})
		})
		
	</script>