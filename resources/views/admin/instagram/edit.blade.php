@extends('admin.layouts.base')

@section('title', 'Edit Category')

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
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.instagram.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="link">link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                value="{{ $data->link }}" placeholder="Yujang Lesmana">
                        </div>
                        <img src="/storage/{{ $data->image }}" alt="" width="20%">
                        <div class="form-group">
                            <label for="small-thumbnail">Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
