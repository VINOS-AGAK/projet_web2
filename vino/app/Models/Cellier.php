<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cellier extends Model
{
    protected $table = "vino__cellier";

    use HasFactory;

    protected $fillable = [

        'cellier_user_id',

    ];
}
