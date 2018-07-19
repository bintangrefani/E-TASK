    <!-- jQuery -->
    <script src="{{ asset('public/assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('public/assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('public/assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('public/assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('public/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('public/assets/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('public/assets/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('public/assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('public/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('public/assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('public/assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('public/assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('public/assets/build/js/custom.min.js') }}"></script>

    

{{--
    <script src="{{asset('public/assets/template/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/assets/template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/summernote/summernote.min.js')}}"></script>




    <!-- Select2 -->
    <script src="{{asset('public/assets/plugin/select2/select2.full.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('public/assets/template/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>


    <!-- jQuery UI -->



    <input type='hidden' name='_token' value='{{ csrf_token() }}'>


    <script src="{{ asset('public/assets/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/iCheck/icheck.min.js') }}"></script>


    <!-- Custom and plugin javascript -->
    <script src="{{asset('public/assets/template/js/inspinia.js')}}"></script>
    <script src="{{asset('public/assets/template/js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('public/assets/corelib/core.js')}}"></script>
    <!-- Datepicker -->
    <script src="{{asset('public/assets/corelib/datepicker/bootstrap-datepicker.js')}}"></script>

    <!--Datatable -->
    <script src="{{asset('public/assets/plugin/datatables/datatables.min.js')}}"></script>

    <script>
        baseURL = '{{url("/")}}';
    </script>

@yield('scripts')

--}}