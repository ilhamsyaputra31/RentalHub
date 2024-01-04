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
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0 ml-5">Data Mitra List</h4>
                </div>
                <div>
                        <a href="/registed-user" class="text-decoration-none text-white mr-5"><button type="button"
                            class="btn btn-primary btn-icon-text btn-rounded">
                            <i class="ti-plus btn-icon-prepend"></i>Approved Mitra
                        </button></a>
                </div>
                
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(
                    'Sukses',
                    '{{ Session::get('success') }}',
                    'success'
                );
            });
        </script>
    @endif
    <div class="col-lg-12 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Gambar
                                </th>
                                <th>
                                    Nama lengkap
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    status
                                </th>
                                <th>
                                    action
                                </th>
                                
                            </tr>
                        </thead>
                        
                        @foreach ($uc as $item)
                            <tbody>
                                <td class="py-1">
                                    <img src="{{ asset('picture/accounts') }}/{{ $item->gambar }}" alt="image" height="50" width="50"/>
                                </td>
                                <td>
                                    {{ $item->fullname }}
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <form onsubmit="return confirmDelete(event)" class="d-inline"
                                        action="/hapusuc/{{ $item->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-sm btn-danger btn-sm">Del</button>
                                    </form>
                            </td>
                                    
                            </tbody>
                        @endforeach
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(event) {
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Yakin Hapus Data?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Your imaginary file is safe!');
            }
        });
    }
</script>
