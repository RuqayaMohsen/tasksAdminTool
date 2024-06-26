<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number_of_tasks',
    ];

    public function User() {
        return $this->belongsTo('App\Models\User');
    }
}
