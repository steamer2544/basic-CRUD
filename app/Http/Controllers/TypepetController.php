<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typepet;
use Illuminate\Support\Facades\Auth;

class TypepetController extends Controller
{
    function index() {   //ฟังช่ั่นแสดงหน้าจอ
        $bin = Typepet::onlyTrashed()->get();
        $typepet = Typepet::paginate(3);   //แสดงแค่ 3 ตัว
        return view('admin.typepet.index')
        ->with('typepet',$typepet)
        ->with('bin',$bin);
    }

    function insert(Request $req) {
        //dd($req->type_name); //dd เป็น function ดูข้อมูล 
        $req->validate([
            'name'=>'required|unique:typepets|max:254',
        ]);

        $typepet = new Typepet;
        $typepet->name = $req->name;
        $typepet->user_id = Auth::user()->id;
        $typepet->save();

        return redirect()->route('typepet')->with('success','insert Typepet Success');
        
    }

    function edit($id) {  
        $typepet = Typepet::find($id);
        return view('admin.typepet.edit')->with('typepet', $typepet);
    }

    function update(Request $req,$id) {
        $req->validate([
            'name'=>'required|max:254',
        ]);

        $typepet = Typepet::find($id);
        $typepet->name = $req->name;
        $typepet->user_id = Auth::user()->id;
        $typepet->save();

        return redirect()->route('typepet')->with('success','Update Typepet Success');
    }

    function softDelete($id) {
        $typepet = Typepet::find($id)->delete();
        return redirect()->route('typepet')->with('success','Move Typepet Success');
    }

    function bin() {
        $bin = Typepet::onlyTrashed()->paginate(3);
        return view('admin.typepet.bin')->with('bin', $bin);
    }

    function restore($id) {
        $restore = Typepet::withTrashed()->find($id)->restore();
        return redirect()->route('bin')->with('success', 'restore success');
    }

    function delete($id) {
        $delete = Typepet::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('bin')->with('success', 'delete success');
    }
}
