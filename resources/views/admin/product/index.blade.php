@extends('admin.layouts.base')

@section('title', 'Product')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Produk</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-success">Tambah Produk</a>
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
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Populer</th>
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
                ajax: "{{ route('admin.product') }}",
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
                        data: 'kategori',
                        name: 'kategori',
                        orderable: false
                    },
                    {
                        data: 'price',
                        name: 'price',
                        render: function(data, type, full, meta) {
                            if (!data) return "<span class=\"text-muted\">-</span>";
                            return "Rp " + Number(data).toLocaleString('id-ID');
                        }
                    },
                    {
                        data: 'popular',
                        name: 'popular',
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return "<span class=\"badge badge-warning\">Populer</span>";
                            }
                            return "<span class=\"text-muted\">-</span>";
                        },
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
                        name: 'action',
                        orderable: false
                    },

                ],
                order: [
                    [5, 'desc']
                ]
            });
        });
    </script>

@endsection
