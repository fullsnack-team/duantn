<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\ProductRequest;
use App\Models\Tenant\Attribute;
use App\Models\Tenant\AttributeValue;
use App\Models\Tenant\Product;
use App\Models\Tenant\Variation;
use App\Models\Tenant\VariationAttribute;

class ProductController extends Controller
{
    public function __construct(
        private Product $productModel,
        private Attribute $attributeModel,
        private AttributeValue $attributeValueModel,
        private Variation $variationModel,
        private VariationAttribute $variationAttributeModel,
        private ProductRequest $request
    )
    {
    }

    public function list(){
        try {
            return responseApi($this->productModel::with(['attribute','variations'])
                ->select('products.*')
                ->selectRaw('(SELECT name FROM brands
                                                   WHERE id = products.brand_id)
                                                   as brand_name')
                ->selectRaw('(SELECT name FROM warranties
                                                   WHERE id = products.warranty_id)
                                                   as warranty_name')
                ->selectRaw('(SELECT name FROM item_units
                                                   WHERE id = products.item_unit_id)
                                                   as item_unit_name')
                ->selectRaw('(SELECT name FROM categories
                                                   WHERE id = products.category_id)
                                                   as category_name')
                ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y %H:%i") as format_created_at')
                ->selectRaw('DATE_FORMAT(updated_at, "%d/%m/%Y %H:%i") as format_updated_at')
                ->orderBy('id', 'desc')
                ->paginate(10), true);
        }catch (\Throwable $throwable)
        {
            return responseApi($throwable->getMessage(), false);
        }
    }

    public function store(){

        try {
            $arrayAttributeValues = [];
            $arrayVariations = [];

            $product = $this->productModel::create([
                'name' => $this->request->name,
                'image' => $this->request->image,
                'weight' => $this->request->weight,
                'description' => $this->request->description,
                'manage_type' => $this->request->manage_type,
                'brand_id' => $this->request->brand_id,
                'warranty_id' => $this->request->warranty_id,
                'item_unit_id' => $this->request->item_unit_id,
                'category_id' => $this->request->category_id,
                'status' => $this->request->status,
            ]);

            foreach ($this->request['attributes'] as $data){
                $attribute = $this->attributeModel::create([
                    'product_id' => $product->id,
                    'name' => $data['name']
                ]);

                foreach ($data['attribute_values'] as $valueData) {
                    // Tạo giá trị thuộc tính
                    $attributeValue = $this->attributeValueModel::create([
                        'attribute_id' => $attribute->id,
                        'value' => $valueData['value']
                    ]);
                    array_push($arrayAttributeValues, $attributeValue->id);
                }
            }

            foreach ($this->request['variations'] as $data){
                $variation = $this->variationModel::create([
                    "product_id" => $product->id,
                    "sku" => $data['sku'],
                    "barcode" => $data['barcode'],
                    "variation_name" => $data['variation_name'],
                    "display_name" => $data['display_name'],
                    "image" => $data['image'],
                    "price_import" => $data['price_import'],
                    "price_export" => $data['price_export'],
                    "status" => $data['status']
                ]);

                array_push($arrayVariations, $variation->id);
            }

            foreach ($arrayVariations as $keyVariation => $valueVariation){
                foreach ($arrayAttributeValues as $keyAttributeValue => $valueAttributeValue){
                    $this->variationAttributeModel::create([
                        'variation_id' => $valueVariation,
                        'attribute_value_id' => $valueAttributeValue
                    ]);
                }
            }

            return responseApi("Tạo thành công!", true);
        }catch (\Throwable $throwable)
        {
            return responseApi($throwable->getMessage(), false);
        }
    }

    public function show()
    {
        try {
            return responseApi($this->productModel::with(['attribute','variations'])
                ->select('products.*')
                ->selectRaw('(SELECT name FROM brands
                                                   WHERE id = products.brand_id)
                                                   as brand_name')
                ->selectRaw('(SELECT name FROM warranties
                                                   WHERE id = products.warranty_id)
                                                   as warranty_name')
                ->selectRaw('(SELECT name FROM item_units
                                                   WHERE id = products.item_unit_id)
                                                   as item_unit_name')
                ->selectRaw('(SELECT name FROM categories
                                                   WHERE id = products.category_id)
                                                   as category_name')
                ->selectRaw('DATE_FORMAT(created_at, "%d/%m/%Y %H:%i") as format_created_at')
                ->selectRaw('DATE_FORMAT(updated_at, "%d/%m/%Y %H:%i") as format_updated_at')
                ->where('id', $this->request->id)
                ->first(), true);
        }catch (\Throwable $throwable)
        {
            return responseApi($throwable->getMessage(), false);
        }
    }

    public function update()
    {
        try {
            $arrayAttributeValues = [];
            $arrayVariations = [];

            $product = $this->productModel::create([
                'name' => $this->request->name,
                'image' => $this->request->image,
                'weight' => $this->request->weight,
                'description' => $this->request->description,
                'manage_type' => $this->request->manage_type,
                'brand_id' => $this->request->brand_id,
                'warranty_id' => $this->request->warranty_id,
                'item_unit_id' => $this->request->item_unit_id,
                'category_id' => $this->request->category_id,
                'status' => $this->request->status,
            ]);

            foreach ($this->request['attributes'] as $data){
                $attribute = $this->attributeModel::create([
                    'product_id' => $product->id,
                    'name' => $data['name']
                ]);

                foreach ($data['attribute_values'] as $valueData) {
                    // Tạo giá trị thuộc tính
                    $attributeValue = $this->attributeValueModel::create([
                        'attribute_id' => $attribute->id,
                        'value' => $valueData['value']
                    ]);
                    array_push($arrayAttributeValues, $attributeValue->id);
                }
            }

            foreach ($this->request['variations'] as $data){
                $variation = $this->variationModel::create([
                    "product_id" => $product->id,
                    "sku" => $data['sku'],
                    "barcode" => $data['barcode'],
                    "variation_name" => $data['variation_name'],
                    "display_name" => $data['display_name'],
                    "image" => $data['image'],
                    "price_import" => $data['price_import'],
                    "price_export" => $data['price_export'],
                    "status" => $data['status']
                ]);

                array_push($arrayVariations, $variation->id);
            }

            foreach ($arrayVariations as $keyVariation => $valueVariation){
                foreach ($arrayAttributeValues as $keyAttributeValue => $valueAttributeValue){
                    $this->variationAttributeModel::create([
                        'variation_id' => $valueVariation,
                        'attribute_value_id' => $valueAttributeValue
                    ]);
                }
            }
            return responseApi("Cập nhật thành công!", true);
        }catch (\Throwable $throwable)
        {
            return responseApi($throwable->getMessage(), false);
        }
    }

    public function delete(){
        try {
            $this->productModel::find($this->request->id)->delete();
            return responseApi("Xóa thành công!", true);
        }catch (\Throwable $throwable)
        {
            return responseApi($throwable->getMessage(), false);
        }
    }
}
