<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required | numeric',
            'category' => 'required | numeric',
            'location' => 'required | string | max:255',
            'title' => 'required | string | min:10 | max:255',
            'description' => 'required | string | min:50',
            'terms' => 'required | string',
        ];
    }
}
