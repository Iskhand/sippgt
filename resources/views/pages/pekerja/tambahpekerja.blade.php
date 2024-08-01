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

        <h1 class="text-center mb-4">Tambah Data Pekerja</h1>
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body bg-warning">
                        <form action="/insertdata" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-2 mt-3">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{{ $nip }}" id="nip"
                                        name="nip" placeholder="NIP" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}">
                                </div>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">No Hp</label>
                                <div class="col-sm-5">
                                    <input type="number"
                                        class="form-control @error('telp')
                                    is-invalid
                                @enderror"
                                        id="telp" name="telp" placeholder="No notelpon" value="{{ old('telp') }}">
                                </div>
                                @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-5">
                                    <input type="text"
                                        class="form-control @error('nama')
                                    is-invalid
                                @enderror"
                                        id="nama" name="nama" placeholder="Nama Pegawai"
                                        value="{{ old('nama') }}">
                                </div>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat" value="{{ old('alamat') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Kel / Desa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kel_desa" name="kel_desa"
                                        placeholder="Kel / Desa" value="{{ old('kel_desa') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kec" name="kec"
                                        placeholder="Kecamatan" value="{{ old('kec') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Kab / kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kab_kota" name="kab_kota"
                                        placeholder="Kab / Kota" value="{{ old('kab_kota') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-date" id="tanggal_lahir" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-sm-2 col-form-label">Join Date</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-date" id="masuk" name="masuk"
                                        placeholder="Join Date" value="{{ old('masuk') }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-5">
                                    <select class="form-select" aria-label="Default select example" name="kategori"
                                        value="{{ old('kategori') }}">
                                        <option value="">Pilih Kategori</option>
                                        <option value="BLOK 1">Blok 1</option>
                                        <option value="BLOK 2">Blok 2</option>
                                        <option value="BLOK 3">Blok 3</option>
                                    </select>
                                </div>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/pekerja" class="btn btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
