<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Product extends Model
{
    Use Taggable;

    protected $fillable = [ 'id_local', 'product_name','product_description','product_image','tags' ];
}
