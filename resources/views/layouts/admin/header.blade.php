<div class="app-header">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-nav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                    </li>
                    <li class="nav-item dropdown hidden-on-mobile">
                        <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">add</i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                            <li><a class="dropdown-item" href="#">New Workspace</a></li>
                            <li><a class="dropdown-item" href="#">New Board</a></li>
                            <li><a class="dropdown-item" href="#">Create Project</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-on-mobile">
                        <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons-outlined">explore</i>
                        </a>
                        <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                            <li>
                                <h6 class="dropdown-header">Repositories</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <h5 class="dropdown-item-title">
                                        Neptune iOS
                                        <span class="badge badge-warning">1.0.2</span>
                                        <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                    </h5>
                                    <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <h5 class="dropdown-item-title">
                                        Neptune Android
                                        <span class="badge badge-info">dev</span>
                                        <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                    </h5>
                                    <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                </a>
                            </li>
                            <li class="dropdown-btn-item d-grid">
                                <button class="btn btn-primary">Create new repository</button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link active" href="#">Applications</a>
                    </li>
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link" href="#">Reports</a>
                    </li>
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
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
                        <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">4</a>
                        <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                            <h6 class="dropdown-header">Notifications</h6>
                            <div class="notifications-dropdown-list">
                                <a href="#">
                                    <div class="notifications-dropdown-item">
                                        <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">campaign</i>
                                                        </span>
                                        </div>
                                        <div class="notifications-dropdown-item-text">
                                            <p class="bold-notifications-text">Donec tempus nisi sed erat vestibulum, eu suscipit ex laoreet</p>
                                            <small>19:00</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="notifications-dropdown-item">
                                        <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-danger text-white">
                                                            <i class="material-icons-outlined">bolt</i>
                                                        </span>
                                        </div>
                                        <div class="notifications-dropdown-item-text">
                                            <p class="bold-notifications-text">Quisque ligula dui, tincidunt nec pharetra eu, fringilla quis mauris</p>
                                            <small>18:00</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="notifications-dropdown-item">
                                        <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-success text-white">
                                                            <i class="material-icons-outlined">alternate_email</i>
                                                        </span>
                                        </div>
                                        <div class="notifications-dropdown-item-text">
                                            <p>Nulla id libero mattis justo euismod congue in et metus</p>
                                            <small>yesterday</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="notifications-dropdown-item">
                                        <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                        </div>
                                        <div class="notifications-dropdown-item-text">
                                            <p>Praesent sodales lobortis velit ac pellentesque</p>
                                            <small>yesterday</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="notifications-dropdown-item">
                                        <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                        </div>
                                        <div class="notifications-dropdown-item-text">
                                            <p>Praesent lacinia ante eget tristique mattis. Nam sollicitudin velit sit amet auctor porta</p>
                                            <small>yesterday</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
