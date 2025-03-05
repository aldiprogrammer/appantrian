@extends('Layout.admin-layout')
@section('content')
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Poli</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
           <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i> Tambah Poli
           </button>

           <!-- Modal -->
           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Form tambah poli</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                            <form method="post" action="/admin/poli">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Poli</label>
                                    <input type="text" name="kode" value="{{ $kode }}" class="form-control" readonly>
                                    <small id="emailHelp" class="form-text text-muted">Kode poli terisi secara otomatis dan tidak dapat diubah.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Poli</label>
                                    <input type="text" class="form-control" name="poli" id="exampleInputPassword1">
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
                      <th scope="col">Kode</th>
                      <th scope="col">Poli</th>
                      <th scope="col">Opsi</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                ?>
                @foreach ($poli as $data )
                  <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $data->kode }}</td>
                      <td>{{ $data->poli }}</td>
                      <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{ $data->kode }}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="hapuspoli({{ $data->id }})"><i class="fas fa-trash"></i> Hapus</button>
                      </td>
                  </tr>

                   <!-- Modal -->
                   <div class="modal fade" id="exampleModal{{ $data->kode }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Form edit poli</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">
                                   <form method="post" action="/admin/editpoli">
                                       @csrf
                                       <input type="hidden" name="id" value="{{ $data->id }}">
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Kode Poli</label>
                                           <input type="text" name="kode" value="{{ $data->kode }}" class="form-control" readonly>
                                         
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleInputPassword1">Nama Poli</label>
                                           <input type="text" class="form-control" value="{{ $data->poli }}" name="poli" id="exampleInputPassword1">
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