@extends('layouts.admin')


@section('title')
    Dashboard - Kategori
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Kategori</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Table Kategori</h5>
                <div class="table-responsive text-nowrap">
                    <a href="{{ url('admin/kategori/create') }}" class="ms-4 mb-4 btn btn-sm  btn-outline-primary">Tambah
                        Kategori Baru</a>
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            {{-- untuk memunculkan data sesuai banyak data table kategoris --}}
                            @foreach ($kategori as $item)
                                <tr>
                                    {{-- untuk menghitung nomer data --}}
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    {{-- untuk memunculkan data array namaKategori --}}
                                    <td>{{ $item->namaKategori }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" {{-- untuk mengedit data kategori sesuai pilihan --}}
                                                    href="{{ URL::to('admin/kategori/' . $item->id . '/edit') }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                {{-- untuk menghapus data kategori sesuai pilihan --}}
                                                <a class="dropdown-item" href="{{ route('deletekategori', $item->id) }}"><i
                                                        class="bx bx-trash me-1">Hapus</i></a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{-- {{ $data2->links() }} --}}

                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
            <hr class="my-5" />
            <!--/ Responsive Table -->
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
