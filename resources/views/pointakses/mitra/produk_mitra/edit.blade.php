@extends('pointakses.halaman_dashboard.mitra')

@section('navitem')
<hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="/mitra">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Manajemen Produk</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/produk">Produk</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Sistem Penyewaan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/penyewaan">Penyewaan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



@endsection

@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Produk</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach ($data as $item)
                    <form class="forms-sample" method="POST" action="/editproduk" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <div class="p-2">
                                <img src="{{ asset('picture/accounts/') }}/{{ $item->gambar }}" alt="Image"
                                    style="width: 50px; height: 50px;">
                            </div>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama barang</label>
                            <input type="text" class="form-control" id="nama" "
                                name="nama_barang" value="{{ $item->nama_barang}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">harga sewa</label>
                            <input type="text" class="form-control" id="nama" "
                                name="harga_sewa" value="{{ $item->harga_sewa  }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Deskripsi Barang</label>
                            <input type="text" class="form-control" id="nama" "
                                name="deskripsi_barang" value="{{ $item->deskripsi_barang }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Ringkasan</label>
                            <input type="text" class="form-control" id="nama" "
                                name="Ringkasan" value="{{ $item->Ringkasan }}">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="/produk" class="btn btn-light">Kembali</a>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
