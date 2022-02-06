<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionsModel extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'customer_id', 'item_id', 'quantity', 'total', 'transaction_status', 'image'
    ];

    protected $hidden = [];

    public function etalase_item()
    {
        return $this->belongsTo(EtalaseModel::class, 'item_id', 'id');
    }

    public function customers()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id', 'id');
    }

}
