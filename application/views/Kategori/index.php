<?php $this->load->view('layout/header.php'); ?>
<?php $this->load->view('layout/navbar.php'); ?>

<div class="d-flex flex justify-content-end">
	<a href="<?= site_url('tambah-kategori') ?>" class="btn btn-primary">Tambah Data</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach($kategori as $no => $data): ?>
    <tr>
      <td><?= $no+1 ?></td>
      <td><?= $data->nama_kategori ?></td>
      <td>
		<a href="<?= site_url('edit-kategori/'. $data->id_kategori) ?>" class="btn btn-warning">Edit</a>
		<a data-delete-url="<?= site_url('delete-kategori/'. $data->id_kategori) ?>" class="btn btn-danger" onclick="deleteConfirm(this)">Hapus</a>
	  </td>
    </tr>
	<?php endforeach ?>
  </tbody>
</table>

<?php $this->load->view('layout/footer.php'); ?>