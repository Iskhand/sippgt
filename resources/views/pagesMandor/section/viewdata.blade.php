@extends('pagesMandor.main')

@section('halaman')
    <div class="table-responsive">
        <form class="custom-form header-form m-2 ms-lg-3 ms-md-3 me-lg-auto me-md-auto order-2 order-lg-0 order-md-0"
            action="#" method="get" role="form">
            <input class="form-control" id="myInput" onkeyup="myFunction()" name="search" type="text"
                placeholder="Cari Nama" aria-label="Search">
        </form>
        <table id="myTable" class="account-table table-bordered table-striped table">

            @php
                $no = 1;
            @endphp

            <thead>
                <tr>
                    <th scope="col">No</th>

                    <th scope="col">Nama</th>

                    <th scope="col">Merah</th>

                    <th scope="col">Hitam</th>

                    <th scope="col">Cokelat</th>

                    <th scope="col">Jawas</th>

                    <th scope="col">Jumlah</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($pekerja as $item)
                    @php
                        $lt_merah = $linting->where('nip', $item->nip)->sum('lt_merah');
                        $lt_hitam = $linting->where('nip', $item->nip)->sum('lt_hitam');
                        $lt_cokelat = $linting->where('nip', $item->nip)->sum('lt_cokelat');
                        $lt_jawas = $linting->where('nip', $item->nip)->sum('lt_jawas');
                        $jumlah = $linting->where('nip', $item->nip)->sum('jumlah');
                    @endphp
                    @if (empty($jumlah))
                        <tr style="background: rgb(255, 163, 163)">
                        @else
                        <tr style="background: rgb(163, 255, 171)">
                    @endif
                    <td scope="row">{{ $no++ }}</td>

                    <td scope="row">{{ $item->nama }}</td>

                    <td scope="row">{{ $lt_merah }}</td>
                    <td scope="row">{{ $lt_hitam }}</td>
                    <td scope="row">{{ $lt_cokelat }}</td>
                    <td scope="row">{{ $lt_jawas }}</td>
                    <td scope="row">{{ $jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
