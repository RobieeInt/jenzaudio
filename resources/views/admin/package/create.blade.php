@extends('admin.layouts.base')

@section('title', 'Tambah Paket')

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- Alert Here --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Paket</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.package.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="icon fas fa-info"></i>
                            Isi dulu data paketnya, abis disimpan lu langsung dibawa ke halaman edit buat upload foto.
                        </div>

                        <div class="form-group">
                            <label>
                                Merk Mobil
                            </label>
                            <select name="car_brand_id" id="selectCarBrand" class="form-control select2bs4"
                                data-placeholder="Pilih Merk Mobil" style="width: 100%;">
                            </select>
                            <small class="text-muted">Kosongin (Semua Mobil) kalau paketnya universal</small>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Nama Paket
                                <code class="align-top" style="font-size: 10px">*Wajib</code>
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="Paket Signature">
                        </div>
                        <div class="form-group">
                            <label for="car_models">Tipe Mobil</label>
                            <input type="text" class="form-control" id="car_models" name="car_models"
                                value="{{ old('car_models') }}" placeholder="Avanza, Veloz, Rush">
                            <small class="text-muted">Pisahin pakai koma. Kosongin kalau cocok buat semua tipe</small>
                        </div>
                        <div class="form-group">
                            <label for="short_description">Deskripsi Pendek</label>
                            <input type="text" class="form-control" id="short_description" name="short_description"
                                value="{{ old('short_description') }}"
                                placeholder="Balance antara kualitas suara dan fitur lengkap.">
                            <small class="text-muted">1 baris, tampil di kartu paket</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi Lengkap</label>
                            <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            <small class="text-muted">Tampil di halaman detail paket</small>
                        </div>
                        <div class="form-group">
                            <label for="features">Isi Paket</label>
                            <textarea class="form-control" name="features" id="features" rows="6"
                                placeholder="Speaker depan & belakang&#10;Penambahan subwoofer aktif&#10;Tuning detail sesuai selera">{{ old('features') }}</textarea>
                            <small class="text-muted">1 baris = 1 item isi paket</small>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Harga Normal</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ old('price') }}" placeholder="3500000">
                                    <small class="text-muted">Kosongin kalau mau tampil "Hubungi Kami"</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="discount_price">Harga Diskon</label>
                                    <input type="number" class="form-control" id="discount_price" name="discount_price"
                                        value="{{ old('discount_price') }}" placeholder="2800000">
                                    <small class="text-muted">Kosongin kalau ga ada diskon</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="discount_until">Diskon Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="discount_until" name="discount_until"
                                        value="{{ old('discount_until') }}">
                                    <small class="text-muted">Lewat tanggal ini diskon mati sendiri</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="warranty">Garansi</label>
                                    <input type="text" class="form-control" id="warranty" name="warranty"
                                        value="{{ old('warranty') }}" placeholder="Garansi pemasangan 1 tahun">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration">Estimasi Pengerjaan</label>
                                    <input type="text" class="form-control" id="duration" name="duration"
                                        value="{{ old('duration') }}" placeholder="Pengerjaan 1 hari">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sort_order">Urutan Tampil</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order"
                                value="{{ old('sort_order', 0) }}" placeholder="0">
                            <small class="text-muted">Angka kecil tampil duluan</small>
                        </div>
                        <div class="form-group">
                            <label>Paket Terlaris</label>
                            <select class="custom-select" name="is_popular">
                                <option value="0" {{ old('is_popular') === '0' ? 'selected' : '' }}>Biasa</option>
                                <option value="1" {{ old('is_popular') === '1' ? 'selected' : '' }}>Terlaris (ada ribbon)
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="custom-select" name="status">
                                <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Ga aktif</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan & Lanjut Upload Foto</button>
                        <a href="{{ route('admin.package') }}" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            tabSpaces: 8
        });
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            fetchDropdownList('/admin/dropdown/get-car-brand', {}, '#selectCarBrand');
        });
    </script>
@endsection
