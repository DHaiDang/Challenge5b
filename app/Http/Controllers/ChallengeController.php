<?php

namespace App\Http\Controllers;
Use App\Models\User;
Use App\Models\Inbox;
Use App\Models\Challenge;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Session;

class ChallengeController extends Controller {
    public function challenge() {
        $files = File::allFiles(public_path('Challenge'));
        $datas = Challenge::all();
        $id = Auth::id();
        $data = $this->queryById($id, 'users');
        $data = json_decode( json_encode($data), true);
        return view('work.challenge', ['isAdmin' => $data['isAdmin'], 'datas' => $datas]);
    }
    public function deleteChallenge($id) {
        $user = Challenge::find($id);
        $user->delete();
        return Redirect::to("challenge");
    }
    public function queryById($id, $table) {
        $data = DB::table($table)->where('id', $id)->first();
        return json_decode( json_encode($data), true);
    }

    public function create(Request $request) {
        if($request->hasFile('file')) {
            $path = "Challenge";
            $file = $request->file('file');
            $content = $request->content;
            echo($content."_".$file->getClientOriginalName());
            $file->move($path, $file->getClientOriginalName());
        }
        try {
            $challenge = new Challenge;
            $challenge->description = $content;
            $challenge->result = $file->getClientOriginalName();
            $challenge->save();
            return redirect('challenge')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('challenge')->with('failed',"operation failed");
        }
    }
    public function submitChallenge(Request $request, $id) {
        $data = DB::table('challenge')->where('id', $id)->first();
        $data = json_decode( json_encode($data), true);
        $resultSubmit = $request->result.".txt";
        $result = $data['result'];
        if($result == $resultSubmit) {
            $path = public_path()."/Challenge/".$data['result'];
            //$content = file_get_contents(base_path($path));
            return view('work.result',['result'=>'correct', 'path' => $path]);
        }
        else {
            return view('work.result',['result'=>'false']);
        }
    }
}
