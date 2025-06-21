@extends('admin.layouts.base')

@section('title', 'Instagram')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">instagram</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <a href="{{ route('admin.instagram.create') }}" class="btn btn-success">Create instagram</a>
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
                                        <th>Link</th>
                                        <th>Gambar</th>
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

@endsection

{{-- js script --}}
@section('js')
    <script>
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.instagram') }}",
                columns: [{
                        data: 'link',
                        name: 'link'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta) {
                            // return "<img src=\"" + data + "\" height=\"50\"/>";
                            return "<img src=\"/storage/" + data + "\" height=\"50\"/>";
                        },
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
            });
        });
    </script>

@endsection
