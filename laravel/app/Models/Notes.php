<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = [
        'title', 'description','userid', 'ispinned', 'isarchived', 'istrash','index'
    ];

    use HasFactory;
}
