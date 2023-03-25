<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.80.0" />

  <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/navbar-fixed/" />

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url() ?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->


  <!-- Fontawesome -->
  <link href="<?= base_url() ?>assets/libs/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180" />
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png" />
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png" />
  <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json" />
  <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c" />
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico" />
  <meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml" />
  <meta name="theme-color" content="#563d7c" />

  <!-- My css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css" />

  <title><?= isset($title) ? 'E-Joys | ' . $title : 'E-Joys'; ?></title>
</head>

<body style="background-color: rgb(234, 234, 250);">

  <!-- Navbar -->
  <?php $this->load->view('layouts/_navbar'); ?>
  <!-- End Navbar -->

  <!-- Content -->
  <?php $this->load->view($page); ?>
  <!-- End Content -->

  <!-- Optional JavaScript; choose one of the two! -->

  <script src="<?= base_url() ?>assets/libs/jquery/jquery-3.6.0.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>