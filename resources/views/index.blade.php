@extends('layouts.landing')
@section('content')
<div class="card card-primary col-md-10 offset-md-1">
    <div class="card-header col-md-12">
      <h3 class="card-title">Registro de Libro</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('store')}}">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre de producto</label>
          <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" >
        </div>

        <div class="form-group">
            <label for="exampleInputEmail3">fecha de vencimiento</label>
            <input type="date" name="fechaVencimiento" class="form-control" id="exampleInputEmail3" >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail3">precio</label>
            <input type="text" name="precio" class="form-control" id="exampleInputEmail3" pattern="[0-9]+([\.,][0-9]+)?" title="Ingrese un número decimal válido">
        </div>

          <div class="form-group">
            <label for="exampleInputEmail3">cantidad en stock</label>
            <input type="number" name="stock" class="form-control" id="exampleInputEmail3" >
          </div>

        <label for="inputStatus">Categoria</label>
        <select name="categoria_id" id="inputStatus" class="form-control custom-select">
            @foreach ($categoria as $item )



            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach

          </select>

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </form>
</div>
<div class="row mb-3" >
    <div class="col-md-10 offset-md-1 ">
        <form action="">
            <div class="input-group">
                <input name="buscar" type="search" class="form-control form-control-lg" placeholder="Buscar por categoria">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<table class="table table-striped projects col-md-10 offset-md-1 "  >
    <thead >
        <tr>
            <th style="width: 1%">
                #
            </th>
            <th style="width: 20%">

Producto            </th>
            <th style="width: 20%">
                Fecha de vencimiento
            </th>
            <th style="width: 20%">
                precio
            </th>
            <th style="width: 20%">
                cantidad en stock
            </th>
            <th style="width: 20%">
                categoria
            </th>
            <th style="width: 30%">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
@foreach($productos as $item)
        <tr>
            <td>
                {{$item->id}}
            </td>
            <td>
                {{$item->nombre}}
            </td>
            <td>
                {{$item->fechaVencimiento}}
             </td>
             <td>
                {{$item->precio}}
             </td>
             <td>
                {{$item->stock}}
             </td>
             <td>
                {{$item->categoria}}
             </td>
            <td class="project-actions ">

                <a class="btn btn-info btn-sm" href="{{route('venta',$item->id)}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Vender
                </a>
                <form action="{{route('destroy',$item->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" >
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </td>

        </tr>


@endforeach

    </tbody>
</table>
@endsection
