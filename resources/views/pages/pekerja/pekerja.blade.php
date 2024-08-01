@extends('main.mainTable')

@section('tableContent')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .baris:hover {
            background-color: #003049;
            color: white;
            cursor: pointer;
        }

        .baris:hover .head {
            color: rgb(0, 0, 0);
            cursor: pointer;
        }

        th {
            text-align: center
        }

        .cari {
            overflow: auto;
            width: 100%;
        }

        #cari {
            display: inline-block;
            float: right;
            width: 30%;
            border: 1px solid grey;
            border-radius: 6px
        }
    </style>
    <div class="card">
        <div class="card-header bg-primary">
            <div class="m-1">
                <a href="/tambah-pekerja" class="btn btn-success">
                    <i class="fa fa-edit"></i> Tambah Pekerja</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- <div class="cari">
                <div id="cari">
                    <form action="#" method="get" role="form">
                        <input class="form-control" id="search" onkeyup="myFunction()" name="search" type="text"
                            placeholder="Cari..." aria-label="Search">
                    </form>
                </div>
            </div> --}}
            <div class="table-responsive">
                <table id="example1" style="display: block; overflow-x: auto; white-space: nowrap;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">NIK</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kel/Desa</th>
                            <th scope="col">Kec</th>
                            <th scope="col">Kab/Kota</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Massa</th>
                            {{-- <th scope="col">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                            <tr class="baris" data-bs-toggle="modal" data-bs-target="#detailModal{{ $row->nip }}">
                                <th class="head" scope="row">{{ $no++ }}</th>
                                <th class="head">{{ $row->nip }}</th>
                                <td>{{ $row->nik }}</td>
                                <td>{{ $row->telp }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->kel_desa }}</td>
                                <td>{{ $row->kec }}</td>
                                <td>{{ $row->kab_kota }}</td>
                                <td>{{ $row->tempat_lahir }}</td>
                                <td>{{ $row->tanggal_lahir }}</td>
                                <td>{{ $row->masuk }}</td>
                                <td>{{ $row->kategori }}</td>
                                <td> <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $waktustart = $row->masuk;
                                $waktuend = date('Y-m-d');
                                $datetime1 = new DateTime($waktustart); //start time
                                $datetime2 = new DateTime($waktuend); //end time
                                // $durasi = $datetime1->diff($datetime2);
                                
                                // echo $durasi->format('%a hari ');
                                
                                $diff = date_diff($datetime1, $datetime2);
                                
                                echo $diff->y . ' Tahun, ';
                                
                                // Menampilkan selisih bulan
                                echo $diff->m . ' Bulan, ';
                                
                                // Menampilkan selisih hari
                                echo $diff->d . ' Hari, ';
                                ?>
                                </td>
                                {{-- <td> --}}
                                {{-- <a href="/deletedata/{{ $row->nip }}" class="btn btn-success">Kelola</a> --}}
                                {{-- <a href="/deletedata/{{ $row->id }}" class="btn btn-danger delete"
                                        data-nama="{{ $row->nama }}" data-id="{{ $row->id }}">Delete</a> --}}
                                {{-- </td> --}}
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
        <div class="modal fade" id="detailModal{{ $item->nip }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #84dcc6">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pilihan Anda</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">

                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#ffba08"
                            class="bi bi-question-octagon-fill" viewBox="0 0 16 16">
                            <path
                                d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zM5.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        <h3 class="mt-2"><small>Tindakan untuk</small> {{ $item->nama }}</h3>
                    </div>
                    <div class="text-center pt-3 pb-3" style="background-color: #84dcc6; border-radius: 0 0 8px 8px">
                        <button type="button" class="btn btn-danger mr-3" data-bs-toggle="modal"
                            data-bs-target="#deleteData{{ $item->nip }}" data-bs-dismiss="modal">Hapus</button>
                        <a href="/tampilkandata/{{ $item->nip }}" class="btn btn-warning ml-3">Edit</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal -->
    @foreach ($data as $dat)
        <div class="modal fade" id="deleteData{{ $dat->nip }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><small>Hapus Data Pekerja</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#bf0603"
                            class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                        <h3 class="mt-2"><small>Yakin ingin menghapus data </small> {{ $dat->nama }}</h3>
                        <p style="font-size: 15pt; color: #ff1d1d">data yang telah dihapus tidak dapat dikembalikan</p>
                    </div>
                    <div class="bg-primary text-center pt-3 pb-3" style="border-radius: 0 0 8px 8px">
                        <a class="btn btn-danger mr-2" href="/deletedata/{{ $item->nip }}">Yakin</a>
                        {{-- <a href="/deletedata/{{ $dat->nip }}" class="btn btn-danger mr-2"
                            data-bs-dismiss="modal">Hapus</a> --}}
                        <button data-bs-dismiss="modal" class="btn btn-success ml-2">Batal</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <script>
        document.getElementById('search').addEventListener('keyup', function(event) {
            var searchQuery = event.target.value.toLowerCase();
            var allRows = document.querySelectorAll('tbody tr');

            allRows.forEach(function(row) {
                var namaCell = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                var nipCell = row.querySelector('th:nth-child(2)').textContent.toLowerCase();
                var nikCell = row.querySelector('th:nth-child(3)').textContent.toLowerCase();
                var telpCell = row.querySelector('th:nth-child(4)').textContent.toLowerCase();
                var alamatCell = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
                var kelDesaCell = row.querySelector('td:nth-child(7)').textContent.toLowerCase();
                var kecCell = row.querySelector('td:nth-child(8)').textContent.toLowerCase();
                var kabKotaCell = row.querySelector('td:nth-child(9)').textContent.toLowerCase();
                var tempatLahirCell = row.querySelector('td:nth-child(10)').textContent.toLowerCase();
                var tanggalLahirCell = row.querySelector('td:nth-child(11)').textContent.toLowerCase();
                var masukCell = row.querySelector('td:nth-child(12)').textContent.toLowerCase();
                var kategoriCell = row.querySelector('td:nth-child(13)').textContent.toLowerCase();

                if (namaCell.includes(searchQuery) || nipCell.includes(searchQuery) || nikCell.includes(
                        searchQuery) || telpCell.includes(searchQuery) || alamatCell.includes(
                        searchQuery) || kelDesaCell.includes(searchQuery) || kecCell.includes(
                        searchQuery) ||
                    kabKotaCell.includes(searchQuery) || tempatLahirCell.includes(searchQuery) ||
                    tanggalLahirCell.includes(searchQuery) || masukCell.includes(searchQuery) ||
                    kategoriCell.includes(searchQuery)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    <script>
        $('.delete').click(function() {

            var pegawainama = $(this).attr('data-nama')
            var pegawaiid = $(this).attr('data-nip')
            swal({
                    title: "Yakin?",
                    text: "Hapus data pekerja atas nama " + pegawainama + " ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletedata/" + pegawaiid + ""
                        swal("Data " + pegawainama + " berhasil di hapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus!");
                    }
                });
        });
    </script>
@endsection
