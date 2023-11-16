<?php

namespace App\Http\Controllers;

use App\Models\Estimasi;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\TipePengurusan;
use App\Models\Wilayah;
use App\Models\BiayaAdmin;
use App\Models\JenisKendaraan;
use App\Models\upping;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstimasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe_pengurusan = TipePengurusan::all()->pluck('nama_pengurusan', 'id_tipe_pengurusan');
        $wilayah = Wilayah::all()->pluck('nama_wilayah', 'id_wilayah');
        $kendaraan = Kendaraan::all()->pluck('no_plat', 'id_kendaraan');
        $pelanggan = Pelanggan::all()->pluck('nama_pelanggan', 'id_pelanggan');
        $jenis_kendaraan = JenisKendaraan::all()->pluck('jenis', 'id_jenis_kendaraan');
        $adminTnkbData = JenisKendaraan::pluck('admin_tnkb', 'id_jenis_kendaraan')->toArray();
        $adminStnkData = JenisKendaraan::pluck('admin_stnk', 'id_jenis_kendaraan')->toArray();
        $biayaProsesData = TipePengurusan::pluck('biaya_proses', 'id_tipe_pengurusan')->toArray();
        $biayaAdminData = BiayaAdmin::pluck('biaya_presentasi', 'id_biaya_admin')->toArray();
        $biaya_admin = BiayaAdmin::all()->pluck('nama_admin', 'id_biaya_admin');
        $biaya_uppings = upping::all()->pluck('biaya', 'id_upping');
        $estimasi = Estimasi::with('tipe_pengurusan', 'wilayah', 'kendaraan', 'pelanggan', 'jenis_kendaraan', 'adminTnkbData', 'adminStnkData', 'biayaProsesData','biayaAdminData', 'biaya_admin', 'biaya_uppings');
        return view('estimasi.index', compact('tipe_pengurusan', 'wilayah', 'kendaraan', 'pelanggan','jenis_kendaraan', 'adminTnkbData', 'adminStnkData', 'biayaProsesData', 'biayaAdminData', 'biaya_admin', 'biaya_uppings', 'estimasi'));
    }

    public function data()
    {
        $estimasi = Estimasi::orderBy('id_estimasi', 'desc')->get();

        return datatables()
        ->of($estimasi)
        ->addIndexColumn()
        ->addColumn('aksi', function ($estimasi) {
            return '
            <div class="btn-group">
            <a href="http://127.0.0.1:8000/estimasi/edit/' . $estimasi->id_estimasi . '" class="btn btn-info btn-xs btn-flat">
                <i class="fa fa-pencil">
                </i>
            </a>
            
            <button onclick="deleteData(`'. route('estimasi.destroy', $estimasi->id_estimasi) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            <a href="http://127.0.0.1:8000/estimasi/detail/' . $estimasi->id_estimasi . '" class="btn btn-secondary btn-xs btn-flat">
                <i class="fa fa-eye">
                </i>
            </a>
            </div>';
        })
        
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function detail($id)
    {
        $estimasi = Estimasi::find($id);
        return view('estimasi.detail', compact('estimasi'));
    }


    public function create()
    {
        $tipe_pengurusan = TipePengurusan::all()->pluck('nama_pengurusan', 'id_tipe_pengurusan');
        $wilayah = Wilayah::all()->pluck('nama_wilayah', 'id_wilayah');
        $kendaraan = Kendaraan::all()->pluck('no_plat', 'id_kendaraan');
        $pelanggan = Pelanggan::all()->pluck('nama_pelanggan', 'id_pelanggan');
        $jenis_kendaraan = JenisKendaraan::all()->pluck('jenis', 'id_jenis_kendaraan');
        $adminTnkbData = JenisKendaraan::pluck('admin_tnkb', 'id_jenis_kendaraan')->toArray();
        $adminStnkData = JenisKendaraan::pluck('admin_stnk', 'id_jenis_kendaraan')->toArray();
        $biayaProsesData = TipePengurusan::pluck('biaya_proses', 'id_tipe_pengurusan')->toArray();
        $biayaAdminData = BiayaAdmin::pluck('biaya_presentasi', 'id_biaya_admin')->toArray();
        $biaya_admin = BiayaAdmin::all()->pluck('nama_admin', 'id_biaya_admin');
        $biaya_uppings = upping::all()->pluck('biaya', 'id_upping');

        return view('estimasi.create', compact('tipe_pengurusan', 'wilayah', 'kendaraan', 'jenis_kendaraan', 'biaya_admin', 'pelanggan', 'adminTnkbData', 'adminStnkData', 'biayaProsesData', 'biayaAdminData', 'biaya_uppings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estimasi = new Estimasi();
        // $estimasi->no_plat = $request->no_plat;
        $estimasi->no_plat = $request->no_plat;
        $estimasi->nilai_pkb = Str::replace(',', '', $request->nilai_pkb);
        $estimasi->swdkllj = Str::replace(',', '', $request->swdkllj);
        $estimasi->masa_berlaku_stnk = $request->masa_berlaku_stnk;
        $estimasi->id_tipe_pengurusan = $request->id_tipe_pengurusan;
        $estimasi->id_wilayah = $request->id_wilayah;
        $estimasi->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $estimasi->id_pelanggan = $request->id_pelanggan;
        $estimasi->id_upping = $request->id_upping;
        $estimasi->admin_stnk = Str::replace(',', '', $request->admin_stnk);
        $estimasi->admin_tnkb = Str::replace(',', '', $request->admin_tnkb);
        $estimasi->biaya_proses = Str::replace(',', '', $request->biaya_proses);
        $estimasi->biaya_admin_pelanggan = Str::replace(',', '', $request->biaya_admin_pelanggan);
        $estimasi->upping = Str::replace(',', '', $request->upping);
        $estimasi->biaya_estimasi = Str::replace(',', '', $request->biaya_estimasi);
        $estimasi->save();

        return Redirect::to('/estimasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estimasi = Estimasi::find($id);

        return response()->json($estimasi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $estimasi = Estimasi::find($id);
        $tipe_pengurusan = TipePengurusan::all()->pluck('nama_pengurusan', 'id_tipe_pengurusan');
        $wilayah = Wilayah::all()->pluck('nama_wilayah', 'id_wilayah');
        $kendaraan = Kendaraan::all()->pluck('no_plat', 'id_kendaraan');
        $pelanggan = Pelanggan::all()->pluck('nama_pelanggan', 'id_pelanggan');
        $jenis_kendaraan = JenisKendaraan::all()->pluck('jenis', 'id_jenis_kendaraan');
        $adminTnkbData = JenisKendaraan::pluck('admin_tnkb', 'id_jenis_kendaraan')->toArray();
        $adminStnkData = JenisKendaraan::pluck('admin_stnk', 'id_jenis_kendaraan')->toArray();
        $biayaProsesData = TipePengurusan::pluck('biaya_proses', 'id_tipe_pengurusan')->toArray();
        $biayaAdminData = BiayaAdmin::pluck('biaya_presentasi', 'id_biaya_admin')->toArray();
        $biaya_admin = BiayaAdmin::all()->pluck('nama_admin', 'id_biaya_admin');
        $biaya_uppings = upping::all()->pluck('biaya', 'id_upping');

        return view('estimasi.edit', compact('estimasi', 'tipe_pengurusan', 'wilayah', 'kendaraan', 'jenis_kendaraan', 'biaya_admin', 'pelanggan', 'adminTnkbData', 'adminStnkData', 'biayaProsesData', 'biayaAdminData', 'biaya_uppings'));
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
        $estimasi = Estimasi::findorfail($id);
        // $estimasi->no_plat = $request->no_plat;
        $estimasi->no_plat = $request->no_plat;
        $estimasi->nilai_pkb = Str::replace(',', '', $request->nilai_pkb);
        $estimasi->swdkllj = Str::replace(',', '', $request->swdkllj);
        $estimasi->masa_berlaku_stnk = $request->masa_berlaku_stnk;
        $estimasi->id_tipe_pengurusan = $request->id_tipe_pengurusan;
        $estimasi->id_wilayah = $request->id_wilayah;
        $estimasi->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $estimasi->id_pelanggan = $request->id_pelanggan;
        $estimasi->id_upping = $request->id_upping;
        $estimasi->admin_stnk = Str::replace(',', '', $request->admin_stnk);
        $estimasi->admin_tnkb = Str::replace(',', '', $request->admin_tnkb);
        $estimasi->biaya_proses = Str::replace(',', '', $request->biaya_proses);
        $estimasi->biaya_admin_pelanggan = Str::replace(',', '', $request->biaya_admin_pelanggan);
        $estimasi->upping = Str::replace(',', '', $request->upping);
        $estimasi->biaya_estimasi = Str::replace(',', '', $request->biaya_estimasi);
        $estimasi->save();

        return redirect('/estimasi')->with('success','Data Estimasi Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estimasi = Estimasi::find($id);
        $estimasi->delete();

        return response(null, 204);
    }
     
    public function checkNomorPlat(Request $request, $nomor_plat)
    {
        $nomorPlatExists = Estimasi::where('no_plat', $nomor_plat)->exists();

        return response()->json(['nomorPlatExists' => $nomorPlatExists]);
    }
    public function getIdEstimasiByNomorPlat($nomor_plat)
    {
        $estimasi = Estimasi::where('no_plat', $nomor_plat)->first();

        if ($estimasi) {
            return response()->json(['id_estimasi' => $estimasi->id_estimasi]);
        } else {
            return response()->json(['id_estimasi' => null]);
        }
    }

}
