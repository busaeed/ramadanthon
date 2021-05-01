<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'gender',
        'seats',
        'scheduled_at',
        'user_id',
        'photo',
        'city'
        

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function applications() {
        return $this->hasMany(Application::class);
    }

}
