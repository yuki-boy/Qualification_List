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
        $qualis = Qualification::select('id', 'name', 'get_date', 'lost_date', 'sort_num')
            ->where('user_id','=',Auth::id())
            // ->orderBy('qualifications.sort_num')
            ->increment('qualifications.sort_num')
            // ->get();

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
        $quali->lost_date = $request->lost_date;
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
            'lost_date' => $request->lost_date,
        ]);

        return redirect('/')->with('success', '編集しました');
    }

    public function update(Request $request)
    {
        $lists = explode(",", $request->list_ids);
        $sorted_list = [];
        foreach($lists as $index => $id) {
            array_push($sorted_list, ['id' => $id, 'sort_num' => $index]);
        }
        
        foreach($sorted_list as $list) {
            Qualification::find($list['id'])->update([
                'sort_num' => $list['sort_num']
            ]);
        }
        
        return redirect('/');
    }


}
