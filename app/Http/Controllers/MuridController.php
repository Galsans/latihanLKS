<?php

namespace App\Http\Controllers;

use App\Models\murid;
use App\Models\grade;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $murid = murid::with('grade')->get();
        return response()->json($murid);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'grade_id' => 'required'
        ]);
        $murid = murid::create($request->all());
        if ($murid) {
            return response()->json([
                'data' => $murid
            ]);
        } else {
            return response()->json([
                'msg' => 'Data Error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // $murid = murid::find($id);
        $murid = murid::with(['grade'])->find($id);
        // $murid = murid::whereIn('grades');
        return response()->json($murid);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, murid $murid)
    {
        //
        // $murid = murid::find($id);
        $request->validate([
            'nama' => 'required',
            'grade_id' => 'required',
        ]);

        $murid->update($request->all());

        return response()->json([
            'msg' => 'data berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(murid $murid)
    {
        //
        $murid->delete();
        return response()->json([
            'msg' => 'data berhasil dihapus'
        ]);
    }

    public function getKelas($id)
    {
        $grade = grade::where("grade_id", $id)->get();
        return response()->json($grade);
    }
}
