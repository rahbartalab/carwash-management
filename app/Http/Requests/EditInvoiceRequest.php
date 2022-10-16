<?php

namespace App\Http\Requests;

use App\Models\Service;
use App\Rules\InvoiceTime;
use App\Rules\Length;
use App\Rules\PhoneNumber;
use App\Rules\ValidServiceTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['min:2', 'max:255'],
            'phone' => [new Length(11), Rule::unique('invoices', 'phone')->ignore(request('id')), new PhoneNumber()],
            'date' => ['required', 'date'],
            'services' => ['required'],
            'start_time' => [
                'required',
                new InvoiceTime(),
                new ValidServiceTime(
                    request('start_time') ?? '0', Service::all()->whereIn('id', request('services'))
                )
            ]
        ];
    }
}
