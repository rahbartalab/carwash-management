<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackOrderRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    public function index()
    {
        return view('orderTracking.index');
    }

    public function attempt(TrackOrderRequest $request)
    {
        $attributes = $request->validated();

        $invoice = Invoice::where('code', $attributes['code'])
            ->where('phone', $attributes['phone'])
            ->get()
            ->first();

        return !is_null($invoice)
            ? redirect("/invoices/{$invoice->id}/edit")
            : back()->withInput()->withErrors([
                'failed' => 'سفارشی با اطلاعات وارد شده یافت نشد'
            ]);
    }
}
