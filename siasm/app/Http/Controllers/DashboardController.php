<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $Pengajuan = DB::table('pengajuan_asuransis')->get();
        $jumlahpengajuan = $Pengajuan->count();
        $Pengajuan = DB::table('pengajuan_asuransis')->where('status','=','ditolak')->get();
        $ditolak = $Pengajuan->count();
        $Pengajuan = DB::table('pengajuan_asuransis')->where('status','=','diterima')->get();
        $diterima = $Pengajuan->count();
        return view('dashboard', ['jumlahpengajuan'=> $jumlahpengajuan,'ditolak' => $ditolak,'diterima' => $diterima]);
    }
    
}
