  <nav class="nav-dr navbar navbar-inverse" id="top-menu" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       
      <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse"> <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collapse navigation -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a href="https://rg-racing-sp.com/" role="button">
                {{trans('messages.nav-home')}}
            </a>
          </li>
<li class="nav-item">
            <a href="https://specs.rg-racing-sp.com/chiptuning" role="button">
                {{trans('KOMPLETTE LEISTUNGSÜBERSICHT')}}
            </a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" data-animation="slide-bottom"
            aria-expanded="false" role="button">
              <span class="flag-icon flag-icon-{{ App::getLocale() }}"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                      <li role="presentation">
                        <a href="{{ route('lang.switch', $lang) }}" role="menuitem">
                          <span class="flag-icon flag-icon-{{$lang}}"></span> {{$language}}
                        </a>
                      </li>
                    @endif
                @endforeach
            </ul>
          </li>
      </ul>
    </div>
  </div>
  <!-- End container-fluid -->
</nav>
