<?php

namespace App\Http\Requests;

use App\Models\Service;
use App\Rules\InvoiceTime;
use App\Rules\Length;
use App\Rules\PhoneNumber;
use App\Rules\ValidServiceTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
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
        $rules = [
            'date' => $this->getDateRules(),
            'start_time' => $this->getTimeRules(),
            'services' => ['required']
        ];

        if (!auth()->user()) {
            $rules = array_merge([
                'name' => ['required', 'min:2', 'max:255'],
                'phone' => ['required', new Length(11), new PhoneNumber(), 'unique:invoices,phone'],
            ], $rules);
        }

        return $rules;
    }


    public function getDateRules(): array
    {
        if (request('service_type') === '1') {
            return [];
        } else {
            return ['required', 'date'];
        }
    }

    public function getTimeRules(): array
    {
        if (request('service_type') === '1') {
            return [];
        } else {
            return [
                'required',
                new InvoiceTime(),
                new ValidServiceTime(
                    request('start_time') ?? '0', Service::all()->whereIn('id', request('services'))
                )
            ];
        }
    }

    public function messages()
    {
        return [
            'services' => 'لطفا سرویس مدنظر خود را وارد کنید'
        ];
    }
}
