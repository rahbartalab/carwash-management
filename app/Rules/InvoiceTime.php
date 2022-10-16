<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InvoiceTime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^09|(1[0-9]|20):[0-5][05](:00)?$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'لطفا زمان را با فرمت درست وارد کنید. تنها در بازه زمانی 09 تا 21 و ضریب زمانی 5 دقیقه';
    }
}
