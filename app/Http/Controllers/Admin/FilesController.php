<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\templates;
class FilesController extends Controller
{
    public function store(Request $request) {
       if($request->file('file'))
       {
       $file = $request->file('file');
       $filename = time() . '.' . $request->file('file')->extension();
       $filePath = public_path() . '/files/uploads/';
       $file->move($filePath, $filename);
        
        $templates = templates::create([
            'categories_id' => $request->categories_id,
            'countries_id' => $request->countries_id,
            'message' => $request->message,
            'file' => '/files/uploads/'.$filename
        ]);
       
        

        return response()->json(['message' => 'has']);
       }else {
        return response()->json(['message' => 'Not has']);
       }
    }
}
