<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKendaraan;
use Illuminate\Support\Str;

class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jenis_kendaraan.index');
    }

    public function data()
    {
        $jenis_kendaraan = JenisKendaraan::orderBy('id_jenis_kendaraan', 'desc')->get();

        return datatables()
            ->of($jenis_kendaraan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($jenis_kendaraan) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('jenis_kendaraan.update', $jenis_kendaraan->id_jenis_kendaraan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('jenis_kendaraan.destroy', $jenis_kendaraan->id_jenis_kendaraan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $jenis_kendaraan = new JenisKendaraan();
        $jenis_kendaraan->jenis = $request->jenis;
        $jenis_kendaraan->admin_stnk = Str::replace(',', '', $request->admin_stnk);
        $jenis_kendaraan->admin_tnkb = Str::replace(',', '', $request->admin_tnkb);
        $jenis_kendaraan->save();

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
        $jenis_kendaraan = JenisKendaraan::find($id);

        return response()->json($jenis_kendaraan);
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
        $jenis_kendaraan = JenisKendaraan::find($id);
        $jenis_kendaraan->jenis = $request->jenis;
        $jenis_kendaraan->admin_stnk = Str::replace(',', '', $request->admin_stnk);
        $jenis_kendaraan->admin_tnkb = Str::replace(',', '', $request->admin_tnkb);
        $jenis_kendaraan->update();

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
        $jenis_kendaraan = JenisKendaraan::find($id);
        $jenis_kendaraan->delete();

        return response(null, 204);
    }
}
