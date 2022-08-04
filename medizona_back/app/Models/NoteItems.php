<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteItems extends Model
{
    protected $table = 'note_items';
    protected $primaryKey = 'id';

    protected $fillable = [        
        'customer_id',        
        'date',
        'total'
    ];
}
