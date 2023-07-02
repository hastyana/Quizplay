<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quiz';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_room', 'question', 'a', 'b', 'c', 'd', 'key', 'image'];
    protected $dates = ['created_at, update_at'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function rooms() {
        return $this->belongsTo(Room::class, 'id_room');
    }
}
