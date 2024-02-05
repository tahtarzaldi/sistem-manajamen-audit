<?php

namespace App\Http\Controllers;

use App\Models\PelaksanaanAudit;
use App\Models\PerencanaanAudit;
use App\Http\Requests\StorePelaksanaanAuditRequest;
use App\Http\Requests\UpdatePelaksanaanAuditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PelaksanaanAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$pelaksanaan = PelaksanaanAudit::all();
        $user = auth()->user();
        $pelaksanaan = PelaksanaanAudit::join('perencanaan_audit', 'perencanaan_audit.id', '=', 'pelaksanaan_audit.id_perencanaan')
             ->select('pelaksanaan_audit.*', 'perencanaan_audit.tujuan_audit as tujuan')
             ->get();
        return view('pelaksanaan/pelaksanaan',
            [
                'user' => $user,
                'pelaksanaan' => $pelaksanaan,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $perencanaan = PerencanaanAudit::all();

        return view('pelaksanaan/tambah',
            [
                'user' => $user,
                'perencanaan' => $perencanaan,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelaksanaanAuditRequest $request)
    {
        // insert data ke table pegawai
        DB::table('pelaksanaan_audit')->insert([
            'id_perencanaan' => $request->id_perencanaan,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
            'tgl_pemeriksanaan' => date("Y-m-d"),
            'catatan' => $request->catatan,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pelaksanaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PelaksanaanAudit $pelaksanaanAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pelaksanaan = DB::table('pelaksanaan_audit')->where('id',$id)->get();
        $perencanaan = PerencanaanAudit::all();
        $user = auth()->user();
        
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('pelaksanaan/edit',[
            'pelaksanaan' => $pelaksanaan,
            'perencanaan' => $perencanaan,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelaksanaanAuditRequest $request, PelaksanaanAudit $pelaksanaanAudit)
    {
        DB::table('pelaksanaan_audit')->where('id',$request->id)->update([
            'id_perencanaan' => $request->id_perencanaan,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
            'tgl_pemeriksanaan' => date("Y-m-d"),
            'catatan' => $request->catatan,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pelaksanaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('pelaksanaan_audit')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/pelaksanaan');
    }
}
