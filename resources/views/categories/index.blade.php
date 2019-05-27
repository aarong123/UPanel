@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif

    <div class="wrapper">
        <form class="formulario" method="post" action="{{ url('category/register') }}">
            @csrf
            <p class="title">Creación de categor&iacute;as</p>
            <input type="text" placeholder="Nombre" name="name"/>
            <i class="fa fa-signature"></i>

            <input type="text" placeholder="Descripci&oacute;n" name="description">
            <i class="fa fa-file-alt"></i>
            <button>
                <i class="spinner"></i>
                <span class="state">Crear</span>
            </button>
        </form>
    </div>

    <br>

    <div class="card">
        <div class="card-header">
            Listado de categor&iacute;as
        </div>
        <div class="card-body">
            <table class="table table-hover table-dark mt-5" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripci&oacute;n</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ ($category->deleted_at) ? "Desactivado" : "Activado" }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Seleccionar opción
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                       href="{{ url('/category/edit/' . $category->id) }}">Editar</a>
                                    <div class="dropdown-divider"></div>
                                    @if($category->deleted_at)

                                        <form method="post" action="{{ url('/category/active/' . $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Activar
                                            </button>
                                        </form>
                                    @else
                                        <form method="post" action="{{ url('/category/deactive/' . $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Desactivar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <div style="text-align:center; margin: 0 auto;">
                <a href="{{ url('category/trashed') }}" class="btn btn-primary">Activar categor&iacute;a</a>
            </div>
        </div>
    </div>

    <br>
    <div style="width: 1500px; margin: 0 auto;">
        <a href="{{ url('/main') }}" class="btn btn-primary">Ir al men&uacute; principal</a>
    </div>
    <br>
@stop
