<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $guarded=[];
    public function schedule()
    {
        return $this->belongsToMany(Schedule::class, 'schedule_id')->withTimestamps();
    }
=======
>>>>>>> 0be400494de6b3677e925c5080b2fd63275149e6
}
