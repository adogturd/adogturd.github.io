<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';
    protected $fillable = ['type_name'];

    public function products()
    {
        return $this->hasMany('App\Product','type_id')->orderBy('sort', 'desc');
    }

}
