<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;

    protected $table = "carts";

    protected $fillable = [
        'user_id', 'item_id', 'imageitem_id', 'quantity'
    ];

    protected $hidden = [];

    public function etalase_item()
    {
        return $this->belongsTo(EtalaseModel::class, 'item_id', 'id');
    }

    public function item_image(){
        return $this->belongsTo(EtalaseGalleryModel::class, 'imageitem_id', 'id');
    }
}
