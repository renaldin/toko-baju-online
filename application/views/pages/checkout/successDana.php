<!-- Halaman Checkout Dana Berhasil -->
<main role="main" class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<!-- Judul Card -->
				<div class="card-header bg-primary text-white">
					<strong>Checkout Berhasil</strong> <a class="btn-sm bg-white border-white"><img src="<?= base_url('/images/gambar/dana.png') ?>" width="60" alt=""></a>
				</div>
				<!-- Catatan Checkout Dana Berhasil -->
				<div class="card-body">
					<h5>Nomer Order: <?= $content->invoice ?></h5>
					<p>Terima kasih, sudah berbelanja.</p>
					<p>Silakan lakukan pembayaran untuk bisa kami proses selanjutnya dengan cara:</p>
					<ol>
						<li>Lakukan pembayaran pada nomor <strong>DANA <b>083854876787</b></strong> a/n E-Joys</li>
						<li>Total pembayaran: <strong>Rp<?= number_format($content->total, 0, ',', '.') ?>,-</strong></li>
					</ol>
					<p>Jika sudah, silakan kirimkan bukti transfer di halaman konfirmasi atau bisa <a href="<?= base_url("/myorder/detail/$content->invoice") ?>">klik disini</a>!</p>
					<p><strong>Catatan : </strong> Agar tidak ada kesalahan dalam melakukan pembayaran, alangkah baiknya halaman ini Anda screenshot!</p>
					<a href="<?= base_url('/') ?>" class="btn btn-primary text-white"><i class="fas fa-angle-left"></i> <b>Kembali</b></a>
				</div>
			</div>
		</div>
	</div>
</main>