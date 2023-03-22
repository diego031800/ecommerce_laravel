@extends('adminlte::page')

@section('title', 'DON PEPE')

@section('content_header')
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="mb-4 mt-4" style="text-align: center;font-weight: bold;font-family: 'Segoe UI';">CREAR NUEVO PRODUCTO</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body rounded">
        <div class="row p-5">
            <div class="col-12">
                <form action="{{route('productos.update',$producto)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="mb-3">
                                <label class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$producto->name)}}">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Stock del producto</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{old('stock',$producto->stock)}}">
                            </div>
                            @error('stock')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion" cols="30" rows="5" class="form-control @error('descripcion') is-invalid @enderror">
                                    {{old('descripcion',$producto->descripcion)}}
                                </textarea>
                            </div>
                            @error('descripcion')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label class="form-label">Precio</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{old('precio',$producto->precio)}}">
                                </div>
                            </div>
                            @error('precio')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-12">
                            <div class="mb-3">
                                <label class="form-label">Imagen del Producto</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    <input type="file" class="form-control @error('imagen') is-invalid @enderror" accept="image/*" name="imagen" id="imagen" value="{{old('imagen')}}">
                                </div>
                            </div>
                            @error('imagen')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-5 col-12" id="imagePreview">
                            <img src="{{$producto->imagen}}" id="img-data" class="rounded mx-auto d-block" style="width: 200px" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Proveedor</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    <select class="form-control @error('proveedore_id') is-invalid @enderror" name="proveedore_id">
                                        <option selected disabled>Selecciona el proveedor</option>
                                        @foreach ($proveedores as $proveedore)
                                            <option value="{{$proveedore->id}}" @if ($proveedore->id == $producto->proveedore_id) selected @endif>{{$proveedore->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('proveedore_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Categoría</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option selected disabled>Selecciona la categoría</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if ($category->id == $producto->category_id) selected @endif >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <a href="{{route('productos.cancelar')}}" class="mt-3 btn btn-danger"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp; Cancelar</a>
                        </div>
                        <div class="col-4 text-center">
                            <button type="submit" class="mt-3 btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp; Enviar</button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>
        (function()
        {
            function filePreview(input)
            {
                if(input.files && input.files[0])
                {
                    var reader = new FileReader();

                    reader.onload = function(e)
                    {
                        $('#imagePreview').html("<img src='" + e.target.result + "' class='rounded mx-auto d-block' style='width: 200px;'/>");
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#imagen').change(function()
            {
                filePreview(this);
                document.querySelector('#img-data').remove();
            });
        })();
    </script>
@endsection
