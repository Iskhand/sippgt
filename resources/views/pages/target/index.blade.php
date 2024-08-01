@extends('main.main')

@section('mainContent')
    <div class="card bg-white">
        <div class="card-header">
            <h3 class="card-title">Target Progres</h3>
        </div>
        <?php
        $koneksi = new mysqli('localhost', 'root', '', 'skripsi_pgt_linting');
        
        ?>
        <div class="card-body p-0">
            <table class="table table-striped table-bordered projects">
                <thead>
                    <tr>

                        <th>Kategori Blok</th>
                        <th class="text-center">Target Hari Ini</th>
                        <th>Project Progress</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Blok 1-->
                    <tr>

                        <td>
                            <p style="font-size: 15pt"> <b>Blok 1</b> <small>( {{ $jumpek1 }} orang )</small></p>

                        </td>
                        <td class="text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <b><?php
                                    if ($tar1 != 0) {
                                        echo $tar1;
                                    } else {
                                        echo '0';
                                    }
                                    ?></b>
                                </li>
                                <li class="list-inline-item">
                                    | Selesai : <?php
                                    if ($jum1 != 0) {
                                        echo $jum1;
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <!-- Membuat presentase Progress -->
                        <?php
                        $target = $tar1;
                        $selesai = $jum1;
                        if ($target != 0) {
                            $progresSelesai = ($selesai / $target) * 100;
                            $prog = number_format($progresSelesai, 0);
                        } else {
                            $prog = 0;
                        }
                        ?>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $prog }}"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{ $prog }}%"></div>
                            </div>
                            <small> <b><?php
                            if ($prog != 0) {
                                echo $prog;
                            } else {
                                echo '0';
                            }
                            ?>%</b> Complete </small>
                        </td>
                        <td class="project-state">
                            <?php
                            if ($prog >= 100) {
                                echo '<span class="badge badge-success">Complite</span>';
                            } else {
                                echo '<span class="badge badge-danger">Incomplite</span>';
                            }
                            ?>
                            {{-- <span class="badge badge-success">Success</span> --}}
                        </td>
                    </tr>
                    <!-- Blok 2-->
                    <tr>

                        <td>
                            <p style="font-size: 15pt"> <b>Blok 2</b> <small>( {{ $jumpek2 }} orang )</small></p>

                        </td>
                        <td class="text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <b><?php
                                    if ($tar2 != 0) {
                                        echo $tar2;
                                    } else {
                                        echo '0';
                                    }
                                    ?></b>
                                </li>
                                <li class="list-inline-item">
                                    | Selesai : <?php
                                    if ($jum2 != 0) {
                                        echo $jum2;
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <!-- Membuat presentase Progress -->
                        <?php
                        $target2 = $tar2;
                        $selesai2 = $jum2;
                        if ($target2 != 0) {
                            $progresSelesai2 = ($selesai2 / $target2) * 100;
                            $prog2 = number_format($progresSelesai2, 0);
                        } else {
                            $prog2 = 0;
                        }
                        ?>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $prog2 }}"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{ $prog2 }}%"></div>
                            </div>
                            <small> <b><?php
                            if ($prog2 != 0) {
                                echo $prog2;
                            } else {
                                echo '0';
                            }
                            ?>%</b> Complete </small>
                        </td>
                        <td class="project-state">
                            <?php
                            if ($prog2 >= 100) {
                                echo '<span class="badge badge-success">Complite</span>';
                            } else {
                                echo '<span class="badge badge-danger">Incomplite</span>';
                            }
                            ?>
                            {{-- <span class="badge badge-success">Success</span> --}}
                        </td>
                    </tr>
                    <!-- Blok 3-->
                    <tr>

                        <td>
                            <p style="font-size: 15pt"> <b>Blok 3</b> <small>( {{ $jumpek3 }} orang )</small></p>

                        </td>
                        <td class="text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <b><?php
                                    if ($tar3 != 0) {
                                        echo $tar3;
                                    } else {
                                        echo '0';
                                    }
                                    ?></b>
                                </li>
                                <li class="list-inline-item">
                                    | Selesai : <?php
                                    if ($jum3 != 0) {
                                        echo $jum3;
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <!-- Membuat presentase Progress -->
                        <?php
                        $target3 = $tar3;
                        $selesai3 = $jum3;
                        if ($target3 != 0) {
                            $progresSelesai3 = ($selesai3 / $target3) * 100;
                            $prog3 = number_format($progresSelesai3, 0);
                        } else {
                            $prog3 = 0;
                        }
                        ?>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $prog3 }}"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{ $prog3 }}%"></div>
                            </div>
                            <small> <b><?php
                            if ($prog3 != 0) {
                                echo $prog3;
                            } else {
                                echo '0';
                            }
                            ?>%</b> Complete </small>
                        </td>
                        <td class="project-state">
                            <?php
                            if ($prog3 >= 100) {
                                echo '<span class="badge badge-success">Complite</span>';
                            } else {
                                echo '<span class="badge badge-danger">Incomplite</span>';
                            }
                            ?>
                            {{-- <span class="badge badge-success">Success</span> --}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
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
