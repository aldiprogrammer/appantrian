@extends('Layout.admin-layout')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Antrian {{ session('username') }}</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        Antrian RSU Putri Bidadari
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
               <div class="card border-info shadow">
                <div class="card-body">
                    @if($cekantrian == false)
                        <div id="no-antrian">
                            <img src="/img/ant.png" class="img-fluid" alt="Responsive image">
                            <p class="text-center">Untuk hari ini belum ada antrian yang di panggil, silahkan panggil antrian</p>
                        </div>

                        <div id="show-antrian" style="display: none">
                            <h2 class="text-center fw-bold" id="kode-antrian" style="font-weight: bold; color: black">#</h2>
                            <hr>
                            <h5 class="text-center fw-bold">{{ session('username') }}
                                <p class="text-danger mt-2" style="font-weight: bold"> Poli Klinik : </p>
                            </h5>
                            <hr>
                            <center>
                                <span class="badge badge-info ">STATUS MASIH DALAM PROSES PEMERIKSAAN</span>
                            </center>
                        </div>
                    @else
                    <div id="show-antrian">
                        <h2 class="text-center fw-bold" id="kode-antrian" style="font-weight: bold; color: black">#{{ $cekantrian->kode_antrian }}</h2>
                        <hr>
                        <h5 class="text-center fw-bold">{{ session('username') }} <p class="text-danger mt-2" style="font-weight: bold"> Poli Klinik : {{ $cekantrian->poli }}</p></h5>
                        <hr>
                        <center>
                       <span class="badge badge-info ">STATUS MASIH DALAM PROSES PEMERIKSAAN</span>
                        </center>
                    </div>
                    @endif
                   
                </div>
               </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Loket</th>
                                    <th scope="col">Poli</th>
                                    <th scope="col">Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($antrian as $data )
                                     <tr>
                                         <th scope="row">{{ $data->kode_antrian }}</th>
                                         <td><span class="badge badge-primary">{{ session('username') }}</span></td>

                                         <td>{{ $data->poli }}</td>
                                         <td>
                                            @if($data->status == 0)
                                            <span class="badge badge-warning">Menunggu</span>
                                            @else
                                                <span class="badge badge-success">Dipangil</span>
                                            @endif
                                         </td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onclick="panggil('{{ $data->id }}', '{{ $data->kode_antrian }}', '{{ session('username') }}')">Panggil</button>
                                        </td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

