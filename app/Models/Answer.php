<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_room', 'id_quiz', 'id_user', 'username', 'question', 'answer', 'score', 'desc'];
    protected $dates = ['created_at, update_at'];

    public function users(){
    	return $this->belongsTo(User::class, 'id_user');
    }

    public function quiz(){
    	return $this->belongsTo(Quiz::class, 'id_quiz');
    }

    public function rooms(){
    	return $this->belongsTo(Room::class, 'id_room');
    }
}
