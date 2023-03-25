<!-- Halaman Konfirmasi Bank Transfer -->
<main role="main" class="container">
  <div class="row">
    <!-- Menu Kiri -->
    <div class="col-md-3">
      <?php $this->load->view('layouts/_menu'); ?>
    </div>
    <div class="col-md-9">
      <div class="card-md-12">
        <!-- Judul Card -->
        <div class="card-header">
          Konfirmasi Order #<?= $order->invoice; ?>
          <div class="float-right">
            <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
          </div>
        </div>
        <!-- Card body dan footer -->
        <?= form_open_multipart($form_action, ['method' => 'POST']); ?>
        <?= form_hidden('id_orders', $order->id); ?>
        <div class="card-body">
          <div class="form-group">
            <label for="">Transaksi</label>
            <input type="text" class="form-control" value="<?= $order->invoice; ?>" readonly />
          </div>
          <div class="form-group">
            <label for="">Dari Rekening a/n</label>
            <input type="text" name="account_name" class="form-control" value="<?= $input->account_name; ?>" />
            <?= form_error('account_name'); ?>
          </div>
          <div class="form-group">
            <label for="">No Rekening a/n</label>
            <input type="text" name="account_number" class="form-control" value="<?= $input->account_number; ?>" />
            <?= form_error('account_number'); ?>
          </div>
          <div class="form-group">
            <label for="">Sebesar</label>
            <input type="number" class="form-control" name="nominal" value="<?= $input->nominal; ?>" />
            <?= form_error('nominal'); ?>
          </div>
          <div class="form-group">
            <label for="">Catatan</label>
            <textarea name="note" id="description" cols="30" rows="5" class="form-control">-</textarea>
          </div>
          <div class="form-group">
            <label for="">Bukti Transfer</label><br />
            <input type="file" name="image" id="image" />
            <?php if ($this->session->flashdata('image_error')) : ?>
              <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
            <?php endif ?>
          </div>
        </div>
        <!-- Button Konfirmasi Pembayaran -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</main>