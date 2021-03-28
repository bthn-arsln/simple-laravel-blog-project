<!-- Topbar -->
<nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="my-2 mr-auto d-none d-sm-inline-block form-inline ml-md-3 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="border-0 form-control bg-light small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="ml-auto navbar-nav">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="p-3 shadow dropdown-menu dropdown-menu-right animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="mr-auto form-inline w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="border-0 form-control bg-light small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="mx-1 nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="text-white fas fa-file-alt"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-gray-500 small">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="text-white fas fa-donate"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-gray-500 small">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="text-white fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                    <div>
                        <div class="text-gray-500 small">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="text-center text-gray-500 dropdown-item small" href="#">Show All Alerts</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="mx-1 nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                {{-- <span class="badge badge-danger badge-counter">

                </span> --}}
            </a>
            <!-- Dropdown - Messages -->
            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Mesaj Kutusu
                </h6>
                @foreach ($messages as $message)
                    <a class="dropdown-item d-flex align-items-center" href="#">

                        <div class="font-weight-bold">
                            <div class="text-truncate">{{ $message->message }}</div>
                            <div class="text-gray-500 small">{{ $message->name }} ·
                                {{ $message->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                @endforeach
                <a class="text-center text-gray-500 dropdown-item small" href="#">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                    class="mr-2 text-gray-600 d-none d-lg-inline small">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</span>
                @if (Auth::user()->gender == 'male')
                    <img class="img-profile rounded-circle"
                        src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('img/undraw_profile_2.svg') }}">
                @else
                    <img class="img-profile rounded-circle"
                        src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('img/undraw_profile_3.svg') }}">
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                    <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
                    Profil
                </a>
                <a class="dropdown-item" href="#">
                    <i class="mr-2 text-gray-400 fas fa-cogs fa-sm fa-fw"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="mr-2 text-gray-400 fas fa-list fa-sm fa-fw"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                    <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                    Çıkış Yap
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
