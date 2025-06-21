@extends('admin.layouts.base')

@section('title', 'Testimoni')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">testimonial</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-success">Create testimonial</a>
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
                                        <th>Nama</th>
                                        <th>Profesi</th>
                                        <th>Testimoni</th>
                                        <th>Gambar</th>
                                        <th>Bintang</th>
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
                ajax: "{{ route('admin.testimonial') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'profession',
                        name: 'profession'
                    },
                    {
                        data: 'testimoni',
                        name: 'testimoni'
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
                        data: 'star',
                        name: 'star',
                        render: function(data, type, full, meta) {
                            return data + " <i class=\"fas fa-star\"></i>";
                        },
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
        });
    </script>

@endsection
