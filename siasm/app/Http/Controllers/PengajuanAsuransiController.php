<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Models\PengajuanAsuransi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Symfony\Component\Console\Input\Input;

class PengajuanAsuransiController extends Controller
{
    public function indexin()
    {
        if (Auth::user()->role_id == 1){
        // mengambil data dari table pegawai
    	$Pengajuan = DB::table('pengajuan_asuransis')->get();
    	// mengirim data pegawai ke view index
        }
        elseif((Auth::user()->role_id == 2)){
         $Pengajuan = DB::table('pengajuan_asuransis')
                ->where('user_id', Auth::id())->get();
        }
        return view('pengajuan',['Pengajuan' => $Pengajuan]);
        


        
        
    }

    public function download($file)
    {
        $path = storage_path("app/public/$file");
        return response()->download($path);
    }

    //  public function store(Request $request)
    //  {
    //     $a = blog::create([
    //         'name' => 'hallo',
    //         'user_id' => Auth::id()
    //     ]);
    //  }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => [
                'required'
            ],
            'dokumen_asyki' => [
                'required',
                File::types(['pdf'])
            ],
            'dokumen_tagihanrs' => [
                'required',
                File::types(['pdf'])
            ],
            'kartu_asuransi_pnl' => [
                'required',
                File::types(['pdf'])
            ],
            'resume_medis' => [
                'required',
                File::types(['pdf'])
            ],
            'hasil_lab' => [
                'required',
                File::types(['pdf'])
            ],
            'surat_keterangan_meninggal' => [
                'required',
                File::types(['pdf'])
            ],


        ]);
        $Pengajuan = PengajuanAsuransi::create([
            'kategori' => $request->kategori,
            'dokumen_asyki' =>$request->file('dokumen_asyki')->getClientOriginalName(),
            'dokumen_tagihanrs' =>$request->file('dokumen_tagihanrs')->getClientOriginalName(),
            'kartu_asuransi_pnl' => $request->file('kartu_asuransi_pnl')->getClientOriginalName(),
            'resume_medis' => $request->file('resume_medis')->getClientOriginalName(),
            'hasil_lab' => $request->file('hasil_lab')->getClientOriginalName(),
            'surat_keterangan_meninggal' =>$request->file('surat_keterangan_meninggal')->getClientOriginalName(),
            'status' => 'sedang di proses',
            'user_id' => Auth::id()
        ]);
        //dok asyki
            $filenameWithExt = $request->file('dokumen_asyki')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('dokumen_asyki')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('dokumen_asyki')->storeAs('public/files/dok_asyki',$filenameSimpan);
        //dok tagihanrs
            $filenameWithExt = $request->file('dokumen_tagihanrs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('dokumen_tagihanrs')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('dokumen_tagihanrs')->storeAs('public/files/dok_tagihanrs',$filenameSimpan);
        //kartu asuransi
            $filenameWithExt = $request->file('kartu_asuransi_pnl')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('kartu_asuransi_pnl')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('kartu_asuransi_pnl')->storeAs('public/files/kartu_asuransi_pnl',$filenameSimpan);
        //resume medis
            $filenameWithExt = $request->file('resume_medis')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('resume_medis')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('resume_medis')->storeAs('public/files/resume_medis',$filenameSimpan);
        //hasil lab
            $filenameWithExt = $request->file('hasil_lab')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('hasil_lab')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('hasil_lab')->storeAs('public/files/hasil_lab',$filenameSimpan);
        //surat keterangan meninggal
            $filenameWithExt = $request->file('surat_keterangan_meninggal')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('surat_keterangan_meninggal')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('surat_keterangan_meninggal')->storeAs('public/files/surat_keterangan_meninggal',$filenameSimpan);

            return redirect('pengajuan');
    }
    
}
