@extends('admin.layouts.base')

@section('title', 'Edit Paket')

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
                    <h3 class="card-title">Edit Paket</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.package.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>
                                Merk Mobil
                            </label>
                            <select name="car_brand_id" id="selectCarBrand" class="form-control select2bs4"
                                data-placeholder="Pilih Merk Mobil" style="width: 100%;">
                            </select>
                            <small class="text-muted">Kosongin (Semua Mobil) kalau paketnya universal</small>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Nama Paket
                                <code class="align-top" style="font-size: 10px">*Wajib</code>
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $data->name) }}" placeholder="Paket Signature">
                        </div>
                        <div class="form-group">
                            <label for="car_models">Tipe Mobil</label>
                            <input type="text" class="form-control" id="car_models" name="car_models"
                                value="{{ old('car_models', $data->car_models) }}" placeholder="Avanza, Veloz, Rush">
                            <small class="text-muted">Pisahin pakai koma. Kosongin kalau cocok buat semua tipe</small>
                        </div>
                        <div class="form-group">
                            <label for="short_description">Deskripsi Pendek</label>
                            <input type="text" class="form-control" id="short_description" name="short_description"
                                value="{{ old('short_description', $data->short_description) }}"
                                placeholder="Balance antara kualitas suara dan fitur lengkap.">
                            <small class="text-muted">1 baris, tampil di kartu paket</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi Lengkap</label>
                            <textarea name="description" id="description" cols="30" rows="10">{{ old('description', $data->description) }}</textarea>
                            <small class="text-muted">Tampil di halaman detail paket</small>
                        </div>
                        <div class="form-group">
                            <label for="features">Isi Paket</label>
                            <textarea class="form-control" name="features" id="features" rows="6"
                                placeholder="Speaker depan & belakang&#10;Penambahan subwoofer aktif&#10;Tuning detail sesuai selera">{{ old('features', $data->features) }}</textarea>
                            <small class="text-muted">1 baris = 1 item isi paket</small>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Harga Normal</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ old('price', $data->price) }}" placeholder="3500000">
                                    <small class="text-muted">Kosongin kalau mau tampil "Hubungi Kami"</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="discount_price">Harga Diskon</label>
                                    <input type="number" class="form-control" id="discount_price" name="discount_price"
                                        value="{{ old('discount_price', $data->discount_price) }}" placeholder="2800000">
                                    <small class="text-muted">Kosongin kalau ga ada diskon</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="discount_until">Diskon Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="discount_until" name="discount_until"
                                        value="{{ old('discount_until', $data->discount_until?->format('Y-m-d')) }}">
                                    <small class="text-muted">Lewat tanggal ini diskon mati sendiri</small>
                                </div>
                            </div>
                        </div>

                        @if ($data->price && $data->discount_price && !$data->has_discount)
                            <div class="alert alert-warning">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                Diskon ga kepake sekarang (harga diskon ga lebih murah dari harga normal, atau tanggal
                                diskonnya udah lewat). Di web tampil harga normal.
                            </div>
                        @elseif ($data->has_discount)
                            <div class="alert alert-success">
                                <i class="icon fas fa-tags"></i>
                                Diskon aktif: tampil <strong>Rp
                                    {{ number_format($data->final_price, 0, ',', '.') }}</strong>
                                dengan badge <strong>Hemat {{ $data->discount_percent }}%</strong>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="warranty">Garansi</label>
                                    <input type="text" class="form-control" id="warranty" name="warranty"
                                        value="{{ old('warranty', $data->warranty) }}"
                                        placeholder="Garansi pemasangan 1 tahun">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration">Estimasi Pengerjaan</label>
                                    <input type="text" class="form-control" id="duration" name="duration"
                                        value="{{ old('duration', $data->duration) }}" placeholder="Pengerjaan 1 hari">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sort_order">Urutan Tampil</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order"
                                value="{{ old('sort_order', $data->sort_order) }}" placeholder="0">
                            <small class="text-muted">Angka kecil tampil duluan</small>
                        </div>
                        <div class="form-group">
                            <label>Paket Terlaris</label>
                            <select class="custom-select" name="is_popular">
                                <option value="0" {{ $data->is_popular == 0 ? 'selected' : '' }}>Biasa</option>
                                <option value="1" {{ $data->is_popular == 1 ? 'selected' : '' }}>Terlaris (ada ribbon)
                                </option>
                            </select>
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
                        <a href="{{ route('admin.package') }}" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>

            {{-- Foto paket --}}
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        Foto Paket
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
                                                <a href="{{ route('admin.package.galleries.set_default', $gallery->id) }}"
                                                    class="btn btn-primary btn-sm btn-block mb-1">Jadikan Utama</a>
                                            @endif
                                            <a href="{{ route('admin.package.galleries.delete', $gallery->id) }}"
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

            //fetchdropdown dan select sesuai car_brand_id
            fetchDropdownList('/admin/dropdown/get-car-brand', {
                id: '{{ $data->car_brand_id }}'
            }, '#selectCarBrand');

            // DropzoneJS
            Dropzone.autoDiscover = false

            //ambil template preview lalu copot dari DOM
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, {
                url: "{{ route('admin.package.upload.image') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                params: {
                    package_id: "{{ $data->id }}"
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
