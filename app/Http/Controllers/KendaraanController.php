<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\JenisKendaraan;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all()->pluck('nama_pelanggan', 'id_pelanggan');
        $jenis_kendaraan = JenisKendaraan::all()->pluck('jenis', 'id_jenis_kendaraan');

        return view('kendaraan.index', compact('pelanggan', 'jenis_kendaraan'));
    }

    public function data()
    {
        $kendaraan = Kendaraan::orderBy('id_kendaraan', 'desc')->get();

        return datatables()
            ->of($kendaraan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kendaraan) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('kendaraan.update', $kendaraan->id_kendaraan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('kendaraan.destroy', $kendaraan->id_kendaraan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $kendaraan = new Kendaraan();
        $kendaraan->id_pelanggan = $request->id_pelanggan;
        $kendaraan->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $kendaraan->no_plat = $request->no_plat;
        $kendaraan->save();

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
        $kendaraan = Kendaraan::find($id);

        return response()->json($kendaraan);
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
        $kendaraan = Kendaraan::find($id);
        $kendaraan->id_pelanggan = $request->id_pelanggan;
        $kendaraan->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $kendaraan->no_plat = $request->no_plat;
        $kendaraan->update();

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
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();

        return response(null, 204);
    }
}
