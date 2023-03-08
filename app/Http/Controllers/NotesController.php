<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use File;
use Image;
use Str;

class NotesController extends Controller
{

    public function index()
    {
        $notes=[];
        $notes=Note::get();
        $path=config('global.Notesfetch');
        foreach($notes as $note){
            $notes->notesFile = !empty($note->file) ? config('global.Notesfetch').$note->file : '';
        }
        return view('Notes.Notes',compact('notes','path'));
    }
    public function create()
    {
        return view('Notes.AddNotes');
    }
    public function store(Request $request)
    {
       $notes= new Note ;
       $notes->title=$request->title;
       $notes->subject=$request->subject;
       $notes->class=$request->class;
       $notes->file=$this->uploadNotes($request->file);
       $notes->save();

    }
    public function uploadNotes($file_name){
        //$id = (int)base64_decode($id);
        
        $originalImgStorage = config('global.NotesUpload');
        if (!File::exists($originalImgStorage)) {

            File::makeDirectory($originalImgStorage, 0755, true);
        }
        if($file_name->getClientOriginalExtension()=="jpg"||$file_name->getClientOriginalExtension()=="png"){
            $filename = Str::random(20) .'.'.$file_name->getClientOriginalExtension();
            $originalimgpath = $originalImgStorage . '/' . $filename;
            Image::make(file_get_contents($file_name))->save($originalimgpath);
        }else{
            $filenameWithExt = $file_name->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file_name->getClientOriginalExtension();
            $fileNameToStore = $filename . '-' . time() . '.' . $extension;
            $filename = Str::random(20) .  '.'.$extension;
            $path = $file_name->move($originalImgStorage, $filename);

        }
        return $filename;

       }
   

    
}
