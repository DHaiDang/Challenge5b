<?php

namespace App\Http\Controllers;
Use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Session;

class WorkController extends Controller {
    public function checks() {
        if(!Auth::check()){
            return redirect('login');
        }
    }
    public function challenge() {
        $this->checks();

        $files = File::allFiles(public_path('Assignment')); 

        $id = Auth::id();
        $data = $this->queryById($id);
        $data = json_decode( json_encode($data), true);
        return view('work.challenge', ['isAdmin' => $data['isAdmin'], 'files' => $files]);
    }

    public function list() {
        $this -> checks();
        $users = DB::table('users')->get();
        $id = Auth::id();
        $data = json_decode( json_encode($this->queryById($id)), true);
        return view('work.list', ['users' => $users, 'isAdmin' => $data['isAdmin']]);
    }

    public function info($id) {
        $this -> checks();
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
        $this -> checks();
        $id = Auth::id();
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

    public function detail($id) {
        $this -> checks();

        $user = DB::table('users')->where('id', $id)->first();
        return view('work.detail', ['user' => $user, 'id' => $id]);
    }

    public function upload(Request $request) {
        $this -> checks();
        if($request->hasFile('file')) {
            $path = "Assignment";
            $file = $request->file('file');
            $file->move($path, $file->getClientOriginalName());
            echo($file->getClientOriginalName());
        }
        // if ($request->hasFile('fileTest')) {
        //     echo("done");
        //     $file = $request->filesTest;
        //     $file->move('app/public/upload', $file->getClientOriginalName());
        //     //Lấy Tên files
        //     echo 'Tên Files: ' . $file->getClientOriginalName();
        //     echo '<br/>';
        //     //Lấy Đuôi File
        //     echo 'Đuôi file: ' . $file->getClientOriginalExtension();
        //     echo '<br/>';
        //     //Lấy đường dẫn tạm thời của file
        //     echo 'Đường dẫn tạm: ' . $file->getRealPath();
        //     echo '<br/>';
        //     //Lấy kích cỡ của file đơn vị tính theo bytes
        //     echo 'Kích cỡ file: ' . $file->getSize();
        //     echo '<br/>';
        //     //Lấy kiểu file
        //     echo 'Kiểu files: ' . $file->getMimeType();
        // }
        return Redirect::to("challenge");
    }
    public function download($file) {
        $path = public_path()."/Assignment/".$file;
        return response()->download($path);
    }
    public function download2($file) {
        $path = public_path()."/Homework/".$file;
        return response()->download($path);
    }
    public function deleteFile($name) {
        $path = public_path()."/Assignment/".$name;
        unlink($path);
        return Redirect::to("challenge");
    }
    public function deleteFile2($name) {
        $path = public_path()."/Homework/".$name;
        unlink($path);
        return Redirect::to("challenge");
    }
    public function update(Request $request,$id) {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            ]);
        $data = $request->all();
        $check = $this->create($data, $id);
        return Redirect::to("info");
    }
    public function create(array $data, $id) {

        return User::where('id',$id)->update([
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function queryById($id) {
        $data = DB::table('users')->where('id', $id)->first();
        $dang = json_decode( json_encode($data), true);
        return $data;
    }
    public function deleteById($id) {
        User::find($id)->delete();
        return;
    }

    public function homework() {

        $files = File::allFiles(public_path('Homework')); 
        $id = Auth::id();
        $data = $this->queryById($id);
        $data = json_decode( json_encode($data), true);
        return view('work.homework', ['isAdmin' => $data['isAdmin'], 'files' => $files]);
    }
    public function uploadHomeWork(Request $request) {
        $this -> checks();
        if($request->hasFile('file')) {
            $path = "Homework";
            $file = $request->file('file');
            $file->move($path, $file->getClientOriginalName());
            echo($file->getClientOriginalName());
        }
        // if ($request->hasFile('fileTest')) {
        //     echo("done");
        //     $file = $request->filesTest;
        //     $file->move('app/public/upload', $file->getClientOriginalName());
        //     //Lấy Tên files
        //     echo 'Tên Files: ' . $file->getClientOriginalName();
        //     echo '<br/>';
        //     //Lấy Đuôi File
        //     echo 'Đuôi file: ' . $file->getClientOriginalExtension();
        //     echo '<br/>';
        //     //Lấy đường dẫn tạm thời của file
        //     echo 'Đường dẫn tạm: ' . $file->getRealPath();
        //     echo '<br/>';
        //     //Lấy kích cỡ của file đơn vị tính theo bytes
        //     echo 'Kích cỡ file: ' . $file->getSize();
        //     echo '<br/>';
        //     //Lấy kiểu file
        //     echo 'Kiểu files: ' . $file->getMimeType();
        // }
        return Redirect::to("homework");
    }

    public function submit($file) {

    }
}