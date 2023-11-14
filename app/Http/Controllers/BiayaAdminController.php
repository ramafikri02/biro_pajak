<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiayaAdmin;
use Illuminate\Support\Str;

class BiayaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('biaya_admin.index');
    }

    public function data()
    {
        $biaya_admin = BiayaAdmin::orderBy('id_biaya_admin', 'desc')->get();

        return datatables()
            ->of($biaya_admin)
            ->addIndexColumn()
            ->addColumn('aksi', function ($biaya_admin) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('biaya_admin.update', $biaya_admin->id_biaya_admin) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('biaya_admin.destroy', $biaya_admin->id_biaya_admin) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $biaya_admin = new BiayaAdmin();
        $biaya_admin->nama_admin = $request->nama_admin;
        $biaya_admin->biaya_presentasi = Str::replace(',', '', $request->biaya_presentasi);
        $biaya_admin->save();

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
        $biaya_admin = BiayaAdmin::find($id);

        return response()->json($biaya_admin);
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
        $biaya_admin = BiayaAdmin::find($id);
        $biaya_admin->nama_admin = $request->nama_admin;
        $biaya_admin->biaya_presentasi = Str::replace(',', '', $request->biaya_presentasi);
        $biaya_admin->update();

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
        $biaya_admin = BiayaAdmin::find($id);
        $biaya_admin->delete();

        return response(null, 204);
    }
}
