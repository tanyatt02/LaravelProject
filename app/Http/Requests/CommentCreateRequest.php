<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\News;

class CommentCreateRequest extends FormRequest
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
    {$tableNewsName = (new News)->getTableName();
        return [
            'news_id' => ['required', 'integer', "exists:{$tableNewsName},id"],
            'title' => ['required', 'string', 'min:3', 'max:191'],
            'author' => ['required', 'string', 'min:3', 'max:100'],
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
