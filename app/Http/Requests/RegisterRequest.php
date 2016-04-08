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
			'name' => 'required',
			'email' => 'required',
			'password' => 'required',
		];
	}

	public function messages(){
		return [
			'name.required' => 'Vui nhập email của bạn.',
			'email.required' => 'Vui nhập email của bạn.',
			'password.required' => 'Vui lòng nhập mật khẩu.',
		];
	}
}
