<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #445069">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('books.png') }}" width="45">
        </div>
        <div class="sidebar-brand-text mx-3">LMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- sidebar menu --}}
    @if(auth()->user()->isAdmin())
        <li class="nav-item active"><a href="{{ route('books.index') }}" class="nav-link"><i class="bi bi-book"></i><span>&nbsp; Book CRUD operations</span></a></li>

         <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active"><a href="{{ route('booking-details.index') }}" class="nav-link"><i class="bi bi-calendar-date"></i><span>&nbsp; Booking Details</span></a></li>
    @else
        <li class="nav-item active"><a href="{{ route('booking.index') }}" class="nav-link"><i class="bi bi-calendar-plus"></i><span>&nbsp; Book Library Books</span></a></li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> 

</ul>
<!-- End of Sidebar -->