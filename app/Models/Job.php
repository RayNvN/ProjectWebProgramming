<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //

    protected $table = 'job';

    protected $fillable = [
        'title',
        'description',
        'type',
        'is_active',
        'active_until',
    ];
}
