<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubTransactionModel extends Model
{
    use HasFactory;

    protected $table = 'sub_transactions';

    public $timestamps = false;

    protected $fillable = [
        'transaction_id', 'item_id', 'item_name', 'quantity', 'price', 'total'
    ];

    protected $hidden = [];

    public function transaction()
    {
        return $this->belongsTo(TransactionsModel::class, 'transaction_id', 'id');
    }

    // public function etalase_item()
    // {
    //     return $this->belongsTo(EtalaseModel::class, 'item_id', 'id');
    // }

    // public function customers()
    // {
    //     return $this->belongsTo(CustomerModel::class, 'customer_id', 'id');
    // }

    // public function transactionImage(){
    //     return $this->hasOne(TransactionsImageModel::class, 'transaction_id', 'id');
    // }

    // public function product_image(){
    //     return $this->belongsTo(EtalaseGalleryModel::class, 'imageitem_id', 'id');
    // }

}
