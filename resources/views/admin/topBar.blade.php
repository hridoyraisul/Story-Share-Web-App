<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/admin')}}" style="color: #1b788a;">Story-Share (Admin)</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="@if(collect(request()->segments())->last() == '' )nav-link active @else nav-link @endif" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                @if($client != null)
                    <li class="nav-item">
                        <a class="@if(collect(request()->segments())->last() == 'my-story')nav-link active @else nav-link @endif" href="{{url('/my-story')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View all of your stories">My Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="@if(collect(request()->segments())->last() == 'profile')nav-link active @else nav-link @endif" href="{{url('/profile')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View your profile">View Profile</a>
                    </li>
                @endif

            </ul>
            @if(collect(request()->segments())->last() == '')
                <form class="d-flex">
                    <input class="form-control searchBox me-2" type="search" placeholder="Search Story" aria-label="Search">
                </form>
            @endif
            <ul class="navbar-nav">
                @if($client)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$client->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('/settings-page')}}">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{url('/login')}}" role="button">
                            Login Now
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
