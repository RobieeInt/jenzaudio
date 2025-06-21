@extends('admin.layouts.base')

@section('title', 'Create Product')

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
                    <h3 class="card-title">Create Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.product.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ old('code') }}" placeholder="2131">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="UPVC">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" placeholder="10000">
                        </div>
                        <div class="form-group">
                            <label for="old_price">Harga Lama</label>
                            <input type="number" class="form-control" id="old_price" name="old_price"
                                value="{{ old('old_price') }}" placeholder="10000">
                        </div>
                        <div class="form-group">
                            <label for="short_description">Deskripsi Pendek</label>
                            <input type="text" class="form-control" id="short_description" name="short_description"
                                value="{{ old('short_description') }}" placeholder="Terbuat Dari Aluminium">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="small-thumbnail">Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div> --}}
                        {{-- star --}}
                        <div class="form-group">
                            <label for="star">Bintang</label>
                            <input type="number" class="form-control" id="star" name="star" min="1"
                                max="5" value="{{ old('star') }}" placeholder="1-5">
                        </div>
                        <div class="form-group">
                            <label>popular</label>
                            <select class="custom-select" name="popular">
                                <option value="1" {{ old('popular') === '1' ? 'selected' : '' }}>Populer</option>
                                <option value="0" {{ old('popular') === '0' ? 'selected' : '' }}>Ga populer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="custom-select" name="status">
                                <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Ga aktif</option>
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
                        {{--
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Drag Foto atau klik Add files untuk menambahkan foto
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="actions" class="row">
                                            <div class="col-lg-6">
                                                <div class="btn-group w-100">
                                                    <span class="btn btn-success col fileinput-button">
                                                        <i class="fas fa-plus"></i>
                                                        <span>Add files</span>
                                                    </span>
                                                    <button type="submit" class="btn btn-primary col start">
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
                                                    <div id="total-progress" class="progress progress-striped active"
                                                        role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                        aria-valuenow="0">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                                            data-dz-uploadprogress></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table table-striped files" id="previews">
                                            <div id="template" class="row mt-2">
                                                <div class="col-auto">
                                                    <span class="preview"><img src="data:," alt=""
                                                            data-dz-thumbnail /></span>
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
                                                        <button class="btn btn-primary start">
                                                            <i class="fas fa-upload"></i>
                                                            <span>Start</span>
                                                        </button>
                                                        <button data-dz-remove class="btn btn-warning cancel">
                                                            <i class="fas fa-times-circle"></i>
                                                            <span>Cancel</span>
                                                        </button>
                                                        <button data-dz-remove class="btn btn-danger delete">
                                                            <i class="fas fa-trash"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        Drag Foto atau klik Add files untuk menambahkan foto
                                    </div>
                                </div>
                            </div>
                        </div> --}}


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
    {{-- fetching dropdown category --}}
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            tabSpaces: 8
        });
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


            fetchDropdownList('/admin/dropdown/get-category', {
                // list_branch_id: $('#access_branch_list').val()
            }, '#selectCategory');

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            // window.addEventListener('DOMContentLoaded', function() {
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document
                .body, { // Make the whole body a dropzone
                    // url: "/target-url", // Set the url
                    // route master.item.upload
                    url: "{{ route('admin.product.upload.image') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    //send sku to paramter
                    params: {
                        // sku: sku
                        //set sku_number_upload as sku
                        sku: $('#sku_number_upload').val()
                    },
                    thumbnailWidth: 80,
                    thumbnailHeight: 80,
                    parallelUploads: 20,
                    previewTemplate: previewTemplate,
                    autoQueue: false, // Make sure the files aren't queued until manually added
                    previewsContainer: "#previews", // Define the container to display the previews
                    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
                })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick =
                    function() {
                        myDropzone.enqueueFile(file)
                    }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style
                    .width =
                    progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute(
                    "disabled",
                    "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
                myDropzone.removeAllFiles();
                // $('#modalUploadPhoto').modal('hide');
                //refresh page
                window.location.reload();
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone
                    .ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
        });
    </script>


    <script src="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>
@endsection
