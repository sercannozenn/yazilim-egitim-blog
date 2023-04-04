<div class="app-header">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-nav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                    </li>

                </ul>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav">
                    @if(1>2)
                        <li class="nav-item">
                            <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link language-dropdown-toggle text-warning"
                           href="#"
                           id="languageDropDown"
                           data-bs-toggle="dropdown">
                            <u>{{ auth()->user()->name }}</u>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
                                <form action="{{ route("logout") }}" method="POST" id="logout-form">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">
                            <img src="{{ imageExist(auth()->user()->image, $settings->default_comment_profile_image) }}" style="height: 20px">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
