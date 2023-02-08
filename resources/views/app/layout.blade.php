<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/brands.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/sweetalert2/sweetalert2.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  @include('app.navbar')

  @include('app.topbar')

  @include('app.content')

  @include('app.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('asset/dist/js/demo.js') }}"></script>
{{-- SweetAlert2 --}}
<script src="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
{{-- Custom Js --}}
<script src="{{ asset('asset/js/custom.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('asset/js/other.js') }}" type="text/javascript" charset="utf-8"></script>
@yield('script')















  <!-- general modal -->

  <div class="modal fade" id='myModalGeneral'>
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3><span id='titlmyModalGeneral'></span></h3>
        </div>

        <div class="modal-body" >
        <div id='span_addother'></div>
        </div>

        <div class="modal-footer">
            <button id="footer_print" class="btn btn-primary">Cetak</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        </div>
        
      </div>

    </div>
  </div>



  <script>
  $("#footer_print").hide();
  </script>




  <!-- end general modal -->
</body>
</html>
