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
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.testimonial.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data->name }}" placeholder="Yujang Lesmana">
                        </div>
                        <div class="form-group">
                            <label for="profession">profession</label>
                            <input type="text" class="form-control" id="profession" name="profession"
                                value="{{ $data->profession }}" placeholder="Dokter">
                        </div>
                        <div class="form-group">
                            <label for="testimoni">testimoni</label>
                            <input type="text" class="form-control" id="testimoni" name="testimoni"
                                value="{{ $data->testimoni }}" placeholder="Mantab Banget">
                        </div>
                        <div class="form-group">
                            <label for="star">Bintang</label>
                            <input type="number" class="form-control" id="star" name="star" step=".1"
                                min="1" max="5" value="{{ $data->star }}" placeholder="1-5">
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
