<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $fillable = [
        'user_id', 'username', 'address', 'phone'
    ];

    protected $hidden = [];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transactions(){
        return $this->hasMany(TransactionsModel::class, 'customer_id', 'id');
    }
}
