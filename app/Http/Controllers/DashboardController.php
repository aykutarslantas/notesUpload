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
            return view('userdash');
        }elseif (Auth::user()->hasRole('administrator')) {
            return view('admindash');
        } elseif (Auth::user()->hasRole('superadministrator')) {
            return view('superdash');
        }
    }

    public function mynotes()
    {
        $notes = DB::table('notes')->get();

        return view('mynotes',['notes' => $notes]);
    }

    public function deleteNote(Request $request) {
        $delete = DB::table('notes')->delete($request->id);
        return $this->mynotes();
    }

    public function changeNote(Request $request) {
        $update = DB::table('notes')
            ->where('id',$request->id)
            ->update(['notes' => $request->note]);
        return $this->mynotes();
    }

    public function changeNoteRequest(Request $request) {
        $data = DB::table('notes')->where('id', $request->id)->get();
        return view('change',['data' => $data,'id' => $request->id]);
    }
}
