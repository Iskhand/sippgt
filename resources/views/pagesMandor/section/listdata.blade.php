@extends('pagesMandor.main')

@section('halaman')
    <div class="table-responsive">
        <form class="custom-form header-form m-2 ms-lg-3 ms-md-3 me-lg-auto me-md-auto order-2 order-lg-0 order-md-0"
            action="#" method="get" role="form">
            <input class="form-control" id="myInput" onkeyup="myFunction()" name="search" type="text"
                placeholder="Cari Nama" aria-label="Search">
        </form>
        <table id="myTable" class="account-table table">

            @php
                $no = 1;
            @endphp

            <thead>
                <tr>
                    <th scope="col">No</th>

                    <th scope="col">NIP</th>

                    <th scope="col">Nama</th>

                    <th scope="col">Status</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($pekerja as $item)
                    <tr>
                        <td scope="row">{{ $no++ }}</td>

                        <td scope="row">{{ $item->nip }}</td>

                        <td scope="row">{{ $item->nama }}</td>

                        @php
                            $status = $linting->where('nip', $item->nip)->sum('jumlah');
                        @endphp

                        @if (empty($status))
                            <td scope="row">
                                <button type="button" class="badge text-bg-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $item->nip }}">
                                    {{-- <span class="badge text-bg-warning"> --}}
                                    pending
                                    {{-- </span> --}}
                                </button>
                            </td>
                        @else
                            <td scope="row">
                                <span class="badge text-bg-success">
                                    complite
                                </span>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    @foreach ($pekerja as $data)
        <div class="modal fade" id="exampleModal-{{ $data->nip }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Produksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (Auth::user()->role == 'mandorb1')
                            <form action="/save1" method="POST" enctype="multipart/form-data">
                            @elseif (Auth::user()->role == 'mandorb2')
                                <form action="/save2" method="POST" enctype="multipart/form-data">
                                @elseif (Auth::user()->role == 'mandorb3')
                                    <form action="/save3" method="POST" enctype="multipart/form-data">
                        @endif

                        @csrf
                        <div class="form-group row mb-2 mt-3">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{ $data->nip }}" id="nip"
                                    name="nip" placeholder="NIP" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{ $data->nama }}" id="nama"
                                    name="nama" placeholder="Nama Pegawai" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label">Merah</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="lt_merah" name="lt_merah"
                                    placeholder="linting merah" required>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label">Hitam</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="lt_hitam" name="lt_hitam"
                                    placeholder="linting hitam" required>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label">Cokelat</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="lt_cokelat" name="lt_cokelat"
                                    placeholder="linting cokelat" required>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-2 col-form-label">Jawas</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="lt_jawas" name="lt_jawas"
                                    placeholder="linting jawas" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-success">Save Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
