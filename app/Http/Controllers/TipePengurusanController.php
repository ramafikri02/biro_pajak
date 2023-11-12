<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipePengurusan;

class TipePengurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipe_pengurusan.index');
    }

    public function data()
    {
        $tipe_pengurusan = TipePengurusan::orderBy('id_tipe_pengurusan', 'desc')->get();

        return datatables()
            ->of($tipe_pengurusan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($tipe_pengurusan) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('tipe_pengurusan.update', $tipe_pengurusan->id_tipe_pengurusan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('tipe_pengurusan.destroy', $tipe_pengurusan->id_tipe_pengurusan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipe_pengurusan = new TipePengurusan();
        $tipe_pengurusan->nama_pengurusan = $request->nama_pengurusan;
        $tipe_pengurusan->biaya_proses = $request->biaya_proses;
        $tipe_pengurusan->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_tipe_pengurusan = TipePengurusan::find($id);

        return response()->json($id_tipe_pengurusan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipe_pengurusan = TipePengurusan::find($id);
        $tipe_pengurusan->nama_pengurusan = $request->nama_pengurusan;
        $tipe_pengurusan->biaya_proses = $request->biaya_proses;
        $tipe_pengurusan->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipe_pengurusan = TipePengurusan::find($id);
        $tipe_pengurusan->delete();

        return response(null, 204);
    }
}
