<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll" style="margin-top: 30px;">
        <nav>
            @if (Auth::user()->role == "admin")
                @can("admin")
                    @include("layouts.sidebar-admin")
                @endcan
            @elseif (Auth::user()->role == "wadir")
                @can("wadir")
                    @include("layouts.sidebar-wadir")
                @endcan
            @elseif (Auth::user()->role == "ormawa")
                @can("ormawa")
                    @include("layouts.sidebar-ormawa")
                @endcan
            @endif
		</nav>
    </div>
</div>
