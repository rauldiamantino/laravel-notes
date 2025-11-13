<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function user()
    {
        // Note belongs to an User
        return $this->belongsTo(User::class);
    }
}
