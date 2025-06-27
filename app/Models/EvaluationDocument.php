<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationDocument extends Model
{
    protected $fillable = [
        'name',
        'code',
        'file_path',
    ];
}
