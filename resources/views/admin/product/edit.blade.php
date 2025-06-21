@extends('admin.layouts.base')

@section('title', 'Edit Product')

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

            {{-- Alert Here --}}
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <h5><i class="icon fas fa-check"></i>
                        {{ session()->get('success') }}</h5>
                </div>
            @elseif (session()->has('success-delete'))
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-check"></i>
                        {{ session()->get('success-delete') }}</h5>
                </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.product.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ $data->code }}" placeholder="2131">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data->name }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $data->price }}" placeholder="10000">
                        </div>
                        <div class="form-group">
                            <label for="old_price">Harga Lama</label>
                            <input type="number" class="form-control" id="old_price" name="old_price"
                                value="{{ $data->old_price }}" placeholder="10000">
                        </div>
                        <div class="form-group">
                            <label for="short_description">Deskripsi</label>
                            <input type="text" class="form-control" id="short_description" name="short_description"
                                value="{{ $data->short_description }}" placeholder="Terbuat Dari Aluminium">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="description" id="description" cols="30" rows="10">{{ $data->description }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="small-thumbnail">Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div> --}}
                        <div class="form-group">
                            <label for="star">Bintang</label>
                            <input type="number" class="form-control" id="star" name="star" min="1"
                                max="5" value="{{ $data->star }}" placeholder="1-5">
                        </div>
                        <div class="form-group">
                            <label>popular</label>
                            <select class="custom-select" name="popular">
                                <option value="1" {{ $data->popular === 1 ? 'selected' : '' }}>Populer</option>
                                <option value="0" {{ $data->popular === 0 ? 'selected' : '' }}>Ga populer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="custom-select" name="status">
                                <option value="1" {{ $data->status === '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $data->status === '0' ? 'selected' : '' }}>Ga aktif</option>
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

                        @foreach ($data->galleries as $galleries)
                            {{-- {{ dd($galleries) }} --}}
                            @if ($galleries->is_default === 0)
                                <img src="{{ asset('/storage/' . $galleries['image']) }}" alt
                                    style="width: 100px; height: 100px">
                                <a href="{{ route('admin.galleries.delete', $galleries->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('admin.galleries.set_default', $galleries->id) }}"
                                    class="btn btn-primary btn-sm">Set as Default</a>
                            @else
                                <img src="{{ asset('/storage/' . $galleries['image']) }}" alt
                                    style="width: 100px; height: 100px">
                                <a href="{{ route('admin.galleries.delete', $galleries->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            @endif
                        @endforeach

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
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            tabSpaces: 8
        });
    </script>
    <script>
        $(function() {
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            // fetchDropdownList('/admin/dropdown/get-category', {
            //     id: '{{ $data->category_id }}',
            //     name: '{{ $data->category->name }}'
            // }, '#selectCategory');

            //fetchdropdown and select by category_id
            fetchDropdownList('/admin/dropdown/get-category', {
                id: '{{ $data->category_id }}'
            }, '#selectCategory');

            //fetch to admin/dropdown/get-category
            // $.ajax({
            //     url: '/admin/dropdown/get-category',
            //     type: 'GET',
            //     dataType: 'json',
            //     success: function(data) {
            //         // console.log(data);
            //         $('#selectCategory').html(data);
            //     }
            // });
        });
    </script>
@endsection
