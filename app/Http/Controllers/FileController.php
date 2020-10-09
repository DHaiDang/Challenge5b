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

class FileController extends Controller {
    // ============== for challenge ===================
    public function upload(Request $request) {
        if($request->hasFile('file')) {
            $path = "Challenge";
            $file = $request->file('file');
            $file->move($path, $file->getClientOriginalName());
            echo($file->getClientOriginalName());
        }
        return Redirect::to("challenge");
    }
    public function download($file) {
        $path = public_path()."/Challenge/".$file;
        return response()->download($path);
    }
    public function deleteFile($name) {
        $path = public_path()."/Challenge/".$name;
        unlink($path);
        return Redirect::to("challenge");
    }

    // =============== for homework ====================
    public function uploadHomeWork(Request $request) {
        if($request->hasFile('file')) {
            $path = "Homework";
            $file = $request->file('file');
            $file->move($path, $file->getClientOriginalName());
            echo($file->getClientOriginalName());
        }
        return Redirect::to("homework");
    }
    public function download2($file) {
        $path = public_path()."/Homework/".$file;
        return response()->download($path);
    }
    public function download22($file) {
        $path = public_path()."/Submission/".$file;
        return response()->download($path);
    }
    public function deleteFile2($name) {
        $path = public_path()."/Homework/".$name;
        unlink($path);
        return Redirect::to("homework");
    }
    public function deleteFile3($name) {
        $path = public_path()."/Submission/".$name;
        unlink($path);
        return Redirect::to("homework");
    }
    
    
}