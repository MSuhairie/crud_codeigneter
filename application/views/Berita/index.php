<?php 
  $data['title'] = 'Data Berita'; 
  $this->load->view('layout/header.php', $data);
  $this->load->view('layout/navbar.php');
?>

<div class="d-flex flex justify-content-end">
	<a href="<?= site_url('tambah-berita') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Isi</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Gambar</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach($berita as $no => $data): ?>
    <tr>
      <td><?= $no+1 ?></td>
      <td><?= $data->judul ?></td>
      <td><?= $data->isi ?></td>
      <td><?= $data->tanggal ?></td>
      <td>
        <img src="<?= base_url('uploads/'. $data->gambar) ?>" width="50">
      </td>
      <td>
		<a href="<?= site_url('edit-berita/'. $data->id_berita) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
		<a data-delete-url="<?= site_url('delete-berita/'. $data->id_berita) ?>" class="btn btn-danger" onclick="deleteConfirm(this)"><i class="fa fa-trash"></i></a>
	  </td>
    </tr>
	<?php endforeach ?>
  </tbody>
</table>

<?php $this->load->view('layout/footer.php'); ?>