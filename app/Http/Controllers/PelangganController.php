<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index');
    }

    public function data()
    {
        $pelanggan = Pelanggan::orderBy('id_pelanggan', 'desc')->get();

        return datatables()
            ->of($pelanggan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pelanggan) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('pelanggan.update', $pelanggan->id_pelanggan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('pelanggan.destroy', $pelanggan->id_pelanggan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $pelanggan = Pelanggan::latest()->first() ?? new Pelanggan();
        $request['kode_pelanggan'] = 'PLG'. tambah_nol_didepan((int)$pelanggan->id_pelanggan +1, 4);

        $pelanggan = Pelanggan::create($request->all());

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
        $pelanggan = Pelanggan::find($id);

        return response()->json($pelanggan);
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
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->admin = $request->admin;
        $pelanggan->update();

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
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        return response(null, 204);
    }

    public function autocomplete(Request $request)
    {
        $data = Pelanggan::select("id_pelanggan")
                ->where("id_pelanggan","LIKE","%{$request->query}%")
                ->get();
   
        return response()->json($data);
    }
}
