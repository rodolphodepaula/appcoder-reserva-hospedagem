<div class="service-side-bar">
  <div class="services-bar-widget">
        <h3 class="title">{{ Auth::user()->name }}</h3>
        <div class="side-bar-categories">
          <img src="{{ asset('site/assets/img/blog/blog-profile1.jpg') }}" class="rounded mx-auto d-block" alt="Image" style="width:100px; height:100px;"> <br><br>
          <ul>
            <li>
              <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('user.profile') }}">Perfil</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">Alterar Senha</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">Detalhes da Reserva </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">Sair </a>
            </li>
          </ul>
        </div>
    </div>
</div>