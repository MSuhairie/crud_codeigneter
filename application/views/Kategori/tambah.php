<?php 
  $data['title'] = 'Tambah Kategori'; 
  $this->load->view('layout/header.php', $data);
  $this->load->view('layout/navbar.php');
?>
<form action="<?= site_url('insert-kategori') ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Nama Kategori</label>
    <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="nama_kategori" value="<?= set_value('nama_kategori') ?>">
    <div class="text-danger" style="font-size: 14px;">
      <?php echo form_error('nama_kategori'); ?>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?= site_url('kategori') ?>" class="btn btn-danger">Kembali</a>
</form>
<?php $this->load->view('layout/footer.php'); ?>