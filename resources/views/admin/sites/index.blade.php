@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        Sites
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
                                <button type="button" class="btn mx-1 btn-outline-warning">Ver</button>
                                <button type="button" class="btn mx-1 btn-outline-success">Editar</button>
                                <button type="button" class="btn mx-1 btn-outline-danger">Excluir</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection
