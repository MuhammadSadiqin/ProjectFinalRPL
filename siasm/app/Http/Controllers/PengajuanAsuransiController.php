<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanAsuransiController extends Controller
{
    public function indexin()
    {
        return view('pengajuanmasuk');
    }

    public function indexout()
    {
        return view('pengajuankeluar');
    }
    
}
