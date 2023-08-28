<div id="form-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Masukkan Data Tamu</h5>
				</div>
				<div class="modal-body">
					<div id="result_tamu"></div>
					<form>
						<div class="form-group">
							<label class="control-label mb-10" for="nama">Nama</label>
							<input type="text" class="form-control" name="input_nama" id="nama" placeholder="Masukkan Nama" required>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nama_pengenal">Jenis Pengenal</label>
							<select class="form-control" name="input_namapengenal" id="nama_pengenal" required>
							</select>
						</div>
						<div id="input_lainnya" style="display: none;">
							<div class="form-group">
								<label class="control-label mb-10" for="input_lainnya">Jenis Pengenal Lainnya</label>
								<input type="text" class="form-control" name="input_lainnya" id="input_lainnya" required>
							</div>
						</div>
						<script>
							document.getElementById("nama_pengenal").addEventListener("change", function() {
								var selectedValue = this.value;
								if (selectedValue === "other") {
									document.getElementById("input_lainnya").style.display = "block";
								} else {
									document.getElementById("input_lainnya").style.display = "none";
								}
							});
						</script>
						<div class="form-group">
							<label class="control-label mb-10" for="nomor_iden">Nomor Identitas</label>
							<input type="text" class="form-control" name="input_nomor_iden" id="nomor_iden" placeholder="Masukkan Nomor Identitas" required>
						</div>
						<script>
							document.addEventListener("DOMContentLoaded", function () {
								var nomorIdenInput = document.getElementById("nomor_iden");
								var nomorTeleponInput = document.getElementById("nomor_Telepon");
								nomorIdenInput.addEventListener("input", function () {
									var val = nomorIdenInput.value;
									var numbers = /^[0-9]+$/;

									if (!val.match(numbers)) {
										nomorIdenInput.value = val.replace(/[^0-9]/g, '');
									}
								});
								nomorTeleponInput.addEventListener("input", function () {
									var val = nomorTeleponInput.value;
									var numbers = /^[0-9]+$/;

									if (!val.match(numbers)) {
										nomorTeleponInput.value = val.replace(/[^0-9]/g, '');
									}
								});
							});
						</script>

						<div class="form-group">
							<label class="control-label mb-10" for="nama_perusahaan">Nama Perusahaan</label>
							<select class="form-control" name="input_namaperusahaan" id="nama_perusahaan" required>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nomor_Telepon">Nomor Telepon</label>
							<input type="text" class="form-control" name="input_nomor_telepon" id="nomor_Telepon" placeholder="Masukkan Nomor Telepon" required>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="jenis_kelamin">Jenis Kelamin</label>
							<select class="form-control" name="input_jeniskelamin" id="jenis_kelamin" required>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="keperluan">Keperluan</label>
							<input type="text" class="form-control" name="input_keperluan" id="keperluan" placeholder="Masukkan Keperluan" required>
						</div>
						<input type="text" class="hidden" name="input_waktu" id="jam_masuk">
					</form>
				</div>
				<div class="modal-footer">
					<button id="btn-simpan" type="button" class="btn btn-sm btn-primary ">Simpan</button>
				</div>
			</div>
		</div>
	</div>