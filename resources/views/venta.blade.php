@extends('layouts.landing')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Venta de {{$producto->nombre}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('vendido',$producto->id)}}">
        @csrf
        @method('put')

      <div class="card-body">
        <div class="form-group">
            <label >En stock: {{$producto->stock}}</label>
            <br>
          <label for="exampleInputEmail1">Cantidad a comprar</label>
          <input type="number" name="vendido" class="form-control" id="exampleInputEmail1" placeholder="Escriba aqui la cantidad que desea comprar">
        </div>



      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Comprar</button>
      </div>
    </form>
  </div>
    @endsection
