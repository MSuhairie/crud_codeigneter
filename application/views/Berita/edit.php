<?php 
  $data['title'] = 'Edit Berita'; 
  $this->load->view('layout/header.php', $data);
  $this->load->view('layout/navbar.php');
?>
<form action="<?= site_url('update-berita/'. $berita->id_berita) ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul" value="<?= $berita->judul ?>">
    <div class="text-danger" style="font-size: 14px;">
      <?php echo form_error('judul'); ?>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Isi Berita</label>
    <input type="text" class="form-control" placeholder="Masukkan Isi Berita" name="isi" value="<?= $berita->isi ?>">
    <div class="text-danger" style="font-size: 14px;">
      <?php echo form_error('isi'); ?>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Tanggal</label>
    <input type="date" class="form-control" placeholder="Masukkan Tanggal" name="tanggal" value="<?= $berita->tanggal ?>">
    <div class="text-danger" style="font-size: 14px;">
      <?php echo form_error('tanggal'); ?>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Gambar</label>
    <input type="file" class="form-control" placeholder="Masukkan Gambar" name="gambar">
    <div class="text-danger" style="font-size: 14px;">
      <?php echo form_error('gambar'); ?>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?= site_url('berita') ?>" class="btn btn-danger">Kembali</a>
</form>
<?php $this->load->view('layout/footer.php'); ?>