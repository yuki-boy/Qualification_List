<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Qualification;
use Illuminate\Support\Facades\Auth;

class QualificationController extends Controller
{
    public function index()
    {
        $qualis = Qualification::all();
        // dd($qualis);
        return view('index', compact('qualis'));
    }

    public function save(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required' => '資格名を入力して下さい'
        ]);

        $quali = new Qualification();
        $quali->name = $request->name;
        $quali->get_date = $request->get_date;
        // $quali->lost_date = $request->lost_date;
        $quali->user_id = Auth::user()->id;
        $quali->save();
        
        return redirect()->back()->with('success', '追加しました');
    }

    public function delete($id)
    {
        Qualification::find($id)->delete();

        return redirect()->back()->with('success', '削除しました');
    }

    public function editPage($id)
    {
        $quali = Qualification::find($id);

        return view('edit', compact('quali'));
    }

    public function edit(Request $request)
    {
        Qualification::find($request->id)->update([
            'name' => $request->name,
            'get_date' => $request->get_date,
        ]);

        return redirect('index')->with('success', '編集しました');
    }


}
