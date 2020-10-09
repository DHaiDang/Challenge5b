<?php

namespace App\Http\Controllers;
Use App\Models\User;
Use App\Models\Inbox;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Session;

class WorkController extends Controller {
    
    public function list() {
        $users = DB::table('users')->get();
        $id = Auth::id();
        $data = json_decode( json_encode($this->queryById($id, 'users')), true);
        return view('work.list', ['users' => $users, 'isAdmin' => $data['isAdmin']]);
    }
    public function info($id) {
        $data = $this->queryById($id);
        $data = json_decode( json_encode($data), true);
        return view('work.info', [
            'id' => $data['id'],
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'password' => $data['password'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }
    public function infoo() {
        $id = Auth::id();
        $data = $this->queryById($id, 'users');
        return view('work.info', [
            'id' => $data['id'],
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'password' => $data['password'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }
    public function detail($id) {
        $idSend = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();
        return view('work.detail', ['user' => $user, 'idReceive' => $id, 'idSend' => $idSend]);
    }
    public function update(Request $request,$id) {
        request()->validate([
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->all();
        $check = $this->create($data, $id);
        return Redirect::to("infoo");
    }
    public function create(array $data, $id) {
        return User::where('id',$id)->update([
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function queryById($id, $table) {
        $data = DB::table($table)->where('id', $id)->first();
        return json_decode( json_encode($data), true);
    }
    public function deleteById($id) {
        User::find($id)->delete();
        return Redirect::to("list");
    }
    public function homework() {
        $files = File::allFiles(public_path('Homework'));
        $filess = File::allFiles(public_path('Submission'));
        $id = Auth::id();
        $data = $this->queryById($id, 'users');
        $data = json_decode( json_encode($data), true);
        return view('work.homework', ['isAdmin' => $data['isAdmin'], 'files' => $files,'filess' => $filess, 'id' => $data['id']]);
    }
    
    public function message() {
        $idReceive = Auth::id();
        $data = DB::table('inbox')->where('idReceive' ,$idReceive)->get();
        $dataSend = DB::table('inbox')->where('idSend' ,$idReceive)->get();

        return view('work.myMess',['data'=> $data, 'dataSend' => $dataSend]);
    }
    public function createMess($idSend, $idReceive, $content) {
        try{
            $inbox = new Inbox;
            $inbox->message = $content;
            $inbox->idReceive = $idReceive;
            $inbox->idSend = $idSend;
            $inbox->save();
            return redirect('list')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('list')->with('failed',"operation failed");
        }
    }
    public function send(Request $request ,$idSend, $idReceive) {
        $send = $this->queryById($idSend, 'users')['username'].": ".$request->content;
        // $receive = $this->queryById($idReceive);
        $this->createMess($idSend, $idReceive, $send);
        return Redirect::to("list");
    }
    public function deleteMess($id) {
        $inbox = Inbox::find($id);
        $inbox->delete();
        return Redirect::to("message");
    }
    public function submit( Request $request,$id) {
        $name = $this->queryById($id, 'users')['username'];
        if($request->hasFile('file')) {
            $path = "Submission";
            $file = $request->file('file');
            $nameFile = $name."_".$file->getClientOriginalName();
            $file->move($path, $nameFile);
            echo($file->getClientOriginalName());
        }
        return Redirect::to("homework");
    }
}