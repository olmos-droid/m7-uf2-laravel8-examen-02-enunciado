@extends('layouts.app')

@section('content')
@php $total=0
@endphp
@foreach ($products as $product)
  @if($product->action=="buy")
    @php ($total+=$product->price)
  @endif
  @if($product->action=="rent")
    @php ($total+=5)
  @endif
@endforeach
<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Lego Shop</h1>
    <ul class="list-group">
      <li class="list-group-item">
        Total de productos: {{sizeof($products)}}</li>
      <li class="list-group-item">
        Precio total de productos: ${{$total}}</li>
    </ul>



  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    <div class="row">
      @forelse ($products as $product)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="{{ asset('img/'.$product->image) }}" alt=""></a>
          <div class="card-body">
            <h3 class="card-title">
              <a href="#">{{$product->name}}</a>
            </h3>
            <h4>to {{$product->action}}</h4>
            <h5>${{$product->price}}</h5>
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


<a href="{{ url('/') }}" class="btn btn-secondary btn-lg float-left">Atras</a>
<a href="{{ url('/compra/envio') }}" class="btn btn-primary btn-lg float-right">Siguiente</a>
<br><br>
@endsection