@php($features = $features ?? array())
<nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    <div class="collapse navbar-collapse" id="topnav-menu-content">
        <ul class="navbar-nav">
            @foreach($features as $feature)
                @if(count($feature['children']) == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ has_route($feature->url) }}">
                            <i class="{{ $feature->icon }}"></i> {{ $feature->name }}
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" role="button" data-toggle="dropdown">
                            <i class="{{ $feature->icon }}"></i>{{ $feature->name }} <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu">
                            @foreach($feature['children'] as $sub_feature)
                                <a href="{{ has_route($sub_feature->url) }}" class="dropdown-item">{{ $sub_feature->name }}</a>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
