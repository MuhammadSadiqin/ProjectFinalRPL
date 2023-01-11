<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Models\PengajuanAsuransi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Symfony\Component\Console\Input\Input;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;

class PengajuanAsuransiController extends Controller
{
    public function indexin()
    {
        if (Auth::user()->role_id == 1) {
            // mengambil data dari table pegawai
            $Pengajuan = DB::table('pengajuan_asuransis')
                ->join('mahasiswas', 'pengajuan_asuransis.user_id', '=', 'mahasiswas.user_id')
                ->select('mahasiswas.nama', 'mahasiswas.nim', 'mahasiswas.prodi', 'mahasiswas.jurusan', 'pengajuan_asuransis.*')
                ->get();
            // mengirim data pegawai ke view index
        } elseif ((Auth::user()->role_id == 2)) {
            $Pengajuan = DB::table('pengajuan_asuransis')
                ->join('mahasiswas', 'pengajuan_asuransis.user_id', '=', 'mahasiswas.user_id')
                ->select('mahasiswas.nama', 'mahasiswas.nim', 'mahasiswas.prodi', 'mahasiswas.jurusan', 'pengajuan_asuransis.*')
                ->where('pengajuan_asuransis.user_id', Auth::id())->get();
        }
        return view('pengajuan', ['Pengajuan' => $Pengajuan]);
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
            'dokumen_asyki' => $request->file('dokumen_asyki')->getClientOriginalName(),
            'dokumen_tagihanrs' => $request->file('dokumen_tagihanrs')->getClientOriginalName(),
            'kartu_asuransi_pnl' => $request->file('kartu_asuransi_pnl')->getClientOriginalName(),
            'resume_medis' => $request->file('resume_medis')->getClientOriginalName(),
            'hasil_lab' => $request->file('hasil_lab')->getClientOriginalName(),
            'surat_keterangan_meninggal' => $request->file('surat_keterangan_meninggal')->getClientOriginalName(),
            'status' => 'sedang di proses',
            'user_id' => Auth::id()
        ]);
        //dok asyki
        $filenameWithExt = $request->file('dokumen_asyki')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('dokumen_asyki')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('dokumen_asyki')->storeAs('public/files/dok_asyki', $filenameSimpan);
        //dok tagihanrs
        $filenameWithExt = $request->file('dokumen_tagihanrs')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('dokumen_tagihanrs')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('dokumen_tagihanrs')->storeAs('public/files/dok_tagihanrs', $filenameSimpan);
        //kartu asuransi
        $filenameWithExt = $request->file('kartu_asuransi_pnl')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('kartu_asuransi_pnl')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('kartu_asuransi_pnl')->storeAs('public/files/kartu_asuransi_pnl', $filenameSimpan);
        //resume medis
        $filenameWithExt = $request->file('resume_medis')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('resume_medis')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('resume_medis')->storeAs('public/files/resume_medis', $filenameSimpan);
        //hasil lab
        $filenameWithExt = $request->file('hasil_lab')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('hasil_lab')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('hasil_lab')->storeAs('public/files/hasil_lab', $filenameSimpan);
        //surat keterangan meninggal
        $filenameWithExt = $request->file('surat_keterangan_meninggal')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('surat_keterangan_meninggal')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('surat_keterangan_meninggal')->storeAs('public/files/surat_keterangan_meninggal', $filenameSimpan);

        return redirect('pengajuan');
    }

    public function ditolak(Request $request)
    {
        $filenameWithExt = $request->file('surat_keterangan_ditolak')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('surat_keterangan_ditolak')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('surat_keterangan_ditolak')->storeAs('public/files/dok_status', $filenameSimpan);


        $Pengajuan = PengajuanAsuransi::find($request->id);
        $Pengajuan->nominal = '-';
        $Pengajuan->status = 'ditolak';
        $Pengajuan->dokumen_status = $filenameSimpan;
        $Pengajuan->save();
        return redirect('pengajuan');
    }
    public function diterima(Request $request)
    {
        $filenameWithExt = $request->file('surat_keterangan_diterima')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('surat_keterangan_diterima')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('surat_keterangan_diterima')->storeAs('public/files/dok_status', $filenameSimpan);


        $Pengajuan = PengajuanAsuransi::find($request->id);
        $Pengajuan->nominal = $request->nominal;
        $Pengajuan->status = 'diterima';
        $Pengajuan->dokumen_status = $filenameSimpan;
        $Pengajuan->save();
        return redirect('pengajuan');
    }

    public function edit(Request $request)
    {
        $Pengajuan = PengajuanAsuransi::find($request->id);
        if ($request->hasFile('dokumen_asyki')) {
            $filenameWithExt = $request->file('dokumen_asyki')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('dokumen_asyki')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('dokumen_asyki')->storeAs('public/files/dok_asyki', $filenameSimpan);
            $Pengajuan->dokumen_asyki = $filenameSimpan;
        }
        if ($request->hasFile('dokumen_tagihanrs')) {
            $filenameWithExt = $request->file('dokumen_tagihanrs')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('dokumen_tagihanrs')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('dokumen_tagihanrs')->storeAs('public/files/dok_tagihanrs', $filenameSimpan);
            $Pengajuan->dokumen_tagihanrs = $filenameSimpan;
        }
        if ($request->hasFile('kartu_asuransi_pnl')) {
            $filenameWithExt = $request->file('kartu_asuransi_pnl')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('kartu_asuransi_pnl')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('kartu_asuransi_pnl')->storeAs('public/files/kartu_asuransi_pnl', $filenameSimpan);
            $Pengajuan->kartu_asuransi_pnl = $filenameSimpan;
        }
        if ($request->hasFile('resume_medis')) {
            $filenameWithExt = $request->file('resume_medis')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('resume_medis')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('resume_medis')->storeAs('public/files/resume_medis', $filenameSimpan);
            $Pengajuan->resume_medis = $filenameSimpan;
        }
        if ($request->hasFile('hasil_lab')) {
            $filenameWithExt = $request->file('hasil_lab')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('hasil_lab')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('hasil_lab')->storeAs('public/files/hasil_lab', $filenameSimpan);
            $Pengajuan->hasil_lab = $filenameSimpan;
        }
        if ($request->hasFile('surat_keterangan_meninggal')) {
            $filenameWithExt = $request->file('surat_keterangan_meninggal')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('surat_keterangan_meninggal')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('surat_keterangan_meninggal')->storeAs('public/files/surat_keterangan_meninggal', $filenameSimpan);
            $Pengajuan->surat_keterangan_meninggal = $filenameSimpan;
        }
        $Pengajuan->save();

        return redirect('pengajuan');
    }
    public function delete(Request $request)
    {
        $Pengajuan = PengajuanAsuransi::find($request->id)->delete();

        return redirect('pengajuan');
    }

    public function report(Request $request)
    {


        $fromDate = $request->input('dari');
        $toDate = $request->input('sampai');
        $sortBy = "status";

        $title = 'Registered User Report'; // Report title

        $meta = [ // For displaying filters description on header
            'Registered on' => $fromDate . ' To ' . $toDate,
            'Sort By' => $sortBy
        ];

        $queryBuilder = PengajuanAsuransi::select(['kategori', 'user_id', 'created_at']) // Do some querying..
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy($sortBy);

        $columns = [ // Set Column to be displayed
            'kategori' => 'kategori',
            'created_at', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
            'nama' => 'user_id',
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        $pdf = new PdfReport();
        return $pdf->of($title, $meta, $queryBuilder, $columns)
            ->editColumn('created_at', [ // Change column class or manipulate its data for displaying to report
                'displayAs' => function ($result) {
                    return $result->created_at->format('d M Y');
                },
                'class' => 'left'
            ])
            ->limit(20) // Limit record to be showed
            ->stream(); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()

    }
}
