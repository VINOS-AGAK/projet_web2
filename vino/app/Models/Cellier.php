<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cellier extends Model
{
    const TABLE = 'vino__cellier';

    protected $table = "vino__cellier";

    use HasFactory;

    protected $fillable = [

        'user_id',
        'nom',
        'description'

    ];


}
