<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request {

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
			'email_login' => 'required',
			'password_login' => 'required',
		];
	}

	public function messages(){
		return [
			'email_login.required' => 'Vui nhập email của bạn.',
			'password_login.required' => 'Vui lòng nhập mật khẩu.',
		];
	}
}
