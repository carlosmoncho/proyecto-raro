@extends('layouts.batoiPOP')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <table class="table" style=" width: 200px;" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th><th scope="col">Product</th><th scope="col">User</th><th scope="col">demanded Price</th><th scope="col">My Price</th><th scope="col">Situation</th><th>Actions</th>
                    </tr>
                </thead>
                @if(\PHPUnit\Framework\isEmpty($offers))
                <tbody>
                @foreach ($offers as $offer)
                    @if($offer->accepted === null)
                        <tr>
                        @elseif($offer->accepted)
                            <tr class="table-primary">
                        @else
                            <tr class="table-danger" >
                        @endif
                        <td>{{ $offer->id }}</td>
                        <td>{{ $offer->getProduct()->name }}</td>
                        <td>{{ $offer->ownerProduct($offer->product_id)->name }}</td>
                        <td>{{ $offer->getProduct()->original_price }}</td>
                        <td>
                            <form action="{{route('shopping.update', $offer->id)}}" method='POST'  >
                                @method('PUT')
                                @csrf
                                <input type="number" name="myPrice" id="myPrice" class="form-control" placeholder="Escribe el título aquí" value="{{ $offer->price }}">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary" style="padding:4px 20px;margin-top:25px;">Enviar</button>
                                </div>
                            </form>
                        </td>
                        <td>{{ $offer->getSituationSended() }}</td>
                        <td>
                            <a href="/deleteOffer/{{ $offer->id }}"><i class="bi bi-trash"></i></a>
                            <a href="{{route('product.show',$offer->product_id)}}"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>

        </div>
    </div>
</section>
@endsection
