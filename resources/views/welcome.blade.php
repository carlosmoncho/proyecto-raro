@extends('layouts.batoiPOP')
@section('content')
    @foreach($products as $validProduct)
        @include('products.fitxa')
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
