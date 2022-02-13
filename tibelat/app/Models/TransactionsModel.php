<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionsModel extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'ongkir', 'total', 'transaction_status', 'transaction_type' 
    ];

    protected $hidden = [];

    public function item()
    {
        return $this->hasMany(SubTransactionModel::class, 'transaction_id', 'id');
    }

    public function customers()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transactionImage(){
        return $this->hasOne(TransactionsImageModel::class, 'transaction_id', 'id');
    }

    public function product_image(){
        return $this->belongsTo(EtalaseGalleryModel::class, 'imageitem_id', 'id');
    }

}
