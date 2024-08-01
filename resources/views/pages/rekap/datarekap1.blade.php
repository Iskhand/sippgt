@extends('main.mainTable')

@section('tableContent')
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
                    <label class="col-sm-2 text-center col-form-label">Tampilkan data dari :</label>
                    <div class="col-sm-7">
                        {{-- <input type="date" id="tanggal_awal" style="background: yellow; border-radius: 10px"
                            name="tanggal_awal" class="form-date p-1" required>
                        <label for="tanggal_akhir">s/d</label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir"
                            style="background: yellow; border-radius: 10px" class="form-date p-1" required> --}}

                        <label class="col-sm-2 col-form-label">Bulan</label>
                        <select class="form-select" aria-label="Default select example" name="bulan" required>
                            <option selected>Pilih Bulan</option>
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

                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>

                </div>

            </form>
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect('localhost', 'root', '', 'skripsi_pgt_linting');
            
            if (isset($_GET['tanggal_awal'])) {
                $tanggal_awal = $_GET['tanggal_awal'];
                $tanggal_akhir = $_GET['tanggal_akhir'];
            } else {
                $tanggal_awal = date('Y-m-d');
                $tanggal_akhir = date('Y-m-d');
            }
            
            // Query untuk mengambil data berdasarkan rentang tanggal
            $query = "SELECT * FROM datalintings WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
            $result = mysqli_query($koneksi, $query);
            
            $no = 1;
            ?>

            <?php
            
            if (isset($_GET['bulan'])) {
                $tahun = date('Y'); //Mengambil tahun saat ini
                $bulan = $_GET['bulan']; //Mengambil bulan saat ini
                $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            } else {
                $tahun = date('Y'); //Mengambil tahun saat ini
                $bulan = date('m'); //Mengambil bulan saat ini
                $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            }
            echo date('Y-m-d');
            ?>
            {{-- <?php if(isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])): ?> --}}
            <div class="btn-group mb-3">
                <button id="exportBtn" class="btn btn-warning">CSV</button>
                <button id="copyBtn" class="btn btn-primary">COPY</button>
            </div>
            <div class="table-responsive">

                <table id="myTable" style="display: block; overflow-x: auto; white-space: nowrap;"
                    class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <?php
                            for ($i = 1; $i < $tanggal + 1; $i++) {
                                $tanggalin = $tahun . '-' . $bulan . '-0' . $i;
                                echo '<th>' . $i . '-' . $bulan . '-' . $tahun . '</th>';
                            }
                            ?>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>

                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>

                                <?php
                                for ($i = 1; $i < $tanggal + 1; $i++) {
                                    $lin = $koneksi->query("SELECT * FROM datalintings where  nip ='" . $item->nip . "' and tanggal= '" . date('Y-' . $bulan . '-' . $i) . "'");
                                    while ($data2 = $lin->fetch_assoc()) {
                                        if (empty($lin)) {
                                            echo '<td class="text-center">0</td>';
                                        } else {
                                            echo '<td class="text-center">' . $data2['jumlah'] . '</td>';
                                        }
                                    }
                                }
                                ?>


                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{-- <?php endif; ?> --}}

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
