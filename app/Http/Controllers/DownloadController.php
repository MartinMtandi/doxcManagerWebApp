<?php

namespace App\Http\Controllers;

use App\Models\Document;
// use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function store(Document $document){
        $document->no_of_downloads = $document->no_of_downloads + 1;
        $document->save();
        $document->downloads()->create([
            'document_id' => $document->id
        ]);

        return response()->file(storage_path('app/' . $document->document_path));
    }

    public function preview(Document $document){

        $document->readings()->create([
            'document_id' => $document->id
        ]);

        return back();
    }


}
