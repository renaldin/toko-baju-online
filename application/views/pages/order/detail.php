<!-- Halaman Detail Order Admin/Penjual -->
<main role="main" class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <!-- Isi 1 -->
      <div class="row mb-3">
        <div class="col-md-12">
          <div class="card">
            <!-- Judul Card -->
            <div class="card-header bg-primary text-white">
              <strong>Detail Order #<?= $order->invoice; ?></strong>
              <div class="float-right">
                <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
              </div>
            </div>
            <div class="card-body">
              <p>Tanggal : <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))); ?></p>
              <p>Nama : <?= $order->name; ?></p>
              <p>Telepon : <?= $order->phone; ?></p>
              <p>Alamat : <?= $order->address; ?></p>
              <!-- Metode Pembayaran -->
              <?php if ($order->metode_pembayaran == 'Bank Transfer') { ?>
                <p>Metode Pembayaran : <?= $order->metode_pembayaran; ?> <img src="<?= base_url('/images/gambar/bank.png') ?>" width="70" alt=""></p>
              <?php } else if ($order->metode_pembayaran == 'Dana') { ?>
                <p>Metode Pembayaran : <?= $order->metode_pembayaran; ?> <img src="<?= base_url('/images/gambar/dana.png') ?>" width="70" alt=""></p>
              <?php } ?>
              <!-- Ekspedisi -->
              <?php if ($order->ekspedisi == 'JNE Express') { ?>
                <p>Ekspedisi : <?= $order->ekspedisi; ?> <img src="<?= base_url('/images/ekspedisi/jne.png') ?>" width="70" alt=""></p>
              <?php } else if ($order->ekspedisi == 'J&T Express') { ?>
                <p>Ekspedisi : <?= $order->ekspedisi; ?> <img src="<?= base_url('/images/ekspedisi/jnt.png') ?>" width="70" alt=""></p>
              <?php } else if ($order->ekspedisi == 'Sicepat') { ?>
                <p>Ekspedisi : <?= $order->ekspedisi; ?> <img src="<?= base_url('/images/ekspedisi/sicepat.png') ?>" width="70" alt=""></p>
              <?php } else if ($order->ekspedisi == 'Ninja Express') { ?>
                <p>Ekspedisi : <?= $order->ekspedisi; ?> <img src="<?= base_url('/images/ekspedisi/ninja.png') ?>" width="70" alt=""></p>
              <?php } ?>
              <!-- Tabel Order Admin -->
              <table class="table">
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order_detail as $row) : ?>
                    <tr>
                      <td>
                        <p><img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png"); ?>" alt="" height="50" /> <strong><?= $row->title; ?></strong></p>
                      </td>
                      <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.'); ?>,-</td>
                      <td class="text-center"><?= $row->qty; ?></td>
                      <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.'); ?>,-</td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Total : </strong></td>
                      <td class="text-center"><strong>Rp<?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.'); ?>,-</strong></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer bg-primary">
              <form action="<?= base_url("order/update/$order->id"); ?>" method="POST">
                <input type="hidden" name="id" value="<?= $order->id; ?>">
                <div class="input-group">
                  <select name="status" id="" class="form-control">
                    <option value="waiting" <?= $order->status == 'waiting' ? 'selected' : ''; ?>>Menunggu</option>
                    <option value="paid" <?= $order->status == 'paid' ? 'selected' : ''; ?>>Dibayar</option>
                    <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : ''; ?>>Dikirim</option>
                    <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : ''; ?>>Dibatalkan</option>
                  </select>
                  <div class="input-group-append">
                    <button class="btn btn-primary border-white" type="submit">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Jika Sudah Dikonfirmasi -->
      <!-- isi 2 -->
      <?php if (isset($order_confirm)) : ?>
        <div class="row mb-3">
          <div class="col-md-8 mb-3">
            <div class="card">
              <div class="card-header text-white bg-primary"><strong>Bukti Transfer</strong></div>
              <div class="card-body">
                <p>No Rekening : <?= $order_confirm->account_number; ?></p>
                <p>Atas Nama : <?= $order_confirm->account_name; ?></p>
                <p>Nominal : Rp<?= number_format($order_confirm->nominal, 0, ',', '.'); ?>,-</p>
                <p>Catatan : <?= $order_confirm->note; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <img src="<?= base_url("/images/confirm/$order_confirm->image"); ?>" alt="" height="200" />
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</main>