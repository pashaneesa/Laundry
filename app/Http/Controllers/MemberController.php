<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all()->toArray();
        return $member;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $member = Member::create([
            'nama_member' => $request->nama_member,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp
        ]);
        if($member) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function show($id)
    {
        $member = Member::find($id);
        return $member;
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);
        $member = Member::find($id);
        $member->update($request->all());
        if($member) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        if($member) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

}
