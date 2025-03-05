@extends('Layout.admin-layout')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Antrian Loket 1</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        Antrian RSU Putri Bidadari
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
               <div class="card">
                <div class="card-body">
                    
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
                                         <td><span class="badge badge-primary"> Loket 1</span></td>

                                         <td>{{ $data->poli }}</td>
                                         <td><span class="badge badge-warning">Menunggu</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm">Panggil</button>
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

