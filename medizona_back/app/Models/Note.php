<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';
    protected $primaryKey = 'id';

    protected $fillable = [        
        'customer_id',        
        'date',
        'total'
    ];
}
