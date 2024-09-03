<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pdf extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'file_path','created_at','updated_at'
    ];
}
