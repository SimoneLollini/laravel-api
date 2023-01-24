<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects,title|min:5|max:100',
            'image' => 'nullable|image|max:300',
            'linkTo' => 'nullable',
            'status' => 'nullable',
            'description' => 'nullable|nullable',
            'technologies' => 'exists:technologies,id',
            'type_id' => 'nullable|exists:types,id',
        ];
    }
}
