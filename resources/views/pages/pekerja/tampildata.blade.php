@extends('main.main')

@section('mainContent')
    <div class="container">
        <style>
            .form-group label {
                font-weight: bold;
                color: #333;
            }

            .form-control {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 8px;
                width: 100%;
                margin-top: 5px;
                background: white;
            }

            .btn-submit {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 10px;
            }

            .btn-submit:hover {
                background-color: #0056b3;
                text-align: center;
            }
        </style>

        <h1 class="text-center mb-4">Kelola Data Pekerja</h1>
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body bg-warning">
                        <form action="/updatedata/{{ $data->nip }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-2 mt-3">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{{ $data->nip }}" id="nip"
                                        name="nip" placeholder="NIP" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" value="{{ $data->nik }}" id="nik"
                                        name="nik" placeholder="NIK">
                                </div>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">No Hp</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" value="{{ $data->telp }}" id="telp"
                                        name="telp" placeholder="No notelpon">
                                </div>
                                @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{{ $data->nama }}" id="nama"
                                        name="nama" placeholder="Nama Pegawai">
                                </div>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $data->alamat }}" id="alamat"
                                        name="alamat" placeholder="Alamat" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Kel / Desa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $data->kel_desa }}" id="kel_desa"
                                        name="kel_desa" placeholder="Kel / Desa" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $data->kec }}" id="kec"
                                        name="kec" placeholder="Kecamatan" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Kab / kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $data->kab_kota }}" id="kab_kota"
                                        name="kab_kota" placeholder="Kab / Kota" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $data->tempat_lahir }}"
                                        id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-date" value="{{ $data->tanggal_lahir }}"
                                        id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Join Date</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-date" value="{{ $data->masuk }}" id="masuk"
                                        name="masuk" placeholder="Join Date" required>
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-5">
                                    <select class="form-select" value="{{ $data->kategori }}"
                                        aria-label="Default select example" name="kategori" required>
                                        <option selected>{{ $data->kategori }}</option>
                                        <option value="BLOK 1">Blok 1</option>
                                        <option value="BLOK 2">Blok 2</option>
                                        <option value="BLOK 3">Blok 3</option>
                                    </select>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/pekerja" class="btn btn-danger">Kembali</a>
                            {{-- <a href="/deletedata/{{ $data->nip }}"
                                onclick="return confirm('Apakah anda ingin menghapus data {{ $data->nama }}?, data tidak dapat dikembalikan setelah terhapus')"
                                id="hapus" class="btn btn-danger delete" data-nama="{{ $data->nama }}"
                                data-nip="{{ $data->nip }}">Delete</a> --}}
                            {{-- <a href="/deletedata/{{ $data->nip }}" class="btn btn-danger delete"
                                data-nama="{{ $data->nama }}" data-nip="{{ $data->nip }}">Delete</a> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
