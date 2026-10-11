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
            @elseif (session()->has('success-default'))
                <div class="alert alert-success">
                    <h5><i class="icon fas fa-check"></i>
                        {{ session()->get('success-default') }}</h5>
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

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.product') }}" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>

            {{-- Foto produk --}}
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        Foto Produk
                    </h3>
                </div>
                <div class="card-body">
                    @if ($data->galleries->count())
                        <div class="row mb-4">
                            @foreach ($data->galleries as $gallery)
                                <div class="col-md-3 col-6 mb-3">
                                    <div class="card mb-0">
                                        <img src="{{ asset('/storage/' . $gallery->image) }}" class="card-img-top"
                                            alt="{{ $data->name }}" style="height: 140px; object-fit: cover">
                                        <div class="card-body p-2 text-center">
                                            @if ($gallery->is_default == 1)
                                                <span class="badge badge-success mb-2 d-block">Foto Utama</span>
                                            @else
                                                <a href="{{ route('admin.galleries.set_default', $gallery->id) }}"
                                                    class="btn btn-primary btn-sm btn-block mb-1">Jadikan Utama</a>
                                            @endif
                                            <a href="{{ route('admin.galleries.delete', $gallery->id) }}"
                                                class="btn btn-danger btn-sm btn-block">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <i class="icon fas fa-image"></i>
                            Belum ada foto. Drag foto ke bawah ini atau klik <strong>Add files</strong>.
                        </div>
                    @endif

                    <div id="actions" class="row">
                        <div class="col-lg-6">
                            <div class="btn-group w-100">
                                <span class="btn btn-success col fileinput-button">
                                    <i class="fas fa-plus"></i>
                                    <span>Add files</span>
                                </span>
                                <button type="button" class="btn btn-primary col start">
                                    <i class="fas fa-upload"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning col cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Cancel upload</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="fileupload-process w-100">
                                <div id="total-progress" class="progress progress-striped active" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"
                                        data-dz-uploadprogress></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table table-striped files" id="previews">
                        <div id="template" class="row mt-2">
                            <div class="col-auto">
                                <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                            </div>
                            <div class="col d-flex align-items-center">
                                <p class="mb-0">
                                    <span class="lead" data-dz-name></span>
                                    (<span data-dz-size></span>)
                                </p>
                                <strong class="error text-danger" data-dz-errormessage></strong>
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <div class="progress progress-striped active w-100" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"
                                        data-dz-uploadprogress></div>
                                </div>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start</span>
                                    </button>
                                    <button type="button" data-dz-remove class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    Drag foto atau klik Add files buat nambahin foto. Foto pertama otomatis jadi foto utama.
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>
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

            //fetchdropdown dan select sesuai category_id
            fetchDropdownList('/admin/dropdown/get-category', {
                id: '{{ $data->category_id }}'
            }, '#selectCategory');

            // DropzoneJS
            Dropzone.autoDiscover = false

            //ambil template preview lalu copot dari DOM
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, {
                url: "{{ route('admin.product.upload.image') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                params: {
                    product_id: "{{ $data->id }}"
                },
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // file ga langsung ke-queue sebelum diklik start
                previewsContainer: "#previews",
                clickable: ".fileinput-button"
            })

            myDropzone.on("addedfile", function(file) {
                file.previewElement.querySelector(".start").onclick = function() {
                    myDropzone.enqueueFile(file)
                }
            })

            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                document.querySelector("#total-progress").style.opacity = "1"
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
                myDropzone.removeAllFiles();
                //refresh biar foto baru langsung keliatan
                window.location.reload();
            })

            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
        });
    </script>
@endsection
