<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function stages()
    {
        return $this->hasMany(Stage::class, 'schedule_id');
    }
    public function inputCount()
    {
        return $this->hasMany(Stage::class, 'schedule_id')
        ->selectRaw('count(input) as aggregate')
        ->groupBy('schedule_id');
    }
}
