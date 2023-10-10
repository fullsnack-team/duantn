<?php

namespace App\Http\Requests\Tenant;

use App\Traits\TFailedValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class WarrantyRequest extends FormRequest
{
    use TFailedValidation;
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

        if($url == "store"){
            return [
                "name" => [
                    "required",
                    "max:255",
                    "unique:App\Models\Tenant\Warranty,name"
                ],
                "unit" => [
                    "required",
                    "in:0,1,2"
                ],
                "period" => [
                    "required",
                    "gt:0",
                    "max:500"
                ]
            ];
        }

        if($url == "update"){
            return [
                "name" => [
                    "required",
                    "max:255",
                    "unique:App\Models\Tenant\Warranty,name,".$this->id
                ],
                "unit" => [
                    "required",
                    "in:0,1,2"
                ],
                "period" => [
                    "required",
                    "gt:0",
                    "max:500"
                ]
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            "name.required" => "Không được để trống!",
            "name.unique" => "Tên đã tồn tại!",
            "name.max" => "Bạn đã vượt quá ký tự cho phép!",
            "unit.required" => "Không được để trống!",
            "unit.in" => "Giá trị không hợp lệ!",
            "period.required" => "Không được để trống!",
            "period.gt" => "Phải lớn hơn 0!",
            "period.max" => "Bạn đã vượt quá số lượng cho phép!"
        ];
    }
}
