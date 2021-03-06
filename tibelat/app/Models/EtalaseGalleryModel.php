<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtalaseGalleryModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'items_id', 'image'
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [];

    public function Etalase()
    {
        return $this->belongsTo(EtalaseModel::class, 'items_id');
    }

    public function productImageTransaction(){
        return $this->belongsTo(TransactionsModel::class, 'items_id', 'id');
    }


}
