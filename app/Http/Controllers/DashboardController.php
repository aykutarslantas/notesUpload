<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $notes = DB::table('notes')->get();
            return view('userdash',['notes' => $notes]);
        }elseif (Auth::user()->hasRole('administrator')) {
            return view('admindash');
        } elseif (Auth::user()->hasRole('superadministrator')) {
            return view('superdash');
        } else {
            echo 1231;
        }
    }

    public function deleteNote(Request $request) {
        $delete = DB::table('notes')->delete($request->id);
        return $this->index();
    }

    public function changeNote(Request $request) {
        $update = DB::table('notes')
            ->where('id',$request->id)
            ->update(['notes' => $request->note]);
        return $this->index();
    }

    public function changeNoteRequest(Request $request) {
        $data = DB::table('notes')->where('id', $request->id)->get();
        return view('change',['data' => $data,'id' => $request->id]);
    }

    public function share(Request $request) {

        $data = DB::table('notes')->where('id', $request->id)->get();
        return view('share',['note' => $data[0]->notes,'image' => $data[0]->image]);
    }
}
