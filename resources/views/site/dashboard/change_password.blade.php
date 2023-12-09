@extends('site.master')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

 <!-- Inner Banner -->
 <div class="inner-banner inner-bg6">
  <div class="container">
      <div class="inner-title">
          <ul>
              <li>
                  <a href="index.html">Home</a>
              </li>
              <li><i class='bx bx-chevron-right'></i></li>
              <li>Alterar Senha </li>
          </ul>
          <h3>Alterar Senha</h3>
      </div>
  </div>
</div>
<!-- Inner Banner End -->

<!-- Service Details Area -->
<div class="service-details-area pt-100 pb-70">
  <div class="container">
      <div class="row">
           <div class="col-lg-3">
            @include('site.dashboard.menu')
          </div>
          <div class="col-lg-9">
            <div class="service-article">
              <section class="checkout-area pb-70">
                <div class="container">
                  <form action="{{ route('profile.password.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="billing-details">
                          <h3 class="title">Alterar Senha   </h3>
                          <div class="row">
                            <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                <label>Senha Antiga<span class="required">*</span></label>
                                <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror">
                                @error('old_password')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                <label>Nova Antiga<span class="required">*</span></label>
                                <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                <label>Confirmar Senha<span class="required">*</span></label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                              </div>
                            </div>
                              <button type="submit" class="btn btn-danger">Salvar </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </section>
              </div>
          </div>
        </div>
      </div>
    </div>
  @endsection