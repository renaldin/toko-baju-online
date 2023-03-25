<!-- Halaman Daftar User -->
<main role="main" class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <!-- Judul Card -->
        <div class="card-header bg-primary">
          <span class="text-white"><strong>Pengguna</strong></span>
          <!-- Tombol tambah -->
          <a href="<?= base_url('user/create') ?>" class="btn border-white btn-sm btn-primary">Tambah</a>
          <!-- Kolom pencarian -->
          <div class="float-right">
            <form action="<?= base_url('user/search') ?>" method="POST">
              <div class="input-group">
                <input type="text" name="keyword" class="form-control form-control-sm text-left" placeholder="Cari" value="<?= $this->session->userdata('keyword'); ?>" />
                <div class="input-group-append">
                  <button type="submit" class="btn border-white btn-primary btn-sm">
                    <i class="fas fa-search"></i>
                  </button>
                  <a href="<?= base_url('user/reset'); ?>" class="btn border-white btn-primary btn-sm">
                    <i class="fas fa-eraser"></i>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card-body">
          <!-- Tabel User Admin -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Pengguna</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              foreach ($content as $row) : $no++; ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td>
                    <p>
                      <img src="<?= $row->image ? base_url("images/user/$row->image") : base_url("images/user/avatar.png") ?>" alt="" height="50">
                      <?= $row->name; ?>
                    </p>
                  </td>
                  <td><?= $row->email; ?></td>
                  <td><?= $row->role; ?></td>
                  <td><?= $row->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                  <td>
                    <?= form_open(base_url("user/delete/$row->id"), ['method' => 'POST']); ?>
                    <?= form_hidden('id', $row->id); ?>
                    <!-- Button Edit User Admin -->
                    <a href="<?= base_url("user/edit/$row->id"); ?>" class="btn btn-sm">
                      <i class="fas fa-edit text-info"></i>
                    </a>
                    <!-- Button Delete User Admin -->
                    <button class="btn btn-sm" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')">
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