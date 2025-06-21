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
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.blog.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ old('description') }}" placeholder="Terbuat Dari Aluminium">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="{{ old('author') }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="small-thumbnail">Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="custom-select" name="status">
                                <option value="publish" {{ old('status') === 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>popular</label>
                            <select class="custom-select" name="popular">
                                <option value="1" {{ old('popular') === '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('popular') === '0' ? 'selected' : '' }}>Ga aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">tags</label>
                            <input type="text" class="form-control" id="tags" name="tags"
                                value="{{ old('tags') }}" placeholder="Alumunium, Besi,Kitchen set">
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">meta_keyword</label>
                            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                value="{{ old('meta_keyword') }}" placeholder="Alumunium, Besi,Kitchen set">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">meta_description</label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description"
                                value="{{ old('meta_description') }}"
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
