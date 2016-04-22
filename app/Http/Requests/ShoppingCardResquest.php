<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShoppingCardResquest extends Request {

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
            'type_product'=> 'required',
            'name_product'=>'required',
            'size_product'=>'required',
            'time_product'=>'required',
            'check_element'=>'required',
        ];
    }

}
