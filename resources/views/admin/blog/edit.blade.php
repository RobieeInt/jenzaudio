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
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.blog.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $data->title }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10">{!! $data->content !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $data->description }}" placeholder="Terbuat Dari Aluminium">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="{{ $data->author }}" placeholder="UPVC">
                        </div>
                        <img src="/storage/{{ $data->image }}" alt="" width="20%">
                        <div class="form-group">
                            <label for="small-thumbnail">Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="custom-select" name="status">
                                <option value="publish" {{ $data->status === 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="draft" {{ $data->status === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>popular</label>
                            <select class="custom-select" name="popular">
                                <option value="1" {{ $data->popular === '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $data->popular === '0' ? 'selected' : '' }}>Ga aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">tags</label>
                            <input type="text" class="form-control" id="tags" name="tags"
                                value="{{ $data->tags }}" placeholder="Alumunium, Besi,Kitchen set">
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">meta_keyword</label>
                            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                value="{{ $data->meta_keyword }}" placeholder="Alumunium, Besi,Kitchen set">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">meta_description</label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description"
                                value="{{ $data->meta_description }}"
                                placeholder="kithen set custom dapat dibuat oleh pandai besi">
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
