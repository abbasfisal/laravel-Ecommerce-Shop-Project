<?php

namespace App\Rules;

use App\Models\Size;
use Illuminate\Contracts\Validation\Rule;

class SizeRule implements Rule
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
    public function passes($attribute, $value)
    {
       $sizeCount = Size::query()->where('id' , $value)->count();

       return ($sizeCount >0 ? true : false);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Size Selected is Not exist in Db.';
    }
}
