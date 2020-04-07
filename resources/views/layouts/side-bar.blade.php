<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('theme/assets/img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
      <a href="{{ route('index')}}" class="simple-text logo-normal">
        Corona Maroc <br> كورونا بالمغرب
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ return_if(on_page('/'), 'active') }}">
          <a class="nav-link" href="{{ route('index')}}">
            <i class="material-icons">dashboard</i>
            Tableau de bord <br> الرئيسية
          </a>
        </li>
        <li class="nav-item {{ return_if(on_page('regions'), 'active') }}">
          <a class="nav-link" href="{{ route('regions')}}">
            <i class="material-icons">flag</i>
            Cas par région <br> الحالات حسب الجهات
          </a>
        </li>
        <li class="nav-item {{ return_if(on_page('days'), 'active') }}">
          <a class="nav-link" href="{{ route('days')}}">
            <i class="material-icons">timer</i>
            Cas par jour <br> الحالات في كل يوم
          </a>
        </li>
        <li class="nav-item {{ return_if(on_page('cities'), 'active') }}">
          <a class="nav-link" href="{{ route('cities')}}">
            <i class="material-icons">location_city</i>
            Cas par ville <br> الحالات في كل مدينة
          </a>
        </li>
      </ul>
    </div>
</div>