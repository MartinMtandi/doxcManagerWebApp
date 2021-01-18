<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Download;
use App\Models\Reading;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $count = Download::count();
        $total = Reading::count();
        $documents = Document::with(['user'])->latest()->paginate(10);
        return view("dashboard", ['documents' => $documents, 'count' => $count, 'total' => $total]);
    }

    public function edit(Document $document){

        if($document->featured === '0'){
            $document->featured = '1';
        }else if($document->featured === '1'){
            $document->featured = '0';
        }

        $document->save();

        return back();
    }

    public function destroy(Document $document){

        Storage::delete($document->document_path);
        $document->delete();

        return back();
    }
}
