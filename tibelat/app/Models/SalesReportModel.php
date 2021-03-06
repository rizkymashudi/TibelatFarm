<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesReportModel extends Model
{
    use HasFactory;

    protected $table = 'sales_reports';

    protected $fillable = [
        'transaction_id', 'subtransaction_id', 'item_id', 'sold', 'balance', 
    ];

    protected $hidden = [];

    public function item()
    {
        return $this->belongsTo(EtalaseModel::class, 'item_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(TransactionsModel::class, 'transaction_id', 'id');
    }

    public function itemStocks(){
        return $this->hasMany(EtalaseModel::class, 'id', 'item_id');
    }



}
