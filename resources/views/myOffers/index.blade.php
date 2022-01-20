@extends('layouts.batoiPOP')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <table class="table" style=" width: 200px;" >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th><th scope="col">Product</th><th scope="col">User</th><th scope="col">Demanded Price</th><th scope="col">Offer Price</th><th scope="col">Situation</th><th>Actions</th>
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
                                <td>{{ $offer->getUser()->name }}</td>
                                <td>{{ $offer->getProduct()->original_price }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ $offer->getSituationAttribute() }}</td>
                                <td>
                                    <a href="/accepted/{{$offer->id}}"><i class="bi bi-hand-thumbs-up"></i></a>
                                    <a href="/rejected/{{$offer->id}}"><i class="bi bi-hand-thumbs-down"></i></a>
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
