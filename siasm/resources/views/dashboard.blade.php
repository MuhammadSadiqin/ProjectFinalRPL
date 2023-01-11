@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a href="mahasiswa">Mahasiswa Aktif</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <a href="pengajuan">Pengajuan Asuransi</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahpengajuan}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <a href="pengajuan">Pengajuan Diterima</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$diterima}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <a href="pengajuan">Pengajuan Ditolak</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ditolak}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->role_id == 1)
        <button class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#report">
            REPORTS
        </button> 
        @endif
        <div>
           
            <div class="modal fade" id="report" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Dokumen</h5>
                            <button class="close" type="button" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ URL::to('pengajuan/report') }}" method="POST"
                                enctype='multipart/form-data'>
                                @csrf
                                <div class="mb-2">
                                    <label for="formFile" class="form-label">Dari tanggal
                                        </label>
                                    <input class="form-control" name="dari" type="date"
                                        required>
                                </div>
                                <div class="mb-2">
                                    <label for="formFile" class="form-label">Sampai Tanggal
                                        </label>
                                    <input class="form-control" name="sampai" type="date"
                                        required>
                                </div>
                                <input type="submit" class="btn btn-primary" id="submit"
                                    value="Submit">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
