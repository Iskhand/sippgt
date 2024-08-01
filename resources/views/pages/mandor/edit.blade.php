@extends('main.main')

@section('mainContent')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning bg-white">

                <div class="card-header">
                    <h3 class="card-title text-center">Kelola Data <b>{{ $data->nama_mandor }}</b></h3>
                </div>
                <!-- form start -->
                <form action="/updatemandor/{{ $data->nim }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Mandor</label>
                            <input type="text" class="form-control" name="nama_mandor" placeholder="Nama Mandor"
                                value="{{ $data->nama_mandor }}">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                value="{{ $data->username }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Password"
                                value="{{ $data->password }}">
                        </div>
                        <div class="form-group">
                            <label>Devisi</label>
                            <input type="text" class="form-control" name="unit" placeholder="Devisi"
                                value="{{ $data->unit }}" readonly>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer col-12">
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                        <a href="{{ route('mandor') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
