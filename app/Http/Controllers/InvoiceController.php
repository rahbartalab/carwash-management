<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Invoice;
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


        /* select time and date automatically */
        if (request('service_type') === '1') {

            $attributes = Invoice::findNearestTime($attributes);
        } /* user select custom time and date */
        else if (request('service_type') === '2') {
            $attributes['end_time'] = Service::getEndTime($attributes['start_time']);
        }

        Invoice::create($attributes);
        return redirect('/');
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
