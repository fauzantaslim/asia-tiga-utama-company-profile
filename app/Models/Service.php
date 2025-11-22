<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use LogsActivity;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'order'
    ];
}
