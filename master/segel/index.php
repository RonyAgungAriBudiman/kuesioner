<?php
if (isset($_POST['buatakun'])) {
}
?>


<section class="py-9">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mx-auto text-center mb-4">

				<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
					</symbol>
					<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
					</symbol>
					<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
					</symbol>
				</svg>


				<?php
				if ($alert == "0") {
				?>
					<div class="alert alert-primary d-flex align-items-center" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
							<use xlink:href="#check-circle-fill" />
						</svg>
						<div>
							<?php echo $note ?>
						</div>
					</div>
				<?php
				} else if ($alert == "1") {
				?>
					<div class="alert alert-warning d-flex align-items-center" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
							<use xlink:href="#exclamation-triangle-fill" />
						</svg>
						<div>
							<?php echo $note ?>
						</div>
					</div>
				<?php
				} ?>


				<h5 class="fw-light fs-3 fs-lg-5 lh-sm mb-4">Kuesioner Segel</h5>
				<p class="mb-0">Pada sesi pendaftaran ini anda dipersilahkan mengisi email dan nama pengguna yang nanti akan menjadi akun anda, pastikan email yang anda input adalah aktif</p>
			</div>
		</div>

		<div class="row flex-center h-100">
			<div class="col-xl-9 mb-8">
				<div class="row justify-content-center">
					<form method="post" autocomplete="off">
						<div class="form-group row mb-3">
							<label for="email_tujuan" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" style="background-color: #FFF;" id="email_tujuan" name="email_tujuan" required="required">
							</div>
						</div>
						<div class="form-group row mb-3">
							<label for="namapengguna" class="col-sm-2 col-form-label">Nama Pengguna</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" style="background-color: #FFF;" id="namapengguna" name="namapengguna" required="required">
							</div>
						</div>
						<div class="form-group row mb-3">
							<label for="nohp" class="col-sm-2 col-form-label">No Hp</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" style="background-color: #FFF;" id="nohp" name="nohp" required="required">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<h3 style="font-weight:bold; font-size:18px">Keandalan Produk</h3>
								<label for="keandalan" class="mb-2">1. Bagaimana menurut anda mutu produk kWh Meter kami?</label>
							</div>

							<div class="col-md-12 mb-2">
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal1" id="soal11" value="1">
									<label for="inlineRadio1" class="custom-control-label">Sangat Kurang</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal1" id="soal12" value="2">
									<label for="inlineRadio2" class="custom-control-label">Kurang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal1" id="soal13" value="3">
									<label for="inlineRadio1" class="custom-control-label">Sedang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal1" id="soal14" value="4">
									<label for="inlineRadio2" class="custom-control-label">Baik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal1" id="soal15" value="5">
									<label for="inlineRadio1" class="custom-control-label">Sangat Baik</label>
								</div>

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<label for="keandalan" class="mb-2">2. Bagaimana menurut anda fitur-fitur yang kami tawarkan?</label>
							</div>

							<div class="col-md-12 mb-2">
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal2" id="soal21" value="1">
									<label for="inlineRadio1" class="custom-control-label">Sangat Kurang</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal2" id="soal22" value="2">
									<label for="inlineRadio2" class="custom-control-label">Kurang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal2" id="soal23" value="3">
									<label for="inlineRadio1" class="custom-control-label">Sedang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal2" id="soal24" value="4">
									<label for="inlineRadio2" class="custom-control-label">Baik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal2" id="soal25" value="5">
									<label for="inlineRadio1" class="custom-control-label">Sangat Baik</label>
								</div>

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<h3 style="font-weight:bold; font-size:18px">Harga</h3>
								<label for="keandalan" class="mb-2">1. Apakah harga yang kami tawarkan sesuai dengan spesifikasi produk kami?</label>
							</div>

							<div class="col-md-12 mb-2">
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal3" id="soal31" value="1">
									<label for="inlineRadio1" class="custom-control-label">Sangat Kurang</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal3" id="soal32" value="2">
									<label for="inlineRadio2" class="custom-control-label">Kurang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal3" id="soal33" value="3">
									<label for="inlineRadio1" class="custom-control-label">Sedang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal3" id="soal34" value="4">
									<label for="inlineRadio2" class="custom-control-label">Baik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal3" id="soal35" value="5">
									<label for="inlineRadio1" class="custom-control-label">Sangat Baik</label>
								</div>

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<h3 style="font-weight:bold; font-size:18px">Pengiriman</h3>
								<label for="keandalan" class="mb-2">1. Bagaimana menurut anda ketepatan delivery produk kami?</label>
							</div>

							<div class="col-md-12 mb-2">
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal4" id="soal41" value="1">
									<label for="inlineRadio1" class="custom-control-label">Sangat Kurang</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal4" id="soal42" value="2">
									<label for="inlineRadio2" class="custom-control-label">Kurang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal4" id="soal43" value="3">
									<label for="inlineRadio1" class="custom-control-label">Sedang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal4" id="soal44" value="4">
									<label for="inlineRadio2" class="custom-control-label">Baik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal4" id="soal45" value="5">
									<label for="inlineRadio1" class="custom-control-label">Sangat Baik</label>
								</div>

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<h3 style="font-weight:bold; font-size:18px">Service dan Pelayanan</h3>
								<label for="keandalan" class="mb-2">1. Bagaimana service dan pelayanan dari kami ?</label>
							</div>

							<div class="col-md-12 mb-2">
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal5" id="soal51" value="1">
									<label for="inlineRadio1" class="custom-control-label">Sangat Kurang</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal5" id="soal52" value="2">
									<label for="inlineRadio2" class="custom-control-label">Kurang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal5" id="soal53" value="3">
									<label for="inlineRadio1" class="custom-control-label">Sedang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal5" id="soal54" value="4">
									<label for="inlineRadio2" class="custom-control-label">Baik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="custom-control-input" type="radio" name="soal5" id="soal55" value="5">
									<label for="inlineRadio1" class="custom-control-label">Sangat Baik</label>
								</div>

							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 mb-3">
								<h3 style="font-weight:bold; font-size:18px">Saran dan masukan anda untuk keandalan produk, harga pengiriman, service pelayanan, dan pengembangan produk kami <h3>
										<textarea name="saran" class="form-control" style="font-size:14px; background-color: #FFF;" rows="5"></textarea>
							</div>
						</div>




						<div class="form-group row mt-3">
							<div class="col-sm-10">
								<!-- <button type="submit" name="buatakun" class="btn btn-primary">Buat Akun</button> -->
								<input type="submit" name="buatakun" value="Buat Akun" class="btn btn-primary">
							</div>
						</div>


					</form>

				</div>
			</div>
		</div>
	</div>
</section>