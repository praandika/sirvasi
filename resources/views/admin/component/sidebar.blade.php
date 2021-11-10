<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('landing.page') }}" class="brand-link">
        <img src="#" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Naradas Sambali</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if((Auth::user()->access == "user") || (Auth::user()->access == "admin"))
               <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon far fa-chart-bar"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->access == "admin")
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.data') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guest.data') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Tamu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('room.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kamar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('facilities.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Fasilitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reservation.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Reservasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('reservation.book') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                        <p>Reservation</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-check"></i>
                        <p>Validasi</p>
                    </a>
                </li>
                @endif

                @if((Auth::user()->access == "pemimpin") || (Auth::user()->access == "admin"))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                @endif

                @if(Auth::user()->access == "user")
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-history"></i>
                        <p>
                            History
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Booking History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment History</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
