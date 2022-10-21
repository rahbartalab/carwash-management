<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index', [
            "services" => Service::all()
        ]);
    }

    public function create()
    {
        return view('services.create');
    }


    public function store(Request $request)
    {
        Service::create($request->except(['_token', '_method']));

        return redirect('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('services.edit', [
            "service" => Service::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {

        $service = Service::find($id);
        $service->update($request->except('_token', '_method'));


        return redirect("/services/$id/edit");
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('/services');
    }
}
