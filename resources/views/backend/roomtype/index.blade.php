@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ms-auto">
      <div class="btn-group">
        <a href="{{ route('add.team') }}" class="btn btn-outline-primary px-5 radius-30"> Adicionar</a>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <h6 class="mb-0 text-uppercase">Tipo de Quartos</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Código</th>
              <th>Imagem</th>
              <th>Nome</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roomType as $key => $item)
            <tr>
              <td>{{ $key + 1}}</td>
              <td></td>
              <td>{{ $item->name }}</td>
              <td>
                <a href="{{ route('team.edit', $item->id) }}" class="btn btn-warning px-3 radius-30"> Editar</a>
                <a href="{{ route('team.delete', $item->id) }}" class="btn btn-danger px-3 radius-30" id="delete"> Excluir</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <hr/>
</div>



@endsection