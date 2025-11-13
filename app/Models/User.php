<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function notes()
    {
        // One user has many notes
        return $this->hasMany(Note::class);
    }
}
