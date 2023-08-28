

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
							html += '<tr id="' + data[i].id_tamu + '">' +
								'<td>' + no + '</td>' +
								'<td>' + data[i].wkt + '</td>' +
								'<td>' + data[i].nama + '</td>' +
								'<td>' + data[i].nama_perusahaan + '</td>' +
								'<td>' + dateTime_masuk + '</td>' +
								'<td>' + dateTIme_keluar + '</td>' +
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

		})
	</script>