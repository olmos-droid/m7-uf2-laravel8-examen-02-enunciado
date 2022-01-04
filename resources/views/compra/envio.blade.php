@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{ __('Register') }}</div>

      <div class="card-body">
        <form method="POST" action=""  enctype="multipart/form-data">
          @csrf

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ ('Name') }}</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" autocomplete="name" autofocus>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ ('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" autocomplete="email">
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ ('Direccion') }}</label>

            <div class="col-md-6">
              <input id="email" type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ ('Password') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password">
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ ('Confirm Password') }}</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
          </div>

          <div class="form-group row">
            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ ('Foto') }}</label>

            <div class="col-md-6">
              <input id="photo" type="file" class="form-control" name="photo">
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Pagar') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<a href="{{ url('/compra/resumen') }}" class="btn btn-secondary btn-lg float-left">Atras</a>
<!--<a href="{{ url('/compra/confirmar') }}"  class="btn btn-primary btn-lg float-right">Siguiente</a>-->

<br><br>
@endsection