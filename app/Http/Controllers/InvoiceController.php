<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index', [
            "services" => Service::all()
        ]);
    }

    public function create()
    {
        return view('invoices.create', [
            "services" => Service::all()
        ]);
    }

    public function store(CreateInvoiceRequest $request)
    {
        $attributes = $request->validated();

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
