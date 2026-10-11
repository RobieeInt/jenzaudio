@extends('admin.layouts.base')

@section('title', 'Edit Merk Mobil')

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
                    <h3 class="card-title">Edit Merk Mobil</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.carbrand.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">
                                Nama Merk
                                <code class="align-top" style="font-size: 10px">*Wajib</code>
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $data->name) }}" placeholder="Toyota">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo Merk <small class="text-muted">(kosongin kalau ga mau diganti)</small></label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @if ($data->logo)
                                <img src="{{ asset($data->logo) }}" alt="{{ $data->name }}" class="mt-2"
                                    style="max-height: 60px">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sort_order">Urutan Tampil</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order"
                                value="{{ old('sort_order', $data->sort_order) }}" placeholder="0">
                            <small class="text-muted">Angka kecil tampil duluan</small>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="custom-select" name="status">
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Ga aktif</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.carbrand') }}" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
