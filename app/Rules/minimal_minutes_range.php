<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class minimal_minutes_range implements Rule
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $timeBeginning = Carbon::parse($this->param[0]); // do confirm the date format.
        $timeEnd = Carbon::parse($value);
        return $timeBeginning->diffInMinutes($timeEnd) == (50*$this->param[1]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        
        return 'Selisih awal dan :attribute harus sama dengan '.(50*$this->param[1]).' minutes ('.$this->param[1].' sks).';
    }
}
