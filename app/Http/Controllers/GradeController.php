<?php

namespace App\Http\Controllers;

use App\Models\grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grade = grade::all();
        return response()->json($grade);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kelas'=>'required',
            'walikelas'=>'required',
        ]);
        $grade = grade::create($request->all());
        return response()->json([
            'msg'=>'data berhasil dimasukkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(grade $grade)
    {
        //
        return response()->json($grade);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, grade $grade)
    {
        //
        $request->validate([
            'kelas'=>'required',
            'walikelas'=>'required',
        ]);
        $grade->update($request->all());
        return response()->json([
            'msg'=>'data berhasil di ubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grade $grade)
    {
        //
        $grade->delete();
        return response()->json([
            'msg'=>'data berhasil dihapus'
        ]);
    }
}
