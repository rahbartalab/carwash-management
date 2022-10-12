<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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


        /* select time and date automatically */
        if (request('service_type') === '1') {

            $attributes = Invoice::findNearestTime($attributes);
        } /* user select custom time and date */
        else if (request('service_type') === '2') {
            $attributes['end_time'] = Service::getEndTime($attributes['start_time']);
        }

        $attributes['code'] = generateCode($attributes['start_time'], $attributes['date']);
        $invoice = Invoice::create($attributes);

        return redirect("/invoices/$invoice->id")->with('success', true);
    }

    public function show($id)
    {
        if (session('success'))
            return view('invoices.show', [
                "invoice" => Invoice::findOrFail($id)
            ]);
        else throw new ModelNotFoundException();
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
