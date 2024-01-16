@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Atualizar Book Area</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Atualizar Book Area</li>
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
            <form action="{{ route('book.area.update') }}" method="post" enctype="multipart/form-data" id="myForm">
              @csrf
              <input type="hidden" name="id" value="{{ $book->id ?? '' }}">

            <div class="card-body">
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Título</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <input type="text" name="title" class="form-control @error('title')  is-invalid @enderror " value="{{ $book->title ?? '' }}" />
                  @error('title')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Sub-Título</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ $book->subtitle ?? '' }}" />
                  @error('subtitle')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Descrição</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <textarea name="description" id="description" rows="3" class="form-control" placeholder="Descrição" >{{ $book->description ?? '' }}</textarea>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Link</h6>
                </div>
                <div class="form-group col-sm-9 text-secondary">
                  <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"  value="{{ $book->link ?? '' }}" />
                  @error('link')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Imagem</h6>
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
                @if($book)
                <div class="col-sm-9 text-secondary">
                  <img
                    id="showImage"
                    src="{{ asset($book->image) }}"
                    alt="Admin"
                    class="rounded p-1 bg-primary"
                    width="80"
                  >
                </div>
                @endif
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