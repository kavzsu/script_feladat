<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author'];

    // Egy Scripthez több Entry tartozik
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
