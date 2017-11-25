<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPermissionsUpdateRequest extends FormRequest
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
            'name'=>'required|unique:admin_permissions,name,'.$this->get('id').'|max:255',
            'label'=>'unique:admin_permissions,label,'.$this->get('id').'|max:255',
            //'cid'=>'int',
        ];
    }
}
