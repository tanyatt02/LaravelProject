<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class NewsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules(): array
    {
        $tableCategoryName = (new Category)->getTableName();
            return [
                'category_id' => ['required', 'integer', "exists:{$tableCategoryName},id"],
                'title' => ['required', 'string', 'min:3', 'max:191'],
                'author' => ['required', 'string', 'min:3', 'max:100'],
                'image'  => ['sometimes'],
                'description' => ['sometimes']
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
			'author' => 'Автор'
		];
	}
}
