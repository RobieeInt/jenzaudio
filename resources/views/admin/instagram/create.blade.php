@extends('admin.layouts.base')

@section('title', 'Create Category')

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
                    <h3 class="card-title">Create Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.instagram.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                value="{{ old('link') }}" placeholder="https://www.instagram.com/p/CwSN7nlBZda/?hl=id">
                        </div>
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
