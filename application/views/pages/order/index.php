<!-- Halaman Order Admin -->
<main role="main" class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <!-- Judul Card -->
        <div class="card-header bg-primary">
          <span class="text-white"><strong>Order</strong></span>
          <!-- Kolom pencarian -->
          <div class="float-right">
            <?= form_open(base_url('order/search'), ['method' => 'POST']); ?>
            <div class="input-group">
              <input type="text" name="keyword" class="form-control form-control-sm text-left" placeholder="Cari" value="<?= $this->session->userdata('keyword'); ?>" />
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary border-white btn-sm">
                  <i class="fas fa-search"></i>
                </button>
                <a href="<?= base_url('order/reset'); ?>" class="btn border-white btn-primary btn-sm">
                  <i class="fas fa-eraser"></i>
                </a>
              </div>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
        <div class="card-body">
          <!-- Tabel Order Admin -->
          <table class="table">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($content as $row) : ?>
                <tr>
                  <td>
                    <a href="<?= base_url("/order/detail/$row->id"); ?>"><strong>#<?= $row->invoice; ?></strong></a>
                  </td>
                  <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))); ?></td>
                  <td>Rp<?= number_format($row->total, 0, ',', '.'); ?>,-</td>
                  <td>
                    <?php $this->load->view('layouts/_status', ['status' => $row->status]); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- Pagination -->
          <nav aria-label="Page navigation example">
            <?= $pagination; ?>
          </nav>
        </div>
      </div>
    </div>
  </div>
</main>