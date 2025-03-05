@extends('Layout.admin-layout')
@section('content')
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Akun Loket</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Tambah Akun Loket
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Form tambah loket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/admin/akunloket">
                            @csrf
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Loket</label>
                                 <select name="loket" id="" class="
                                 form-control">
                                     <option>-- Pilih Loket -- </option>
                                     @foreach ($loket as $data )
                                     <option value="{{ $data->id }}">{{ $data->loket }}</option>
                                     @endforeach

                                 </select>
                             </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username"  class="form-control">
                            </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Password</label>
                                 <input type="password" name="password" class="form-control">
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
                    <th scope="col">Loket</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                ?>
                @foreach ($akun as $data )
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td><span class="badge badge-primary">{{ $data->loket->loket }}</span></td>
                    <td>{{ $data->username }}</td>
                    <td>*******************</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{ $data->kode }}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="hapusakunloket({{ $data->id }})"><i class="fas fa-trash"></i> Hapus</button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $data->kode }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Form edit akun loket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="/admin/editakunloket">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Loket</label>
                                         <select name="loket" id="" class="
                                            form-control">
                                            <option class="bg-info text-white">{{ $data->loket->loket }}</option>
                                             @foreach ($loket as $data2 )
                                             <option value="{{ $data2->id }}">{{ $data2->loket }}</option>
                                             @endforeach

                                         </select>
                                     </div>


                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Username</label>
                                         <input type="text" value="{{ $data->username }}" name="username" class="form-control">
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

