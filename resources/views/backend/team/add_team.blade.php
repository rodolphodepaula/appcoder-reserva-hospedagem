@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Adicionar Equipe</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Adicionar Equipe</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Settings</button>
        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
          <a class="dropdown-item" href="javascript:;">Another action</a>
          <a class="dropdown-item" href="javascript:;">Something else here</a>
          <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
        </div>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="container">
    <div class="main-body">
      <div class="row">

        <div class="col-lg-8">
          <div class="card">
            <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data" id="myForm">
              @csrf

            <div class="card-body">
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nome</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <input type="text" name="name" class="form-control @error('name')  is-invalid @enderror " />
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Postion</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <input type="text" name="postion" class="form-control @error('postion') is-invalid @enderror" />
                  @error('postion')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Facebook</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" />
                  @error('facebook')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Photo</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <input type="file" name="image" id="image" class="form-control  @error('image') is-invalid @enderror" />
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0"> </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <img
                    id="showImage"
                    src="{{ url('upload/no_image.jpg') }}"
                    alt="Admin"
                    class="rounded p-1 bg-primary"
                    width="80"
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                  <input type="submit" class="btn btn-primary px-4" value="Salvar" />
                </div>
              </div>
            </div>
          </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function (){
      $('#myForm').validate({
          rules: {
              name: {
                  required : true,
              },
              postion: {
                  required : true,
              },
              facebook: {
                  required : true,
              },
              image: {
                  required : true,
              },
          },
          messages :{
              name: {
                  required : 'Please Enter Team Name',
              },
              postion: {
                  required : 'Please Enter Team Postion',
              },
              facebook: {
                  required : 'Please Enter Facebook Url',
              },
              image: {
                  required : 'Please Select Image',
              },
          },
          errorElement : 'span',
          errorPlacement: function (error,element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
          },
          highlight : function(element, errorClass, validClass){
              $(element).addClass('is-invalid');
          },
          unhighlight : function(element, errorClass, validClass){
              $(element).removeClass('is-invalid');
          },
      });
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
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