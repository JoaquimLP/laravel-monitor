@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="col">
            <h3>Adcionar um novo Site</h3>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{route('site.store')}}" method="POST">
            @csrf
            @include('admin.sites.form')
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
    </div>
  </div>
@endsection
