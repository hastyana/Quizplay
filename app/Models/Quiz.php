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
        return $this->hasMany(Answer::class, 'id_quiz');
    }

    public function getCorrectAnswerPercentage()
    {
        $correct = $this->answers()->where('score', 1)->count();
        $total = $this->answers()->count();
        return $total > 0 ? (($correct / $total) * 100) : 0;
    }

    public function getWrongAnswerPercentage()
    {
        $wrong = $this->answers()->where('score', 0)->count();
        $total = $this->answers()->count();
        return $total > 0 ? (($wrong / $total) * 100) : 0;
    }

    public function getUserPlays()
    {
        $total = $this->answers()->count();
        return $total;
    }

    public function rooms() {
        return $this->belongsTo(Room::class, 'id_room');
    }
}
