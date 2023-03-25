<!-- Ha;aman Login -->
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header bg-primary text-white"><strong>Formulir Login</strong></div>
        <div class="card-body">
          <!-- Form Login -->
          <?= form_open('login', ['method' => 'POST']); ?>
          <div class="form-group">
            <label for="">Email</label>
            <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email', 'required' => true]); ?>
            <?= form_error('email'); ?>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'required' => true]); ?>
            <?= form_error('password'); ?>
          </div>
          <!-- Button Login -->
          <button type="submit" class="btn btn-primary">Login</button>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</main>