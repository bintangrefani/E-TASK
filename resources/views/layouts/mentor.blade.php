<!DOCTYPE html>
<html lang="en">

@include('templates.partials._head')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('/')}}" class="site_title"><i class="fa fa-paw"></i><span style="padding-left: 10px;">E-Task!</span></a>
            </div>

            <div class="clearfix"></div>

            @include('templates.partials.mentor._menu-profile')
            <br />

            @include('templates.partials.mentor._sidebar')
            
            @include('templates.partials._menu-footer')
          </div>
        </div>
        @include('templates.partials.mentor._top-nav')

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <!-- /top tiles -->
          @yield('content')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('templates.partials._footer')
        <!-- /footer content -->
      </div>
    </div>

@include('templates.partials._script')

  </body>
</html>
