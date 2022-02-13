<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionsImageModel extends Model
{
    use HasFactory;

    protected $table = 'transaction_image';

    protected $fillable = [
        'transaction_id', 'image'
    ];

    protected $hidden = [];

    //Relation
    public function Transaction()
    {
        return $this->belongsTo(TransactionsModel::class, 'transaction_id', 'id');
    }

    


}
