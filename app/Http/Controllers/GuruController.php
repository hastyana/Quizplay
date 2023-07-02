<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Quiz;
use App\Models\Answer;

use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index () {
        $room = Room::all();
        return view('guru.index', ['room' => $room]); 
    }

    public function add_room () {
        return view('guru.room_add');
    }

    public function save_room (Request $request) {
        $this->validate($request, [
            'code' => 'required',
            'room' => 'required',
        ]);

        try {
            $data = new Room;
            $data->room = $request->room;
            $data->code = $request->code;
            $data->is_active = 1;
            $data->save();
            // dd($data);

            Session()->flash('alert-success', 'Data berhasil disimpan');
            return redirect('/guru/room_add');
        } catch (\Exception $e) {
            Session()->flash('alert-danger', $e->getMessage());
            return redirect('/guru/room_add')->withInput();
        }
    }

    public function delete_room($id) {
        $delete = Room::findOrFail($id)->delete();
        return redirect('/guru')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function detail_room($id) {
        $detail = Room::where('id', $id)->firstOrFail();
        $room = Room::findOrFail($id);
        $quizzes = Quiz::where([['id_room', $room->id]])->get();
        // dd($room);
        return view('guru.room', ['quizzes' => $quizzes, 'detail' => $detail]);
    }

    public function add_quiz ($id) {
        $link = Room::where('id', $id)->firstOrFail();
        // dd($link->id);
        return view('guru.quiz_add', ['link' => $link]);
    }

    public function save_quiz (Request $request, Room $id) {
        $this->validate($request, [
            'question' => 'required',
            'a'=>'required',
            'b'=>'required',
            'c'=>'required',
            'd'=>'required',
            'key'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
        ]);
        
        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('quiz', $imageName);
        } else {
            $imageName = '';
        }

        try {
            $data = new Quiz;
            $data->id_room = $id->id;
            $data->question = $request->question;
            $data->a = $request->a;
            $data->b = $request->b;
            $data->c = $request->c;
            $data->d = $request->d;
            $data->key = $request->key;
            $data->image = $imageName;
            $data->save();
            // dd($data);

            Session()->flash('alert-success', 'Data berhasil disimpan');
            return redirect('/guru/room/'.$id->id.'/quiz_add');
        } catch (\Exception $e) {
            Session()->flash('alert-danger', $e->getMessage());
            return redirect('/guru/room/'.$id->id.'/quiz_add')->withInput();
        }
    }

    public function edit_quiz(string $id) {
        $edit = Quiz::findOrFail($id);
        return view('edit.quiz', ['edit' => $edit]);
    }

    public function update_quiz(Request $request, Room $id) {
        $edit = Quiz::findOrFail($id);
        
        $image = $request->file('image');
        if ($image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('konsep', $imageName);
        } else {
            $imageName = $edit->gambar;
        }
        $edit->update([
            'image'     => $imageName,
            'question'     => $request->question,
            'a'     => $request->a,
            'b'      => $request->b,
            'c'     => $request->c,
            'd'      => $request->d,
            'key'      => $request->key,
        ]);
        return redirect('/guru/room'.$id->id)->with('alert-success', 'Data berhasil diubah dan disimpan');
    }

    public function delete_quiz($id) {
        $room = Room::findOrFail($id);
        $delete = Quiz::where('id', $room->id)->delete();
        return redirect('/guru/room'.$room)->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function stand($id) {
        $link = Room::where('id', $id)->firstOrFail();
        $room = Room::findOrFail($id);
        $stand = Answer::where([['id_room', $room->id]])
        ->orderBy('total', 'desc')
        ->groupBy('answers.username')
        ->get([
            'username',
            Answer::raw('sum(score) as total')
        ]);
        // dd($stand);

        return view('guru.standing', ['link' => $link, 'stand' => $stand]);
    }
}
