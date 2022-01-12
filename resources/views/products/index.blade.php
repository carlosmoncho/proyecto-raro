@extends('layouts.batoiPOP')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <table class="table" style=" width: 200px;" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th><th scope="col">Name</th><th>Actions <a href="{{route('product.create')}}" class="btn btn-sm btn-dark">New</a></th>
                    </tr>
                </thead>
                @if(\PHPUnit\Framework\isEmpty($products))
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td><td>{{ $product->name }}</td>
                        <td>
                            <a href="/delete/{{ $product->id }}"><i class="bi bi-trash"></i></a>
                            <a href="{{route('product.edit',$product->id)}}"><i class="bi bi-pencil"></i></a>
                            <a href="{{route('product.show',$product->id)}}"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
