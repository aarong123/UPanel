@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif
    @foreach ($errors->all() as $message)
    {{ $message }}
@endforeach
    <div class="wrapper">
        <form class="formulario1" method="post" action="{{ url('sale/register') }}">
            @csrf
            <p class="title">Registro de venta</p>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">Producto (*)</label>
                <div class="col-md-6">
                    <select class="form-control" name="item_id">
                        <option disabled value="0">Seleccione un producto</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 form-control-label">clientes (*)</label>
                <div class="col-md-6">
                    <select class="form-control" name="id_client">
                        <option disabled value="0">Seleccione un cliente</option>
                        @foreach($persons as $person)
                            <option value="{{ $person->id }}">
                                {{ $person->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 form-control-label">Cantidad (*)</label>
                <div class="col-md-6">
                    <input type="number" placeholder="Ingrese la cantidad" name="quantity">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 form-control-label">Precio (*)</label>
                <div class="col-md-6">
                    <input type="number" placeholder="Ingrese el precio" name="price">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">discount (*)</label>
                <div class="col-md-6">
                    <input type="number" placeholder="discount" name="discount">
                </div>
            </div>            
            <div style="text-align:center; padding:40px 0px 0px 0px;">
                <button type="submit" class="btn btn-primary">
                    <i class="spinner"></i>
                    Registrar venta
                </button>
            </div>
        </form>
    </div>
    <br>
    <div>
        <a href="{{ url('/sale') }}" class="btn btn-primary" style="text-align:center">Atr&aacute;s</a>
    </div>
    <br>
@stop