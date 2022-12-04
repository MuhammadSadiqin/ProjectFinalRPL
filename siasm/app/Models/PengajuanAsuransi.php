<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanAsuransi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori','dokumen_asyki','dokumen_tagihanrs','kartu_asuransi_pnl','resume_medis','hasil_lab','surat_keterangan_meninggal','status','user_id'
    ];
}
