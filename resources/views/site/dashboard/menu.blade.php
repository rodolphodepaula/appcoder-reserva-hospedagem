@php $profile = App\Models\User::find(Auth::user()->id ?? '') @endphp
<div class="service-side-bar">
  <div class="services-bar-widget">
        <h3 class="title text-center">Opções de acesso</h3>
        <div class="side-bar-categories">
          <img
            src="{{
              (! empty($profile->photo))
              ? url('upload/user_images/'.$profile->photo)
              : url('upload/no_image.jpg')
            }}"
            class="rounded mx-auto d-block mb-3"
            alt="Image"
            style="width:100px; height:100px;"
          >
          <div class="row flex ">
            <div class="col-md-12 text-center">
              <span class="form-text"><b>{{ $profile->name }}</b></span>
              </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <span class=" form-text">{{ $profile->email }}</span>
                </div>
              </div>
          <br><br>
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
                <a href="{{ route('profile.logout') }}">Sair </a>
            </li>
          </ul>
        </div>
    </div>
</div>