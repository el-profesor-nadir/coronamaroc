<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('theme/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('theme/assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Covid-19 Morocco
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('theme/assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('theme/assets/demo/demo.css') }}" rel="stylesheet" />
  <link href="{{ asset('theme/assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('theme/assets/img/sidebar-1.jpg') }}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo">
        <a href="{{ route('index')}}" class="simple-text logo-normal">
          Corona Maroc
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('index')}}">
              <i class="material-icons">dashboard</i>
              <p>Tableau de bord</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">local_hotel</i>
                  </div>
                  <p class="card-category">Cas Confirmés <br> الحالات المؤكدة</p>
                  <h3 class="card-title"> {{ $stats['features'][count($stats['features'])-1]['attributes']['Cas_confirmés'] }} </h3>
                </div>
                <div class="card-footer">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">accessibility</i>
                  </div>
                  <p class="card-category">Guéris <br> المتعافون</p>
                  <h3 class="card-title">{{ $stats['features'][count($stats['features'])-1]['attributes']['Retablis'] }}</h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">airline_seat_flat</i>
                  </div>
                  <p class="card-category">Décès <br> الوفيات</p>
                  <h3 class="card-title">{{ $stats['features'][count($stats['features'])-1]['attributes']['Décédés'] }}</h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">directions_run</i>
                  </div>
                  <p class="card-category">Cas Exclus <br> الحالات المستبعدة</p>
                  <h3 class="card-title">{{ $stats['features'][count($stats['features'])-1]['attributes']['Negative_tests']  }}</h3>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">
                    Répartition des cas par Région (Dernière mise à jour : {{ date('m/d/Y H:i:s', $stats['features'][count($stats['features'])-1]['attributes']['Date']/1000) }}) <br>
                    توزيع الحالات المؤكدة حسب الجهات (اخر تحديث : {{ date('m/d/Y H:i:s', $stats['features'][count($stats['features'])-1]['attributes']['Date']/1000) }})
                  </h4>
                </div>
                <div class="card-body">
                  <div class="">
                    <table class="table" data-order='[[ 2, "desc" ]]'>
                      <thead class=" text-primary">
                        <th>
                          Code Région /رمز الجهة
                        </th>
                        <th>
                          Nom Région / إسم الجهة
                        </th>
                        <th>
                          Cas confirmé​s / الحالات المؤكدة
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($regions['features'] as $region)
                          <tr>
                            <td>
                              {{$region['attributes']['CR']}}
                            </td>
                            <td>
                              {{$region['attributes']['Nom_Région_FR']}} <br>
                              {{$region['attributes']['Nom_Région_AR']}}
                            </td>
                            <td class="text-primary">
                              {{$region['attributes']['Cases'] == null ? '0' : $region['attributes']['Cases'] }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://github.com/el-profesor-nadir/coronamaroc">
                  Github project
                </a>
              </li>
              <li>
                <a href="https://covid19-geomatic.hub.arcgis.com/">
                  APIs
                </a>
              </li>
              <li>
                <a href="https://laravel.com/docs/7.x/http-client">
                  Laravel 7.3 - Http client
                </a>
              </li>
              <li>
                <a href="https://github.com/creativetimofficial/material-dashboard">
                  Material Dashboard Used
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            Nadir Hamza (hamzanadir.freelance@gmail.com).
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="{{ asset('theme/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('theme/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('theme/assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('theme/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('theme/assets/js/plugins/moment.min.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('theme/assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('theme/assets/js/plugins/arrive.min.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('theme/assets/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('theme/assets/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  <script>
    $(document).ready( function () {
      $('.table').DataTable({
        paging: false,
        "info": false
      });
    } );
  </script>
</body>

</html>