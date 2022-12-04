@extends('layout.master')

@section('title', 'Pengajuan')

@section('content')
    <script src="{{ asset('js/app.js') }}"></script>

    <div class="container-fluid">
        <h3>SEBELUM MENGAJUKAN ASURANSI SILAHKAN DOWNLOAD TERLEBIH DAHULU DOKUMEN ASURANSI YANG ANDA PERLUKAN!</h3>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <a href="{{ URL::to('/pengajuan/download/RAWATINAP.pdf') }}" class="btn btn-warning btn-icon-split ">
                    <span class="text">Rawat Inap </span>
                </a>
            </div>
            <div class="drop-down">
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kecelakaan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ URL::to('/pengajuan/download/RAWATINAP.pdf') }}"
                                class="btn btn-secondary  dropdown-item">
                                <span class="text">Rawat jalan</span>
                            </a>
                            <a href="{{ URL::to('/pengajuan/download/RAWATINAP.pdf') }}"
                                class="btn btn-secondary  dropdown-item ">
                                <span class="text">Rawat Inap</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <button class="btn btn-primary mb-2 mt-2" href="logout" data-toggle="modal" data-target="#PengajuanModal">
            Tambah Pengajuan
        </button>
        <div class="modal fade" id="PengajuanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ URL::to('pengajuan/store') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-2">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                    name="kategori" id="kategori">
                                    <option selected>Kategori</option>
                                    <option value="Rawat Inap(sakit)">Rawat inap(sakit)</option>
                                    <option value="Rawat jalan-Kecelakaan">Rawat jalan-Kecelakaan</option>
                                    <option value="Rawat inap-kecelakaan">Rawat inap-Kecelakaan</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Dokumen ASYKI</label>
                                <input class="form-control" name="dokumen_asyki" type="file" id="dokumen_asyki"
                                    accept="application/pdf" required>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Dokumen Tagihan Rumah Sakit</label>
                                <input class="form-control" name="dokumen_tagihanrs" type="file" id="dokumen_tagihanrs"
                                    accept="application/pdf" required>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Kartu Asuransi PNL</label>
                                <input class="form-control" name="kartu_asuransi_pnl" type="file" id="kartu_asuransi_pnl"
                                    accept="application/pdf" required>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Resume Medis</label>
                                <input class="form-control" name="resume_medis" type="file" id="resume_medis"
                                    accept="application/pdf" required>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Hasil Lab</label>
                                <input class="form-control" name="hasil_lab" type="file" id="hasil_lab"
                                    accept="application/pdf" required>
                            </div>
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Surat Keterangan Meninggal</label>
                                <input class="form-control" name="surat_keterangan_meninggal" type="file"
                                    id="surat_keterangan_meninggal" accept="application/pdf">
                            </div>
                            <input type="submit" class="btn btn-primary" id="submit" value="Submit">
                            <p style="color: red">Cuma Nerima PDF PAK!!</p>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Dokumen Asyki</th>
                                <th>Dokumen Tagihan Rumah Sakit</th>
                                <th>Kartu Asuransi PNL</th>
                                <th>Resume Medis</th>
                                <th>Hasil Lab</th>
                                <th>Surat Keterangan Meninggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Dokumen Asyki</th>
                                <th>Dokumen Tagihan Rumah Sakit</th>
                                <th>Kartu Asuransi PNL</th>
                                <th>Resume Medis</th>
                                <th>Hasil Lab</th>
                                <th>Surat Keterangan Meninggal</th>
                                <th>Status</th>
                                <th>Aksi</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($Pengajuan as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->kategori }}</td>
                                    <td>
                                        <a target="_blank" href="{{ asset("storage/files/dok_asyki/$p->dokumen_asyki") }}">{{$p->dokumen_asyki}}</a>
                                    </td>
                                    <td>{{ $p->dokumen_tagihanrs }}</td>
                                    <td>{{ $p->kartu_asuransi_pnl }}</td>
                                    <td>{{ $p->resume_medis }}</td>
                                    <td>{{ $p->hasil_lab }}</td>
                                    <td>{{ $p->surat_keterangan_meninggal }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>
                                        <button class="btn btn-secondary  dropdown-item">
                                            <span class="text">Edit</span>
                                        </button>
                                        <button class="btn btn-secondary  dropdown-item">
                                            <span class="text">Delete</span>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    @endsection
