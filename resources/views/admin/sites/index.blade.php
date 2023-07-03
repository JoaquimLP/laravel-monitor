@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3>Sites</h3>
            </div>
            <div class="col d-flex justify-content-end">
                <a class="btn btn-outline-primary" href="{{route('site.create')}}">Add +</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sites</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sites as $site)
                    <tr>
                        <td>{{$site->url}}</td>
                        <td>
                            <div class="d-flex" role="group" aria-label="Basic mixed styles example">
                                {{-- <a class="btn mx-1 btn-outline-warning">Ver</a> --}}
                                <a  href="{{route('site.edit', $site->id)}}" class="btn mx-1 btn-outline-success">Editar</a>
                                <a  href="{{route('endpoints.index', $site->id)}}" class="btn mx-1 btn-outline-primary">Logs</a>
                                <form action="{{ route('site.destroy', $site->id) }}" method="post">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit" class="btn mx-1 btn-outline-danger">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <div class="row mt-3">
            <div class="col-3">
                <p>{{$sites->count()}} Sites encontrados</p>
            </div>
            <div class="col-3">
                {{$sites->links()}}
            </div>
        </div>

    </div>
</div>
@if (session()->has('message'))
    <x-bladewind.alert
        type="success">
        {{session('message')}}
    </x-bladewind.alert>
@endif
@endsection
