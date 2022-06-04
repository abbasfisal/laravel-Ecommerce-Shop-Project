<?php

namespace App\Rules;

use App\Models\Color;
use Illuminate\Contracts\Validation\Rule;

class ColorRule implements Rule
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
        $color_count = Color::query()
                            ->where('id', $value)
                            ->count();

        return ($color_count > 0 ? true : false);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Color id is not exist in db';
    }
}
