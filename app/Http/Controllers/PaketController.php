<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all()->toArray();
        return $paket;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_paket' => 'required',
            'harga' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $paket = Paket::create([
            'jenis_paket' => $request->jenis_paket,
            'harga' => $request->harga
        ]);
        if($paket) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function show($id)
    {
        $paket = Paket::find($id);
        return $paket;
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_paket' => 'required',
            'harga' => 'required',
        ]);
        $paket = Paket::find($id);
        $paket->update($request->all());
        if($paket) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $paket = Paket::find($id);
        $paket->delete();
        if($paket) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
