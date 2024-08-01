@extends('main.mainTable')

@section('tableContent')
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $daftar_hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
    ];
    $bulan = [
        '01' => 'JANUARI',
        '02' => 'FEBRUARI',
        '03' => 'MARET',
        '04' => 'APRIL',
        '05' => 'MEI',
        '06' => 'JUNI',
        '07' => 'JULI',
        '08' => 'AGUSTUS',
        '09' => 'SEPTEMBER',
        '10' => 'OKTOBER',
        '11' => 'NOVEMBER',
        '12' => 'DESEMBER',
    ];
    // Koneksi ke database
    $koneksi = mysqli_connect('localhost', 'root', '', 'skripsi_pgt_linting');
    
    // if (isset($_GET['tanggal_awal'])) {
    //     $tanggal_awal = $_GET['tanggal_awal'];
    //     $tanggal_akhir = $_GET['tanggal_akhir'];
    // } else {
    //     $tanggal_awal = date('Y-m-d');
    //     $tanggal_akhir = date('Y-m-d');
    // }
    
    // Query untuk mengambil data berdasarkan rentang tanggal
    // $query = "SELECT * FROM datalintings WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    // $result = mysqli_query($koneksi, $query);
    
    $no = 1;
    
    if (isset($_GET['bln'])) {
        $tahun = date('Y'); //Mengambil tahun saat ini
        $bln = $_GET['bln']; //Mengambil bulan saat ini
        $tanggal = cal_days_in_month(CAL_GREGORIAN, $bln, $tahun);
    } else {
        $tahun = date('Y'); //Mengambil tahun saat ini
        $bln = date('m'); //Mengambil bulan saat ini
        $tanggal = cal_days_in_month(CAL_GREGORIAN, $bln, $tahun);
    }
    // echo date('d') . ' ' . strtolower($bulan[$bln]) . ' ' . date('Y');
    // echo date('Y-M-D');
    ?>
    <div class="card card-info bg-primary">
        <h3 class="mt-1 text-center " style="color: black"></h3>
        <!-- /.card-header -->
        <div class="card-body bg-white">
            <style>
                input[type="date"] {
                    border: 1px solid black;
                }
            </style>

            <form action="" method="get">
                <div class="form-group row mb-2">
                    <div class="col-sm-3">
                        {{-- <label class="text-center col-form-label"></label> --}}
                        {{-- <div class="col-sm-7"> --}}
                        {{-- <input type="date" id="tanggal_awal" style="background: yellow; border-radius: 10px"
                            name="tanggal_awal" class="form-date p-1" required>
                        <label for="tanggal_akhir">s/d</label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir"
                            style="background: yellow; border-radius: 10px" class="form-date p-1" required> --}}

                        {{-- <label class="col-form-label">Tampilkan data Bulan: </label> --}}
                        <select class="form-select" aria-label="Default select example" name="bln" required>
                            <option value="<?php date('m'); ?>" selected>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>


                        {{-- </div> --}}

                    </div>
                    <div class="col-sm-2"><button type="submit" class="btn btn-primary">Cari</button></div>
                    <div class="col-sm-5">
                        <h1>Data Bulan : <b><?php echo $bulan[$bln]; ?></b></h1>
                    </div>
                </div>

            </form>



            {{-- <div class="btn-group mb-3">
                <button id="exportBtn" class="btn btn-warning">CSV</button>
                <button id="copyBtn" class="btn btn-primary">COPY</button>
            </div> --}}

            <div class="table-responsive">

                <table id="example1" style="display: block; overflow-x: auto; white-space: nowrap;"
                    class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="bg-warning">No</th>
                            <th class="bg-warning">Nama</th>
                            <?php
                            for ($i = 1; $i < $tanggal + 1; $i++) {
                                $d = $tahun . $bln . $i;
                                $namahari = date('l', strtotime($d));
                                if ($i == date('d')) {
                                    echo '<th class="bg-warning">Today -' . $i . '</th>';
                                } else {
                                    echo '<th class="bg-primary">Tanggal -' . $i . '</th>';
                                }
                            }
                            ?>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($B1 as $item)
                            <tr>

                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>

                                <?php
                                for ($i = 1; $i < $tanggal + 1; $i++) {
                                    $lin = $koneksi->query("SELECT * FROM datalintings where  nip ='" . $item->nip . "' and tanggal= '" . date('Y-' . $bln . '-' . $i) . "'");
                                    if ($lin->num_rows > 0) {
                                        while ($data2 = $lin->fetch_assoc()) {
                                            echo '<td class="text-center">' . $data2['jumlah'] . '</td>';
                                        }
                                    } else {
                                        echo '<td class="text-center"> </td>';
                                    }
                                }
                                ?>


                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
    <script>
        document.getElementById('exportBtn').addEventListener('click', function() {
            var table = document.getElementById('myTable');
            var data = [];

            for (var i = 0, row; row = table.rows[i]; i++) {
                var rowData = [];
                for (var j = 0, cell; cell = row.cells[j]; j++) {
                    rowData.push(cell.innerText);
                }
                data.push(rowData);
            }

            function exportTableToCSV(filename, data) {
                var csv = data.map(row => row.join(',')).join('\n');
                var blob = new Blob([csv], {
                    type: 'text/csv;charset=utf-8;'
                });
                var url = URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = filename;
                a.click();
                URL.revokeObjectURL(url);
            }

            exportTableToCSV('exported_data.csv', data);
        });
    </script>
    <script>
        document.getElementById('copyBtn').addEventListener('click', function() {
            var table = document.getElementById('myTable');
            var data = [];

            for (var i = 0, row; row = table.rows[i]; i++) {
                var rowData = [];
                for (var j = 0, cell; cell = row.cells[j]; j++) {
                    rowData.push(cell.innerText);
                }
                data.push(rowData.join('\t')); // Menggunakan tab sebagai pemisah kolom
            }

            var dataToCopy = data.join('\n'); // Menggunakan baris baru sebagai pemisah baris

            // Salin data ke clipboard
            navigator.clipboard.writeText(dataToCopy)
                .then(() => {
                    alert('Data berhasil disalin ke clipboard!');
                })
                .catch(err => {
                    console.error('Gagal menyalin data: ', err);
                });
        });
    </script>
@endsection
