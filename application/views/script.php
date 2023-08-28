

	<script>
		var id = 0;

		$(document).ready(function() {

			tampil_tamu()

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
		})
	</script>