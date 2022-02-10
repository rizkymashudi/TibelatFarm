<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtalaseModel extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'items_name', 'slug', 'description', 'stocks', 'current_stocks', 'price'
    ];

    protected $hidden = [];


    //Table relation with gallery table
    public function galleries(){
        return $this->hasMany(EtalaseGalleryModel::class, 'items_id', 'id');
    }

    public function gallerie(){
        return $this->hasOne(EtalaseGalleryModel::class, 'items_id', 'id');
    }

    public function salesReport(){
        return $this->belongsTO(SalesReportModel::class, 'items_id', 'id');
    }


}
