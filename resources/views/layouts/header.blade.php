<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>
<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#">
    <img src="https://infyom.com/images/logo/logo_236w.png" width="118" alt="Brand Logo">
</a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>
<ul class="c-header-nav mfs-auto">
</ul>
<ul class="c-header-nav">
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="true" aria-expanded="false">
           <p class="mt-3">
            <i class="fa fa-language fa-2x"></i>  
            
           </p>
           
           
           
        </a>
        <li class="c-header-nav-item">
            <p class="mt-3 mr-3">
                {{ auth()->user()->name }}
                
               </p>
       
        </li>
        <div class="dropdown-menu dropdown-menu-right pt-0">
            
            <ul >
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="dropdown-item">
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                             
                             {{ $properties['native'] }}
                          
                             
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
    
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar">
                <img class="c-avatar-img" src="https://www.nicepng.com/png/detail/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt="">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
            <a class="dropdown-item" href="#">
                <i class="c-icon mfe-2 cil-user"></i>@lang('menu.profile')
            </a>
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="c-icon mfe-2 cil-account-logout"></i>@lang('menu.logout')
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>

</ul>
<div class="c-subheader justify-content-between px-3">
    @yield('breadcrumb')
</div>
