@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="col">
            <h3>Editar</h3>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{route('site.update', $site->id)}}" method="post">
            @csrf
            @method('PUT')
            @include('admin.sites.form')
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
    </div>
  </div>
@endsection
