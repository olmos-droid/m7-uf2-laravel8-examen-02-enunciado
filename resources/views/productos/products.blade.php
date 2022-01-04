@extends((Request::ajax()) ? 'layouts.ajax' : 'layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-3">
    <h2 class="my-4">Buscar <br>(en este genero)</h2>
    <form method="POST" action={{  route('search-product') }}>
      {{ csrf_field() }}
      <input type="hidden" name="category" value="{{Request()->id}}">
      <div class="form-group">
        <div class="form-check">
          <input name="search" class="form-text" type="text">
        </div>
      </div>
    </form>
    <h2 class="my-4">Genero</h2>
    <div class="list-group">
      @foreach ($filters->category as $key=>$category)
      <a href="{{url('category', [$key])}}" class="list-group-item">{{$category}}</a>
      @endforeach
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    @if($showBanner)
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        @for ($i = 0; $i < sizeof($products); $i++) <li data-target="#carouselExampleIndicators" data-slide-to="0">
          </li>
          @endfor
      </ol>
      <div class="carousel-inner" role="listbox">
        @foreach ($products as $key =>$product)
        <div class="carousel-item {{$key==0 ? 'active' : '' }}">
          <img class="d-block w-100 " src="{{ asset('img/'.$product->image) }}" alt="Second slide">
        </div>
        @endforeach
        <!--<div class="carousel-item">
          <img class="d-block w-100" src="http://placehold.it/900x350" alt="Second slide">
        </div>-->
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    @endif
    <div class="row">
      @forelse ($products as $product)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="{{ asset('img/'.$product->image) }}" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">{{$product->name}}</a>
            </h4>
            <h5>${{$product->price}}</h5>
            <p class="card-text">{{$product->description}}</p>
          </div>
          <div class="card-footer">
            <form method="post" class="addCart" action={{route('addToCart')}}>
            {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$product->id}}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="action" value="buy">
              <button type="submit" class="btn-block btn-primary">Comprar</button>
            </form>
            <br>
            <form  method="post" class="addCart" action={{route('addToCart')}}>
            {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$product->id}}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="action" value="rent">
              <button type="submit" class="btn-block btn-primary">Alquilar</button>
            </form>
          </div>
        </div>
      </div>
      @empty
      <p>No products to show</p>
      @endforelse
    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>

<script>
  //NO APLICA EN ESTE EXAMEN
  //Escribir aqui el codigo necesario de AXIOS
  //Al hacer click se obtiene la info del producto
  /*$('.addCart').submit(function(e) {
    e.preventDefault();
    var postData = $(this).serialize()
    var formData = new FormData(e.target);
    if (carrito >= 3) {
      window.alert('Lo sentimos, no puedes reservar mas peliculas')
      return;
    }
    axios.post('stock', postData)
      .then(response => {
        var product = response.data[0];
        product.action = formData.get('action');
        if (response == false) {
          window.alert('Lo sentimos, no tenemos esta pelicula actualmente')
          return;
        } else {
          axios.post('addToCart', product)
            .then(response => {
              if (response != false) {
                console.log(response.data)
                carrito = response.data.length
                console.log(carrito)
                $('#carrito').html(carrito);
              }
            })
        }
      })
  })*/
</script>
@endsection