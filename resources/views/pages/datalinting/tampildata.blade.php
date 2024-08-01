@extends('main.mainTable')

@section('tableContent')
    <div class="card card-info bg-primary">
        <h3 class="mt-1 text-center " style="color: black"></h3>
        <!-- /.card-header -->
        <div class="card-body bg-white">
            <div class="form-group row mb-2 ml-1 mr-1">
                <div class="col-sm-2 pt-2 pb-2" style="border-radius:10px 0px 0px 10px; background: #a5ffd6">
                    <form action="" method="get" class="form-inline" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                placeholder="Cari berdasarkan tanggal..." required>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $no = 1;
                        
                        $koneksi = new mysqli('localhost', 'root', '', 'skripsi_pgt_linting');
                        
                        if (isset($_GET['tanggal'])) {
                            $tanggal = $_GET['tanggal'];
                            $text = $tanggal;
                        } else {
                            $tanggal = date('Y-m-d');
                            $text = 'Hari Ini';
                        }
                        
                        ?>
                    </form>
                </div>
                <div class="col-sm-7 text-center pt-2" style="background-color: #ffd97d">
                    <h4><small>jumlah pekerja :</small> {{ $jumpek }}
                        <small> | Data Masuk :</small> {{ $jumlin->where('tanggal', $tanggal)->count('jumlah') }}
                        @php
                            $jum = $jumlin->where('tanggal', $tanggal)->count('jumlah');
                            $belum = $jumpek - $jum;
                        @endphp
                        <small> | Data Belum Masuk :{{ $belum }}</small>
                    </h4>
                    {{-- <small>Data Masuk : {{ $jumlin }}</small>
                    <small>Data Masuk : {{ $jumdat }}</small> --}}
                </div>
                <div class="col-sm-3 pt-1 " style="border-radius:  0px 10px 10px 0px; background: #aaf683">
                    <h2>Data <b><?php echo $text; ?></b></h2>
                </div>

            </div>

            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Data Merah</th>
                            <th scope="col">Data Cokelat</th>
                            <th scope="col">Data Hitam</th>
                            <th scope="col">Data Jawas</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <th>{{ $item->nip }}</th>
                                <th>{{ $item->nama }}</th>
                                <td><?php $lin = $koneksi->query("SELECT * FROM datalintings where (nip IS NULL OR nip ='" . $item->nip . "') and (tanggal IS NULL OR tanggal ='" . $tanggal . "')");
                                while ($data2 = $lin->fetch_assoc()) {
                                    echo $data2['lt_merah'];
                                } ?></td>
                                <td><?php $lin = $koneksi->query("SELECT * FROM datalintings where (nip IS NULL OR nip ='" . $item->nip . "') and (tanggal IS NULL OR tanggal ='" . $tanggal . "')");
                                while ($data2 = $lin->fetch_assoc()) {
                                    echo $data2['lt_cokelat'];
                                } ?></td>
                                <td><?php $lin = $koneksi->query("SELECT * FROM datalintings where (nip IS NULL OR nip ='" . $item->nip . "') and (tanggal IS NULL OR tanggal ='" . $tanggal . "')");
                                while ($data2 = $lin->fetch_assoc()) {
                                    echo $data2['lt_hitam'];
                                } ?></td>
                                <td><?php $lin = $koneksi->query("SELECT * FROM datalintings where (nip IS NULL OR nip ='" . $item->nip . "') and (tanggal IS NULL OR tanggal ='" . $tanggal . "')");
                                while ($data2 = $lin->fetch_assoc()) {
                                    echo $data2['lt_jawas'];
                                } ?></td>
                                <td><?php $lin = $koneksi->query("SELECT * FROM datalintings where (nip IS NULL OR nip ='" . $item->nip . "') and (tanggal IS NULL OR tanggal ='" . $tanggal . "')");
                                while ($data2 = $lin->fetch_assoc()) {
                                    echo $data2['jumlah'];
                                } ?></td>
                                <td><?php $lin = $koneksi->query("SELECT * FROM datalintings where (nip IS NULL OR nip ='" . $item->nip . "') and (tanggal IS NULL OR tanggal ='" . $tanggal . "')");
                                while ($data2 = $lin->fetch_assoc()) {
                                    echo $data2['tanggal'];
                                } ?></td>
                                <td>
                                    <?php $lin = $koneksi->query("SELECT * FROM datalintings where (nip IS NULL OR nip ='" . $item->nip . "') and (tanggal IS NULL OR tanggal ='" . $tanggal . "')");
                                    while ($data2 = $lin->fetch_assoc()) {
                                        ?>
                                    {{-- <a href="/getdata/{{ $data2['id_linting'] }}" class="btn btn-warning">Edit</a> --}}
                                    <button type="button" class=" text-bg-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $item->nip }}">Edit</button>
                                    <?php
                                } ?>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <!-- Modal -->
    @foreach ($data as $item)
        @php
            $lt_merah = $dblinting
                ->where('nip', $item->nip)
                ->where('tanggal', $tanggal)
                ->sum('lt_merah');
            $lt_hitam = $dblinting
                ->where('nip', $item->nip)
                ->where('tanggal', $tanggal)
                ->sum('lt_hitam');
            $lt_cokelat = $dblinting
                ->where('nip', $item->nip)
                ->where('tanggal', $tanggal)
                ->sum('lt_cokelat');
            $lt_jawas = $dblinting
                ->where('nip', $item->nip)
                ->where('tanggal', $tanggal)
                ->sum('lt_jawas');
            $jumlah = $dblinting
                ->where('nip', $item->nip)
                ->where('tanggal', $tanggal)
                ->sum('jumlah');
            $id_linting = $dblinting
                ->where('nip', $item->nip)
                ->where('tanggal', $tanggal)
                ->sum('id_linting');
        @endphp
        <div class="modal fade" id="exampleModal-{{ $item->nip }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Produksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/savelinting/{{ $id_linting }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group row mb-2 mt-3">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control text-center" value="{{ $item->nip }}"
                                        id="nip" name="nip" placeholder="NIP" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control text-center" value="{{ $item->nama }}"
                                        id="nama" name="nama" placeholder="Nama Pegawai" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Merah</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="lt_merah" name="lt_merah"
                                        placeholder="linting merah" value="{{ $lt_merah }}">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Cokelat</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="lt_cokelat" name="lt_cokelat"
                                        placeholder="linting cokelat" value="{{ $lt_cokelat }}">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Hitam</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="lt_hitam" name="lt_hitam"
                                        placeholder="linting hitam" value="{{ $lt_hitam }}">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Jawas</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="lt_jawas" name="lt_jawas"
                                        placeholder="linting jawas" value="{{ $lt_jawas }}">
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer bg-warning">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
