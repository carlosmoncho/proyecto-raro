<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->
        @if($validProduct->sale)
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 12rem">Sale</div>
        @endif
        @if($validProduct->category)
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><a href="/?show=categories&category={{$validProduct->category_id}}" > {{$validProduct->category->name}}  </a></div>
        @endif
        <!-- Product image-->
        @if($validProduct->img)
            <img class="card-img-top" height="300px" src="{{$validProduct->img}}" alt="..." />
        @else
            <img class="card-img-top" src="http://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
        @endif
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"> {{$validProduct->name}}</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    @for($i=0;$i<$validProduct->stars;$i++):
                        <div class="bi-star-fill"></div>
                    @endfor
                </div>
                <!-- Product price-->
                @if($validProduct->discount_price)
                    {{$validProduct->discount_price??''}} $ -
                    <span class="text-muted text-decoration-line-through">{{$validProduct->original_price}} $</span>
                @else
                    {{$validProduct->original_price}} $
                @endif
                <br>
                {{$validProduct->TotalLikes}}
                @if(Auth::check())
                    <a href="{{route('product.like', $validProduct->id)}}">
                        @if($validProduct->userLike)
                            <i class="bi-star-fill"></i>
                        @else
                            <i class="bi bi-star"></i>
                        @endif
                    </a>
                @endif
                <form action="{{route('shopping.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$validProduct->id}}" hidden>
                    <button type="submit" class="btn badge bg-dark text-white position-absolute">Nueva Oferta</button>
                </form>
            </div>
        </div>
    </div>
</div>
