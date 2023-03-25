<!-- Halaman Checkout Dana -->
<main role="main" class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card mb-3">
				<!-- Judul Card -->
				<div class="card-header bg-primary text-white"><strong>Formulir Alamat Pengiriman</strong></div>
				<div class="card-body">
					<!-- Form Checkout Dana -->
					<form action="<?= base_url("/checkout/createDana"); ?>" method="POST">
						<div class="form-group">
							<label for="">Metode Pembayaran Yang Dipilih</label>
							<input type="text" class="form-control" name="metode_pembayaran" value="Dana" readonly />
							<?= form_error('metode_pembayaran'); ?>
						</div>
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima" value="<?= $input->name; ?>" />
							<?= form_error('name'); ?>
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<textarea name="address" id="address" cols="30" rows="5" class="form-control"><?= $input->address; ?></textarea>
							<?= form_error('address'); ?>
						</div>
						<div class="form-group">
							<label for="">Telepon</label>
							<input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon penerima" value="<?= $input->phone; ?>" />
							<?= form_error('phone'); ?>
						</div>
						<div class="form-group">
							<label for="">Eskpedisi</label>
							<div class="row">
								<div class="col-md-12 text-center">
									<img src="<?= base_url('/images/ekspedisi/jne.png') ?>" width="150" alt="">
									<img src="<?= base_url('/images/ekspedisi/jnt.png') ?>" width="120" alt="">
									<img src="<?= base_url('/images/ekspedisi/sicepat.png') ?>" width="180" alt="">
									<img src="<?= base_url('/images/ekspedisi/ninja.png') ?>" width="100" alt="">
								</div>
							</div>
							<select name="ekspedisi" id="" class="form-control" recuired>
								<option value="">--Pilih Ekspedisi--</option>
								<option value="JNE Express">JNE Express</option>
								<option value="J&T Express">J&T Express</option>
								<option value="Sicepat">Sicepat</option>
								<option value="Ninja Express">Ninja Express</option>
							</select>
							<?= form_error('ekspedisi'); ?>
						</div>
						<!-- button checkout dana -->
						<button class="btn btn-primary" type="submit">Simpan</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3">
						<!-- Judul Card -->
						<div class="card-header bg-primary text-white">
							<strong>Keranjang</strong>
						</div>
						<div class="card-body">
							<!-- Tabel Keranjang -->
							<table class="table">
								<thead>
									<tr>
										<th>Produk</th>
										<th>Qty</th>
										<th>Harga</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($cart as $row) : ?>
										<tr>
											<td><?= $row->title ?></td>
											<td><?= $row->qty ?></td>
											<td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
										</tr>
										<tr>
											<td colspan="2">Subtotal</td>
											<td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2">Total</th>
										<th>Rp<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>,-</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>