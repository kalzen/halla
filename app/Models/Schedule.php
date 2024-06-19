<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $guarded = [];

    public function stages()
    {
        return $this->hasMany(Stage::class, 'schedule_id');
    }
=======
>>>>>>> 0be400494de6b3677e925c5080b2fd63275149e6
}
