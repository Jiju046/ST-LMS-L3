<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LMS</title>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>

    <!-- Custom styles for table -->
    <link href="{{ asset('sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom fonts for table -->
    <link href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">

        <!-- Include DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.9/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <style>
        .dataTables_length > label{
            margin-left: 30px;
        }
        .dt-button{
            color: green !important;
            background-color: blue !important;
            border: 1px solid #B5CB99 !important;
        }
        .book-table_length{
            border: 1px solid grey !important;
        }
    </style>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


    <!-- jQuery Validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    
</head>
<body>
    
    <!-- Page Wrapper -->
    <div id="wrapper">

            @include('partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('partials.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                    </div>

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        @include('partials.footer')  

        </div>
        <!-- End of Content Wrapper -->

    </div>

    @stack('scripts')
    

    {{-- csrf token --}}
    <script src="{{ asset('js/csrf.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-admin-2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb-admin-2/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-admin-2/js/demo/datatables-demo.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script>

</body>
</html>