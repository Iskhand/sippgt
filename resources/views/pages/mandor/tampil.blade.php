@extends('main.mainTable')

@section('tableContent')
    <div class="card">
        <div class="card-header bg-warning">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mandor</th>
                            <th scope="col">Username</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <th>{{ $row->name }}</th>
                                <th>{{ $row->email }}</th>
                                <td>
                                    <?php
                                    if ($row->role == 'mandorb1') {
                                        echo 'BLOK 1';
                                    } elseif ($row->role == 'mandorb2') {
                                        echo 'BLOK 2';
                                    } else {
                                        echo 'BLOK 3';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn text-bg-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $row->id }}">Edit</button>
                                    {{-- <a href="/mandor-edit/{{ $row->nim }}" class="btn btn-warning">Edit</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- Modal -->
    @foreach ($data as $item)
        <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Mandor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/updatemandor/{{ $item->id }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group row mb-1">
                                <label class="col-sm-2 col-form-label">Nama </label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control text-center" value="{{ $item->name }}"
                                        id="nama" name="nama" placeholder="Nama Mandor">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Divisi</label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control text-center" value="<?php
                                    if ($item->role == 'mandorb1') {
                                        echo 'BLOK 1';
                                    } elseif ($item->role == 'mandorb2') {
                                        echo 'BLOK 2';
                                    } else {
                                        echo 'BLOK 3';
                                    }
                                    ?>"
                                        id="divisi" name="divisi" placeholder="divisi" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10 ">
                                    <input type="email" class="form-control text-center" value="{{ $item->email }}"
                                        id="email" name="email" placeholder="Email Mandor">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control text-center" id="password" name="password"
                                        placeholder="New Password">
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
