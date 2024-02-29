<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserves';

        public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
