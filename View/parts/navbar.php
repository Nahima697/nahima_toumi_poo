<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: rgba(255, 255, 255, 0.7);">
  <div class="container">
    <a class="navbar-brand text-center" href="index.php?controller=default&action=home"><img src="http://localhost/nahima_toumi_poo/uploads/logo.jpg" width="100" height="80"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-dark" href="index.php?controller=default&action=home">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="motosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Les Motos</a>
          <div class="dropdown-menu" aria-labelledby="motosDropdown">
            <?php foreach (MotoController::$types as $type): ?>
              <a class="dropdown-item" href="index.php?controller=motos&action=type&type=<?php echo $type; ?>"><?php echo $type; ?></a>
            <?php endforeach; ?>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if(isset($this->currentUser)): ?>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?controller=motos&action=list">Vos Motos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?controller=security&action=logout">Déconnexion</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?controller=security&action=login">Connexion</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
