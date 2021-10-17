<?php

namespace App\Models;

use Eloquent as Model;

 
class Campaigns extends Model
{

    public $table = 'Campaigns';
    


    public $fillable = [
        'product_id',
        'user_id',
        'quantity'
    ];

}