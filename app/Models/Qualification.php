<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\User;

class Qualification extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }

}
