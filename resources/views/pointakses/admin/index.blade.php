@extends('pointakses.halaman_dashboard.index')

@section('navitem')
<hr class="sidebar-divider">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('datamitra') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Control Mitra</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
@endsection


@section('main')
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                {{ Auth::user()->email; }}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->role; }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i  class="fas fa-fw fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
@endsection