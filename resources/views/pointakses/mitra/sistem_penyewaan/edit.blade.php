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
                <h4 class="card-title mb-4">Edit Order</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach ($order as $item)
                    <form class="forms-sample" method="POST" action="/editorder" enctype="multipart/form-data">
                        @csrf
                       
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label for="nama">Nama penyewa</label>
                            <input type="text" class="form-control" id="nama_penyewa" "
                                name="nama_penyewa" value="{{ $item->nama_penyewa}}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="nama">harga sewa</label>
                            <input type="text" class="form-control" id="manajemen_produks_id " "
                                name="manajemen_produks_id" value="{{$item->produks->harga_sewa }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="nama">Tanggal Sewa</label>
                            <input type="date" class="form-control" id="rent_date" "
                                name="rent_date" value="{{ $item->rent_date }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="return_date" "
                                name="return_date" value="{{ $item->return_date }}">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Edit</button>
                        <a href="/produk" class="btn btn-light">Kembali</a>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
