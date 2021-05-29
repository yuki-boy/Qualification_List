<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Qualification;


class QualificationController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function save(Request $request)
    {
        // バリデーション追加
        $validatedDate = $request->validate([
            'name' => 'required',
        ]);

        $quali = new Qualification();
        $quali->name = $request->name;
        $quali->user_id = Auth::id();
        $quali->save();
        
        return redirect('index');
    }

}
