<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Auth;
class FileController extends Controller
{
    public function index()
    {
        return view('file-manager/file-upload');
    }
    public function store(Request $request)
    {
        $this->validate($request, ['file' => 'required']);
        $this->validate($request, ['pattern_name' => 'required']);
        if($request->hasfile('file'))
         {
            $directory = 'stash-storage/'.$request->user_id.'/' . str_slug($request->pattern_name, '-');
            Storage::disk('s3')->makeDirectory($directory);
            $file = $request->file('file');
            $name=time().$file->getClientOriginalName();
            $filePath = $directory .'/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            return back()->with('success','Image Uploaded successfully');
         }
    }
    public function list_of_files()
    {
        $user = Auth::user();
        $directories = Storage::disk('s3')->directories('stash-storage/'.$user->id);
        dd($directories);
        // foreach($directories as $folder){
        //     $folder_title = str_replace("-"," ",$folder);
        // }

        // $files = Storage::disk('s3')->allFiles('stash-storage/'.$user->id); 
        // dd($files);
        return view('file-manager/file-viewer', compact('directories'));
    }
}
