<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Traits\TFailedValidation;

class BrandRequest extends FormRequest
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
        $getUrl = Str::afterLast($this->url(), '/');
        $id = ",".$this->id;
        $rules =  [
            "id" => [
                "required",
                "exists:App\Models\Tenant\Brand,id"
            ],
            "name" => [
                "required",
                "max:255",
                "unique" => "unique:App\Models\Tenant\Brand,name"
            ]
        ];

        switch ($getUrl){
            case "store":
                return [
                    "name" => $rules["name"]
                ];
            case "update":
                return [
                    "id" => $rules["id"],
                    "name" => [
                        $rules["name"],
                        $rules["name"]["unique"].$id
                    ],
                ];
            case "show":
            case "delete":
                return ["id" => $rules["id"]];
            default:
                return [];
        }
    }

    public function messages()
    {
        return [
            "required" => "Không được để trống!",
            "exists" => "Dữ liệu không tồn tại!",
            "unique" => "Dữ liệu đã tồn tại!",
            "max" => "Bạn đã vượt quá ký tự cho phép!"
        ];
    }
}
