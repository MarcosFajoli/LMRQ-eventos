<nav class="navbar navbar-dark fixed-top navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LMRQ Eventos</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Eventos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/eventos/criar">Criar eventos</a></li>
            <li><a class="dropdown-item" href="/eventos/editar">Editar eventos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/eventos">Visualizar eventos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contato">Contato</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="/eventos/" method="GET">
        <input class="form-control me-1" name="search" type="search" placeholder="Procurar um evento">
        <button class="btn btn-outline-light me-2" type="submit">Procurar</button>
      </form>
      <a class="btn btn-primary" href="/login">Faça login</a>
    </div>
  </div>
</nav>