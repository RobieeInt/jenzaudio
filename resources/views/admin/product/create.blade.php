@extends('admin.layouts.base')

@section('title', 'Create Product')

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
                    <h3 class="card-title">Create Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.product.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="icon fas fa-info"></i>
                            Isi dulu data produknya, abis disimpan lu langsung dibawa ke halaman edit buat upload foto.
                        </div>

                        <div class="form-group">
                            <label for="code">code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ old('code') }}" placeholder="2131">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" placeholder="10000">
                        </div>
                        <div class="form-group">
                            <label for="old_price">Harga Lama</label>
                            <input type="number" class="form-control" id="old_price" name="old_price"
                                value="{{ old('old_price') }}" placeholder="10000">
                        </div>
                        <div class="form-group">
                            <label for="short_description">Deskripsi Pendek</label>
                            <input type="text" class="form-control" id="short_description" name="short_description"
                                value="{{ old('short_description') }}" placeholder="Terbuat Dari Aluminium">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="small-thumbnail">Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div> --}}
                        {{-- star --}}
                        <div class="form-group">
                            <label for="star">Bintang</label>
                            <input type="number" class="form-control" id="star" name="star" min="1"
                                max="5" value="{{ old('star') }}" placeholder="1-5">
                        </div>
                        <div class="form-group">
                            <label>popular</label>
                            <select class="custom-select" name="popular">
                                <option value="1" {{ old('popular') === '1' ? 'selected' : '' }}>Populer</option>
                                <option value="0" {{ old('popular') === '0' ? 'selected' : '' }}>Ga populer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="custom-select" name="status">
                                <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Ga aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Kategori
                                <code class="align-top" style="font-size: 10px">*Wajib</code>
                            </label>
                            <select name="category_id" id="selectCategory" class="form-control select2bs4"
                                data-placeholder="Pilih Kategori" style="width: 100%;">
                            </select>
                        </div>
                    </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan &amp; Lanjut Upload Foto</button>
                <a href="{{ route('admin.product') }}" class="btn btn-default">Kembali</a>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('js')
    {{-- fetching dropdown category --}}
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

            fetchDropdownList('/admin/dropdown/get-category', {}, '#selectCategory');
        });
    </script>
@endsection
