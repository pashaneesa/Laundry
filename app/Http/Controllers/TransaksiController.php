<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all()->toArray();
        return $transaksi;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_member' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'status' => 'required',
            'bayar' => 'required',
            'id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $transaksi = Transaksi::create([
            'id_member' => $request->id_member,
            'tgl' => $request->tgl,
            'batas_waktu' => $request->batas_waktu,
            'tgl_bayar' => $request->tgl_bayar,
            'status' => $request->status,
            'bayar' => $request->bayar,
            'id' => $request->id
        ]);
        if($transaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return $transaksi;
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_member' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'status' => 'required',
            'bayar' => 'required',
            'id' => 'required'
        ]);
        $transaksi = Transaksi::find($id);
        $transaksi->update($request->all());
        if($transaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        if($transaksi) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
