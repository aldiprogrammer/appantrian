@extends('Layout.app-layout2')

@section('content')
    <div class="container mt-2">
       

        <div class="row">
            <div class="col-sm-6">
                <div class="card my-2 bg-info text-white">
                    <div class="card-body">
                    <label class="fw-bold"><i class="fas fa-info-circle"></i> Selamat datang di sistem antrian digital RSU PUTRI BIDADARI</label>
                    </div>
                </div>
               <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold text-center">PILIH POLI SESUAI KELUHAN ANDA </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($poli as $data )
                             <div class="col-sm-6" onclick="addantrian({{ $data->id }})">
                                <div class="card mt-2 bg-info text-white shadow">
                                    <div class="card-body">
                                        <h1><i class="fa-solid fa-notes-medical"></i> Poli</h1>
                                        {{ $data->poli }}
                                    </div>
                                </div>
                             </div>
                        @endforeach
                       
                    </div>
                </div>
               </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" width="100%" height="300px" src="https://www.youtube.com/embed/sYkoozZ-PBM?si=HhZhYeCbs_OqkUng""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
