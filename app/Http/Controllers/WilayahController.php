<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wilayah.index');
    }

    public function data()
    {
        $wilayah = Wilayah::orderBy('id_wilayah', 'desc')->get();

        return datatables()
            ->of($wilayah)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wilayah) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('wilayah.update', $wilayah->id_wilayah) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('wilayah.destroy', $wilayah->id_wilayah) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $wilayah = new Wilayah();
        $wilayah->nama_wilayah = $request->nama_wilayah;
        $wilayah->save();

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
        $wilayah = Wilayah::find($id);

        return response()->json($wilayah);
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
        $wilayah = Wilayah::find($id);
        $wilayah->nama_wilayah = $request->nama_wilayah;
        $wilayah->update();

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
        $wilayah = Wilayah::find($id);
        $wilayah->delete();

        return response(null, 204);
    }
}
