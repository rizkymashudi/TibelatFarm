<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;

    public $table = "customers";

    protected $fillable = [
        'username', 'address', 'phone'
    ];

    protected $hidden = [];
}
