<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndpointRequest;
use App\Models\Endpoint;
use App\Models\Site;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    public function index(string $site_id)
    {
        $site = Site::with('endpoints')->find($site_id);

        if(!$site){
            return back();
        }

        $endpoints = $site->endpoints;

        return view('admin.edpoints.index', compact('endpoints', 'site'));
    }


    public function create(string $site_id)
    {
        $site = Site::find($site_id);

        if(!$site){
            return back();
        }

        return view('admin.edpoints.create', compact('site'));
    }

    public function store(StoreUpdateEndpointRequest $request, Site $site)
    {
        $site->endpoints()->create($request->all());

        return redirect()->route('endpoints.index', $site->id)->with('message', 'Criado com sucesso');
    }

    public function edit(Site $site, Endpoint $endpoint)
    {
        return view('admin.edpoints.edit', compact('site', 'endpoint'));
    }

    public function update(StoreUpdateEndpointRequest $request, Site $site, Endpoint $endpoint)
    {
        $endpoint->update($request->validated());

        return redirect()->route('endpoints.index', $site->id)->with('message', 'Atualizado com sucesso');
    }

    public function destroy(Site $site, Endpoint $endpoint)
    {
        $endpoint->delete();

        return redirect()->route('endpoints.index', $site->id)->with('message', 'Site deletado com sucesso');
    }
}
