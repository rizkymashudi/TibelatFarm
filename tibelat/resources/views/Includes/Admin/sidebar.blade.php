<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">Tibelat Farm Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ set_active('dashboard') }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ Route::is('transactionCOD.index') ? set_active('transactionCOD.index') : (Route::is('transactionTF.index') ? set_active('transactionTF.index') : set_active('sales-report-detail.index'))  }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis transaksi:</h6>
                <a class="collapse-item" href="{{ route('transactionCOD.index') }}">COD</a>
                <a class="collapse-item" href="{{ route('transactionTF.index') }}">Transfer</a>
                <a class="collapse-item" href="{{ route('transactionDone.index') }}">Transaksi selesai</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ set_active('etalase.index') }}">
        <a class="nav-link" href="{{ route('etalase.index') }}">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Etalase</span>
        </a>
    </li>

    <li class="nav-item {{ set_active('gallery.index') }}">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Gallery items</span>
        </a>
    </li>

    <li class="nav-item {{ set_active('customer.index') }}">
        <a class="nav-link" href="{{ route('customer.index') }}">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Customers</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('sales-report.index') ? set_active('sales-report.index') : set_active('sales-report-detail.index')  }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan penjualan</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('sales-report.index') }}">Laporan penjualan</a>
                <a class="collapse-item" href="{{ route('sales-report-detail.index') }}">Detail laporan penjualan</a>
            </div>
        </div>
    </li>   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>