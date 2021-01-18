<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('new_document');
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'document' => 'required|mimes:doc,pdf,docx,xlsx',
        ]);


        $file = $request->file('document');
        $filename = $file->getClientOriginalName();
        $filename = time() . '.' . $filename;

        $path = $file->storeAs('public', $filename);

        $request->user()->documents()->create([
            'title' => $request->title,
            'description' => $request->description,
            'document_path' => $path,
            'featured' => 0,
            'no_of_downloads' => 0,
        ]);

        return back()->with('status', 'Document uploaded successfully');
    }
}
