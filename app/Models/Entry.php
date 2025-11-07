<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'script_id',
        'order_no',
        'name',
        'action',
        'media',
        'projection',
        'light',
        'microphone',
        'note',
        'content',
    ];

    // Egy Entry csak egy Scripthez tartozhat
    public function script()
    {
        return $this->belongsTo(Script::class);
    }
}
