@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3>Edpoints</h3>
            </div>
            <div class="col d-flex justify-content-end">
                <a class="btn btn-outline-primary" href="{{route('endpoints.create', $site->id)}}">Add +</a>
            </div>
        </div>
        <small>do site {{$site->url}}</small>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Endpoint</th>
                    <th scope="col">Frequêcia</th>
                    <th scope="col">Próxima verificação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($endpoints as $endpoint)
                    <tr>
                        <td>{{$endpoint->endpoint}}</td>
                        <td>{{$endpoint->frequency}}</td>
                        <td>{{$endpoint->next_check}}</td>
                        <td>
                            <div class="d-flex" role="group" aria-label="Basic mixed styles example">
                                <a  href="{{route('endpoints.edit', [$site->id, $endpoint->id])}}" class="btn mx-1 btn-outline-success">Editar</a>
                                <form action="{{ route('endpoints.destroy', [$site->id, $endpoint->id]) }}" method="post">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit" class="btn mx-1 btn-outline-danger">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="4" class="text-center">Não encontrado</td>
                @endforelse
            </tbody>
        </table>

    </div>
    {{-- <div class="card-footer">
        <div class="row mt-3">
            <div class="col-3">
                <p>{{$sites->count()}} Sites encontrados</p>
            </div>
            <div class="col-3">
                {{$sites->links()}}
            </div>
        </div>

    </div> --}}
</div>
@if (session()->has('message'))
    <x-bladewind.alert
        type="success">
        {{session('message')}}
    </x-bladewind.alert>
@endif
@endsection
