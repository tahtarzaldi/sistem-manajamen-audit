<?php

namespace App\Http\Controllers;

use App\Models\PerencanaanAudit;
use Illuminate\Http\Request;

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
    public function show(PerencanaanAudit $perencanaanAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerencanaanAudit $perencanaanAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerencanaanAudit $perencanaanAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerencanaanAudit $perencanaanAudit)
    {
        //
    }
}
