<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FileController extends Controller
{
    public function index()
    {
        return view('file-manager/file-upload');
    }
    public function store(Request $request)
    {
        $this->validate($request, ['file' => 'required']);
        if($request->hasfile('file'))
         {
            $file = $request->file('file');
            $name=time().$file->getClientOriginalName();
            $filePath = 'files/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            return back()->with('success','Image Uploaded successfully');
         }
    }
}
