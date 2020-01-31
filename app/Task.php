<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function scopeByUser($query, $user_id)
    {
        return $query->where("user_id", $user_id);
    }
}
