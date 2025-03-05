@extends('Layout.admin-layout')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Loket</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Tambah Dokter
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Form tambah dokter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/dokter" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama"  class="form-control">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nip</label>
                                <input type="text" class="form-control" name="nip" id="exampleInputPassword1">
                                 @error('nip')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror

                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Spesialis</label>
                                <input type="text" class="form-control" name="spesialis" id="exampleInputPassword1">
                                 @error('spesialis')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Foto</label>
                                <input type="file" class="form-control" name="foto" id="exampleInputPassword1">
                                 @error('foto')
                                 <small class="text-danger">{{ $message }}</small>
                                 @enderror

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nip</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Spesialis</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                ?>
                @foreach ($dokter as $data )
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_dokter }}</td>
                    <td>{{ $data->spesialis }}</td>
                    <td><img src="{{ asset('storage/'.$data->foto )  }}" style="height: 50px"></td>

                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{ $data->kode }}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="hapusdokter({{ $data->id }})"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $data->kode }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Form edit dokter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="/admin/editdokter">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" value="{{ $data->nama_dokter }}" name="nama" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nip</label>
                                        <input type="text" value="{{ $data->nip }}" class="form-control" name="nip" id="exampleInputPassword1">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Spesialis</label>
                                        <input type="text" value="{{ $data->spesialis }}" class="form-control" name="spesialis" id="exampleInputPassword1">
                                    </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>


                @endforeach

            </tbody>
        </table>

    </div>
</div>


@endsection

