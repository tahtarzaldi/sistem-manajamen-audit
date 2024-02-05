<?php

namespace App\Http\Controllers;

use App\Models\PerencanaanAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PerencanaanAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audit = PerencanaanAudit::all();
        $user = auth()->user();
        return view('audit/audit',
            [
                'user' => $user,
                'audit' => $audit,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('audit/tambah',
            [
                'user' => $user,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('perencanaan_audit')->insert([
            'tujuan_audit' => $request->tujuan_audit,
            'ruang_lingkup' => $request->ruang_lingkup,
            'tim_audit' => $request->tim_audit,
            'tgl_mulai' => date('Y-m-d', strtotime($request->tgl_mulai)),
            'tgl_selesai' => date('Y-m-d', strtotime($request->tgl_selesai)),
            'sumber_daya' => $request->sumber_daya,
            'teknik_audit' => $request->teknik_audit,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/audit');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $audit = DB::table('perencanaan_audit')->where('id',$id)->get();
        $user = auth()->user();
        
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('audit/detail',[
            'audit' => $audit,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $audit = DB::table('perencanaan_audit')->where('id',$id)->get();
        $user = auth()->user();
        
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('audit/edit',[
            'audit' => $audit,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerencanaanAudit $perencanaanAudit)
    {
        DB::table('perencanaan_audit')->where('id',$request->id)->update([
            'tujuan_audit' => $request->tujuan_audit,
            'ruang_lingkup' => $request->ruang_lingkup,
            'tim_audit' => $request->tim_audit,
            'tgl_mulai' => date('Y-m-d', strtotime($request->tgl_mulai)),
            'tgl_selesai' => date('Y-m-d', strtotime($request->tgl_selesai)),
            'sumber_daya' => $request->sumber_daya,
            'teknik_audit' => $request->teknik_audit,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/audit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('perencanaan_audit')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/audit');
    }
}
