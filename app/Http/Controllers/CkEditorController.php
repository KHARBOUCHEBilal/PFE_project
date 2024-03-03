<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkEditorController extends Controller
{
    public function uploadImage(Request $request){
        
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName , PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('/uploads/media'), $fileName);

            $url = asset('/uploads/media/' . $fileName);

            return response()->json(['fileName'=> $fileName, 'uploaded' => 1 ,'url' => $url]);
        }
    }
}