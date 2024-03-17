<?php $this->load->view('layout/header.php'); ?>
<?php $this->load->view('layout/navbar.php'); ?>
<form action="<?= site_url('update-kategori/'. $kategori->id_kategori) ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Nama Kategori</label>
    <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="nama_kategori" value="<?= $kategori->nama_kategori ?>">
    <?php if ($this->session->flashdata('error')): ?>
      <font style="color: red; font-size: 13px; font-style: italic;"><?= $this->session->flashdata('error'); ?></font>
    <?php endif; ?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?= site_url('kategori') ?>" class="btn btn-danger">Kembali</a>
</form>
<?php $this->load->view('layout/footer.php'); ?>