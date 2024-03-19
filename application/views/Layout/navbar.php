<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= site_url() ?>">Codeigneter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= site_url() ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('kategori') ?>">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('berita') ?>">Berita</a>
        </li>
      </ul>
      <div class="btn-group">
        <button type="button" class="btn btn-outline-primary dropdown-toggle text-capitalize" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user"></i> <?= $this->session->nama ?>
        </button>
        <ul class="dropdown-menu">
          <li><button class="dropdown-item text-capitalize"><?= $this->session->username ?></button></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" data-delete-url="<?= site_url('logout'); ?>" onclick="logoutConfirm(this)"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>