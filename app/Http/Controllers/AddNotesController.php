<?php

namespace App\Http\Controllers;

use App\Models\notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AddNotesController extends Controller
{
    public function createForm()
    {
        return view('image-upload');
    }


    public function fileUpload(Request $req)
    {
        $req->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if ($req->hasfile('imageFile')) {

            $file = $req->file('imageFile');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $name);


            $fileModal = new notes();
            $fileModal->user_id = Auth::user()->getAuthIdentifier();
            $fileModal->notes = $req->note;
            $fileModal->image = $name;
            $fileModal->created_at = date("Y-m-d H:i:s");


            $fileModal->save();

            return back()->with('success', 'Notes has successfully saved!');
        }
    }
}
