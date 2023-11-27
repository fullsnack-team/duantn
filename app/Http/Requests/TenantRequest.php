<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TenantRequest extends FormRequest
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
        $url = Str::afterLast($this->url(), '/');
        if ($url == 'store') {
            return [
                'name_tenant' => 'required',
                'business_field' => $this->business_code ? 'nullable' : 'required',
                'user_id' => 'required',
                'due_at' => 'nullable',
                'pricing_id' => 'nullable',
                'business_name' => 'required',
                'address' => 'required'
            ];
        }
        return [];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên phải được nhập',
            'business_field.required' => 'Lĩnh vực kinh doanh phải được chọn',
            'business_name.required' => 'Vui lòng điền tên cửa hàng',
            'user_id.required' => 'Người dùng phải được chọn',
            'username.required' => 'Tên người dùng phải được nhập',
            'email.required' => 'Email phải được nhập',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu phải được nhập',
            'due_at.required' => 'Ngày hết hạn phải được nhập',
            'due_at.in' => 'Ngày hết hạn ko hợp lệ',
        ];
    }
}
