<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
			
                'title' => ['required', 'string', 'min:3'],
                'description' =>['sometimes'],
            
        ];
    }

	public function messages(): array
	{
		return [
			'required' => 'Поле :attribute необходимо заполнить!'
		];
	}

	public function attributes(): array
	{
		return  [
			'title' => 'Заголовок',
			
		];
	}
}
