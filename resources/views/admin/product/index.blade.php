@extends('admin.layouts.base')

@section('title', 'Product')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">product</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-success">Create product</a>
                        </div>
                    </div>

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

                    <div class="row">
                        <div class="col-md-12">
                            <table id="tbl_list" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ view('admin.product.modalUploadPhoto') }}

@endsection

{{-- js script --}}
@section('js')
    <script>
        $(function() {
            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.product') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        //visible false
                        visible: false
                    }, {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    //show image
                    {
                        data: 'image',
                        name: 'image',
                        // render: function(data, type, full, meta) {
                        //     // return "<img src=\"" + data + "\" height=\"50\"/>";
                        //     return "<img src=\"/storage/" + data + "\" height=\"50\"/>";
                        // },
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return "<span class=\"badge badge-success\">Aktif</span>";
                            } else {
                                return "<span class=\"badge badge-danger\">Ga Aktif</span>";
                            }
                        },
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                // orderby status
                order: [
                    [3, 'desc']
                ]
            });
            //tbl_list on click image
            $('#tbl_list').on('click', '.image', function() {
                var table = $('#tbl_list').DataTable();
                var data = table.row($(this).parents('tr')).data();

                //data from table and console log

                $('#product_id').val(data.id);


                showmodalupload(data);
            });


            function showmodalupload(data) {
                //open modal modalUploadPhoto
                $('#modalUploadPhoto').modal('show');
                console.log(data.id);

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
                            product_id: $('#product_id').val()
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
                // });
                // //clg previewNode
                // console.log('previewNode: ', previewNode);
                // console.log('previewNode ID: ', previewNode.id);
                // console.log('previewTemplate ID: ', previewTemplate);


            }
        });
    </script>
    <script src="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>

@endsection
