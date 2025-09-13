<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    function store(Request $request){
        Memo::create([
            'text' => $request['text'],
        ]);
    }

    function index(){
        $memos = Memo::all();
        return response()->json($memos);
    }
}
