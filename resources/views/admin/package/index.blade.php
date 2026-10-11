@extends('admin.layouts.base')

@section('title', 'Paket')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Paket Audio</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <a href="{{ route('admin.package.create') }}" class="btn btn-success">Tambah Paket</a>
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
                                        <th>Foto</th>
                                        <th>Nama Paket</th>
                                        <th>Merk Mobil</th>
                                        <th>Harga</th>
                                        <th>Populer</th>
                                        <th>Urutan</th>
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

@endsection

{{-- js script --}}
@section('js')
    <script>
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.package') }}",
                columns: [{
                        data: 'thumbnail',
                        name: 'thumbnail',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'brand',
                        name: 'brand',
                        orderable: false
                    },
                    {
                        data: 'harga',
                        name: 'harga',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'is_popular',
                        name: 'is_popular',
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return "<span class=\"badge badge-warning\">Terlaris</span>";
                            }
                            return "<span class=\"text-muted\">-</span>";
                        },
                        orderable: false
                    },
                    {
                        data: 'sort_order',
                        name: 'sort_order'
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
                        name: 'action',
                        orderable: false
                    },

                ],
                order: [
                    [5, 'asc']
                ]
            });
        });
    </script>

@endsection
