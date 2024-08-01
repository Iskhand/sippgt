@extends('main.main')

@section('mainContent')
    <div class="row">
        <div class="col-md-12">
            @if ($data->nama_blok == 'Blok 1')
                <div class="card card-primary bg-white">
                @elseif ($data->nama_blok == 'Blok 2')
                    <div class="card card-warning bg-white">
                    @elseif ($data->nama_blok == 'Blok 3')
                        <div class="card card-success bg-white">
            @endif
            <div class="card-header">
                <h3 class="card-title text-center">Kelola Data Target <b>{{ $data->nama_blok }}</b></h3>
            </div>
            <!-- form start -->
            <form action="/savetarget/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Target Rosso Merah</label>
                        <input type="number" class="form-control" name="tr_merah" placeholder="Target Merah"
                            value="{{ $data->tr_merah }}">
                    </div>
                    <div class="form-group">
                        <label>Target Rosso Cokelat</label>
                        <input type="number" class="form-control" name="tr_cokelat" placeholder="Target Cokelat"
                            value="{{ $data->tr_cokelat }}">
                    </div>
                    <div class="form-group">
                        <label>Target Rosso Hitam</label>
                        <input type="number" class="form-control" name="tr_hitam" placeholder="Target Hitam"
                            value="{{ $data->tr_hitam }}">
                    </div>
                    <div class="form-group">
                        <label>Target Jawas</label>
                        <input type="number" class="form-control" name="tr_jawas" placeholder="Target Jawas"
                            value="{{ $data->tr_jawas }}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer col-12">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="{{ route('target') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
