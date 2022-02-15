<header>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="<?= BASE_URL ?>index.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?= BASE_URL ?>buku/buku.php">Buku</a>
        <a class="nav-item nav-link" href="<?= BASE_URL ?>member/member.php">Member</a>
        <a class="nav-item nav-link" href="<?= BASE_URL ?>pinjam/pinjam.php">Pinjam</a>
        <a class="nav-item nav-link" href="<?= BASE_URL ?>report.php">Report</a>
        <a class="nav-item nav-link ml-auto" href="<?= BASE_URL ?>logout.php" text>Logout</a>
      </div>
      
    </div>
  </nav>
</header>