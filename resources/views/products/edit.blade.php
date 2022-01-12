@extends('layouts.batoiPOP')
@section('content')
    <h1>Nuevo Producto</h1>
    <form action="{{route('product.update', $product->id)}}" method='POST' enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Escribe el título aquí" value="{{$errors->any() ?  old('name') : $product->name}}">
            @if ($errors->has('name'))
                <div class="text-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="original_price">Precio Original</label>
            <input type="text" name="original_price" id="original_price" class="form-control" placeholder="Escribe el título aquí" value="{{$errors->any() ? old('original_price') : $product->original_price }}">
            @if ($errors->has('original_price'))
                <div class="text-danger">
                    {{ $errors->first('original_price') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="discount_price">Precio Descuento</label>
            <input type="text" name="discount_price" id="discount_price" class="form-control" placeholder="Escribe el título aquí" value="{{$errors->any() ? old('discount_price') : $product->discount_price}}">
            @if ($errors->has('discount_price'))
                <div class="text-danger">
                    {{ $errors->first('discount_price') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="discount_price">Sale: </label>
            <select id="sale" name="sale">
                @if($product->sale == 1)
                <option value="1">yes</option>
                <option value="0">no</option>
                @else
                    <option value="0">no</option>
                    <option value="1">yes</option>
                @endif
            </select>
        </div>
        <div class="category_id">
            <label for="category_id">Categoria: </label>
            <select id="category_id" name="category_id">
                <option value="{{$product->category_id}}">{{$categoriaProduct->name}}</option>
                @foreach($categories as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">Imagen</label>
            <input type="file" name="img">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Afegir post</button>
        </div>
    </form>
@endsection
