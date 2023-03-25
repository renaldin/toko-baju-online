<!-- Halaman Category -->
<main role="main" class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-header text-white bg-primary">
          <!-- Judul Card Category -->
          <span><strong>Kategori</strong></span>
          <!-- Tombol tambah -->
          <a href="<?= base_url('category/create'); ?>" class="btn btn-sm btn-primary border-white">Tambah</a>
          <!-- Kolom pencarian -->
          <div class="float-right">
            <?= form_open(base_url('category/search'), ['method' => 'POST']); ?>
            <div class="input-group">
              <input type="text" name="keyword" class="form-control form-control-sm text-left" placeholder="Cari" value="<?= $this->session->userdata('keyword'); ?>" />
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary border-white btn-sm">
                  <i class="fas fa-search"></i>
                </button>
                <a href="<?= base_url('category/reset'); ?>" class="btn border-white btn-primary btn-sm">
                  <i class="fas fa-eraser"></i>
                </a>
              </div>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
        <div class="card-body">
          <!-- Tabel Category -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              foreach ($content as $row) : $no++ ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $row->title; ?></td>
                  <td><?= $row->slug; ?></td>
                  <td>
                    <?= form_open("category/delete/$row->id", ['method' => 'POST']); ?>
                    <?= form_hidden('id', $row->id); ?>
                    <!-- button edit -->
                    <a href="<?= base_url("category/edit/$row->id"); ?>" class="btn btn-sm">
                      <i class="fas fa-edit text-info"></i>
                    </a>
                    <!-- button delete -->
                    <button type="submit" onclick="return confirm('Apakah yakin ingin menghapus ?')" class="btn btn-sm">
                      <i class="fas fa-trash text-danger"></i>
                    </button>
                    <?= form_close(); ?>
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