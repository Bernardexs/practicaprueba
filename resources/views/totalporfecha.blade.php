@extends('layouts.landing')
@section('content')
<table class="table table-striped projects col-md-10 offset-md-1 "  >
    <thead >
        <tr>
          

            <th style="width: 20%">
                Fecha de Venta
            </th>
            <th style="width: 20%">
                Venta total
            </th>

        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $fecha=>$culo)
        <tr>
            <td>
                {{$fecha}}
            </td>
            <td>
                {{$culo}}
            </td>



        </tr>


@endforeach

    </tbody>
</table>


@endsection
