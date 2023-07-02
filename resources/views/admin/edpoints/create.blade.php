@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="col">
            <h3>Adcionar um novo Endpoint</h3>
        </div>
    </div>
    <div class="card-body">
        <form class="row" action="{{route('endpoints.store', $site->id)}}" method="POST">
            @csrf
            @include('admin.edpoints.form')
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
    </div>
  </div>
@endsection
