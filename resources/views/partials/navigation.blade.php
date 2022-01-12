<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                @foreach (config('menu') as $group)
                    @php $nameLink = key($group); $link = $group[$nameLink]; @endphp
                    @if (!is_array($link))
                        @if($nameLink === 'Load' && Auth::check() || $nameLink === 'Home')
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                                href="{{$link}}">
                                {{$nameLink}} </a></li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><?= $nameLink ?></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($link as $subName => $subLink)
                                <li><a class="dropdown-item" href="{{ $subLink}}">{{$subName}} </a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    @if (Auth::user())
                        <i class="bi bi-person"><a class="dropdown-item" href="logout">Logout {{Auth::user()->name}}</a></i>
                    @else
                        <i class="bi bi-person"><a class="dropdown-item" href="login">Login</a></i>
                    @endif
                </button>
            </form>
        </div>
    </div>
</nav>
