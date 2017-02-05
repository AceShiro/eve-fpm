<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['user_id', 'character_name', 'avatar', 'item', 'quantity', 'price', 'status'];
}
