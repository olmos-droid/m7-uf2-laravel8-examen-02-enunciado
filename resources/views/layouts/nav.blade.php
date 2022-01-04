<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Netflis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Numero de produtos: {{sizeof(app('request')->session()->get('carrito',[]))}}</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        @forelse (app('request')->session()->get('carrito',[]) as $producto)
                        <li>
                            <a class="dropdown-item" href="#">
                                {{$producto->name}} ({{($producto->action=='buy')?'Compra':'Alquiler'}})
                            </a>
                        </li>
                        @empty
                        <li>
                            <a class="dropdown-item" href="#">No products in chart </a>
                        </li>
                        @endforelse
                    </ul>
                </li>
                @if(app('request')->session()->has('carrito'))
                <li class="nav-item"><a class="nav-link" type="button" class="btn btn-primary" href={{ route('clearCart') }}>Borrar Carrito</a></li>
                @endif
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('compra-init') }}">Finalizar compra
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>