<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request {

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
			'name_register' => 'required',
			'email_register' => 'required',
			'password_register' => 'required',
		];
	}

	public function messages(){
		return [
			'name_register.required' => 'Vui nhập email của bạn.',
			'email_register.required' => 'Vui nhập email của bạn.',
			'password_register.required' => 'Vui lòng nhập mật khẩu.',
		];
	}
}
