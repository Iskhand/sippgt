@extends('main.main')

@section('mainContent')
    <div class="row">
        @foreach ($data as $item)
            <div class="col-md-4 ">
                @if ($item->nama_blok == 'Blok 1')
                    <div class="card card-primary bg-white">
                    @elseif ($item->nama_blok == 'Blok 2')
                        <div class="card card-warning bg-white">
                        @elseif ($item->nama_blok == 'Blok 3')
                            <div class="card card-success bg-white">
                @endif
                <div class="card-header">
                    <h3 class="card-title">Target {{ $item->nama_blok }}</h3>
                </div>
                <!-- form start -->
                <form>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Target Rosso Merah</label>
                            <input type="number" class="form-control" name="tr_merah" placeholder="Target Merah"
                                value="{{ $item->tr_merah }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Target Rosso Cokelat</label>
                            <input type="number" class="form-control" name="tr_cokelat" placeholder="Target Cokelat"
                                value="{{ $item->tr_cokelat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Target Rosso Hitam</label>
                            <input type="number" class="form-control" name="tr_hitam" placeholder="Target Hitam"
                                value="{{ $item->tr_hitam }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Target Jawas</label>
                            <input type="number" class="form-control" name="tr_jawas" placeholder="Target Jawas"
                                value="{{ $item->tr_jawas }}" readonly>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Jumlah Total</label>
                            <input type="number" class="form-control" name="tr_jumlah" placeholder="Jumlah"
                                value="{{ $item->tr_jumlah }}" readonly>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="/kelolatarget/{{ $item->id }}" class="btn btn-warning">Kelola</a>
                    </div>
                </form>
            </div>
    </div>
    @endforeach
    </div>
@endsection
