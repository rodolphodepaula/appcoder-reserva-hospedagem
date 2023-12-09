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
              <li>User Dashboard </li>
          </ul>
          <h3>User Dashboard</h3>
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
                  <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="billing-details">
                          <h3 class="title">Perfil   </h3>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                <label>Nome<span class="required">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                <label>E-mail <span class="required">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ $profile->email }}">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                  <label>Endereço <span class="required">*</span></label>
                                  <input type="text" name="address" class="form-control" value="{{ $profile->address }}">
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                  <label>Telefone <span class="required">*</span></label>
                                  <input type="text" name="phone" class="form-control"  value="{{ $profile->phone }}">
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                  <label>Foto Perfil  <span class="required">*</span></label>
                                  <input type="file" name="photo" id="image" class="form-control" />
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                  <img
                                    id="showImage"
                                    src="{{
                                    (! empty($profile->photo))
                                      ? url('upload/user_images/'.$profile->photo)
                                      : url('upload/no_image.jpg')
                                    }}"
                                    alt="Admin"
                                    class="rounded-circle p-1 bg-primary"
                                    width="80"
                                  >
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
    <!-- Service Details Area End -->
    <script type="text/javascript">
      $(document).ready(function () {
        $('#image').change(function(e) {
          var reader = new FileReader();
          reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
        });
      });

    </script>
  @endsection