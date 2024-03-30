<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'assigned_to_id',
        'assigned_by_id',
    ];

    public function User() {
        return $this->belongsTo('App\Models\User', 'assigned_to_id', 'id');
    }

    public function Admin() {
        return $this->belongsTo('App\Models\User', 'assigned_by_id', 'id');
    }
}
