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
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.contact.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data->name }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $data->email }}" placeholder="Terbuat Dari Aluminium">
                        </div>
                        <div class="form-group">
                            <label for="message">message</label>
                            <input type="text" class="form-control" id="message" name="message"
                                value="{{ $data->message }}" placeholder="Terbuat Dari Aluminium">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $data->address }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="telp">telp</label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                value="{{ $data->telp }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $data->phone }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="facebook">facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                value="{{ $data->facebook }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="twitter">twitter</label>
                            <input type="text" class="form-control" id="twitter" name="twitter"
                                value="{{ $data->twitter }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">linkedin</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin"
                                value="{{ $data->linkedin }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="instagram">instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                value="{{ $data->instagram }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="youtube">youtube</label>
                            <input type="text" class="form-control" id="youtube" name="youtube"
                                value="{{ $data->youtube }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">whatsapp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                value="{{ $data->whatsapp }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="linkvideo">linkvideo</label>
                            <input type="text" class="form-control" id="linkvideo" name="linkvideo"
                                value="{{ $data->linkvideo }}" placeholder="UPVC">
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
@section('js')
    {{-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}

    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content', {
            tabSpaces: 8
        });
    </script>
@endsection
