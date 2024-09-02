<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:#FCF8F3;"> Time Library - Sebo Online</a>

    <!-- Botão de alternância da barra de navegação para dispositivos móveis
    Lembrar de ajustar o botao da NavBar para aparelho mobiles, está muito escondida. -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" style="color: #FFFFFF; " href="../loja/tela_loja.php">Loja</a>
      </li>
    </ul>

    <!-- Conteúdo da navbar, centralizado -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <form action="" method="get" class="d-flex mx-auto" role="search">
        <input class="form-control me-2" name="query" type="search" placeholder="Pesquise aqui" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>

      <!-- Dropdown do perfil -->
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <strong class="ms-2">Opções</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow dropdown-menu-end" aria-labelledby="dropdownUser1" style="min-width: 150px;">
          <li><a class="dropdown-item" href="#">Perfil</a></li>

          <li><a class="dropdown-item" href="#">Configurações</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Sair</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>


<!-- Scripts do Bootstrap -->
<script src="../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/public/bootstrap-5.3.3-dist/js/bootstrap.js"></script>