<!-- header -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background: linear-gradient(to right, #445069, #d7d2cc);">

    <!-- Topbar Search -->
    {!! Form::open([ 'class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search shadow']) !!}
        <div class="input-group">
            {!! Form::text('search_query', null, ['class' => 'form-control bg-light border-0 small', 'placeholder' => 'Search for...', 'aria-label' => 'Search', 'aria-describedby' => 'basic-addon2']) !!}
            <div class="input-group-append">
                {!! Form::button('<i class="fas fa-search fa-sm"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
            </div>
        </div>
    {!! Form::close() !!}


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

         <!-- Nav Item - Search Dropdown (Visible Only XS) -->
         <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
    
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle"
                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard
                </a>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="{{ route('profile.password') }}">
                    <i class="bi bi-shield-lock-fill fa-sm fa-fw mr-2 text-gray-400"></i>
                    Update Password
                </a>
                <div class="dropdown-divider"></div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            
            </div>
        </li>

    </ul>

</nav>
<!-- End of header -->