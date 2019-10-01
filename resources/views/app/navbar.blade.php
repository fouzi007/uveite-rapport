<section class="hero is-light app-bg">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div id="navbarMenuHeroA" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item {{ Request::path() === '/' ? 'is-active' : '' }}" href="{{ url('/') }}">
              <span class="icon"><i class="fas fa-home"></i> </span>
              <span>Accueil</span>
            </a>
            <a class="navbar-item {{ Request::path() === 'audience' ? 'is-active' : '' }}" href="{{ url('audience') }}">
              <span class="icon"><i class="fas fa-users"></i> </span>
              <span>Audience</span>
            </a>
            <a class="navbar-item {{ Request::path() === 'interaction' ? 'is-active' : '' }}" href="{{ url('interaction') }}">
              <span class="icon"><i class="fas fa-exchange-alt"></i> </span>
              <span>Interaction</span>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        <img src="{{ asset('img/logo_c.png') }}" style="width:200px" alt="Un regard sur l'Uvéite">
      </h1>
      <h2 class="subtitle">
        Rapport d'évènement
      </h2>
      <h4>
        {{ $pagename }}
      </h4>
    </div>
  </div>
  @yield('navbar.foot')
</section>
