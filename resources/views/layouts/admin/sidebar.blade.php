<div class="app-sidebar">
    <div class="logo">
        <a href="{{ route('admin.index') }}">
            <img src="{{ asset($settings->logo) }}" class="img-fluid">
        </a>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Yazılım Eğitim
            </li>
            <li>
                <a href="{{ route('admin.index') }}" class="{{ Route::is("admin.index") ? "active" : "" }}">
                    <i class="material-icons-two-tone">dashboard</i>
                    Dashboard
                </a>
            </li>
            <li class="{{ Route::is("article.index") ||
                          Route::is("article.create") ||
                          Route::is("article.comment.list") ||
                          Route::is("article.pending-approval") ? "open" : "" }}">
                <a href="#" class="">
                    <i class="material-icons">tune</i>
                    Makale Yönetimi
                    <i class="material-icons has-sub-menu">keyboard_arrow_right</i>
                </a>
                <ul class="sub-menu" style="">
                    <li>
                        <a href="{{ route("article.create") }}" class="{{ Route::is("article.create") ? "active" : "" }}">Makale Ekle</a>
                    </li>
                    <li>
                        <a href="{{ route("article.index") }}" class="{{ Route::is("article.index") ? "active" : "" }}">Makale Listesi</a>
                    </li>
                    <li>
                        <a href="{{ route("article.comment.list") }}" class="{{ Route::is("article.comment.list") ? "active" : "" }}">Yorum Listesi</a>
                    </li>
                    <li>
                        <a href="{{ route("article.pending-approval") }}" class="{{ Route::is("article.pending-approval") ? "active" : "" }}">Onay Bekleyen Yorumlar</a>
                    </li>

                </ul>
            </li>

            <li class="{{ Route::is("category.index") || Route::is("category.create") ? "open" : "" }}">
                <a href="#" class="">
                    <i class="material-icons">tune</i>
                    Kategori Yönetimi
                    <i class="material-icons has-sub-menu">keyboard_arrow_right</i>
                </a>
                <ul class="sub-menu" style="">
                    <li>
                        <a href="{{ route("category.create") }}" class="{{ Route::is("category.create") ? "active" : "" }}">Kategori Ekle</a>
                    </li>
                    <li>
                        <a href="{{ route("category.index") }}" class="{{ Route::is("category.index") ? "active" : "" }}">Kategori Listesi</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Route::is("user.index") || Route::is("user.create") ? "open" : "" }}">
                <a href="#" class="">
                    <i class="material-icons">person</i>
                    Kullanıcı Yönetimi
                    <i class="material-icons has-sub-menu">keyboard_arrow_right</i>
                </a>
                <ul class="sub-menu" style="">
                    <li>
                        <a href="{{ route("user.create") }}" class="{{ Route::is("user.create") ? "active" : "" }}">Kullanıcı Oluştur</a>
                    </li>
                    <li>
                        <a href="{{ route("user.index") }}" class="{{ Route::is("user.index") ? "active" : "" }}">Kullanıcı Listesi</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Route::is("admin.email-themes.create")
                          || Route::is("admin.email-themes.index")
                          || Route::is("admin.email-themes.assign")
                          || Route::is("admin.email-themes.edit")
                           ? "open" : "" }}">
                <a href="#" class="">
                    <i class="material-icons">tune</i>
                    Email Yönetimi
                    <i class="material-icons has-sub-menu">keyboard_arrow_right</i>
                </a>
                <ul class="sub-menu" style="">
                    <li>
                        <a href="{{ route("admin.email-themes.create") }}" class="{{ Route::is("admin.email-themes.create") ? "active" : "" }}">Yeni Tema Ekleme</a>
                    </li>
                    <li>
                        <a href="{{ route("admin.email-themes.index") }}" class="{{ Route::is("admin.email-themes.index") ? "active" : "" }}">Temalar</a>
                    </li>
                    <li>
                        <a href="{{ route("admin.email-themes.assign") }}" class="{{ Route::is("admin.email-themes.assign") ? "active" : "" }}">Tema Atama/Seçimi</a>
                        <a href="{{ route("admin.email-themes.assign-list") }}" class="{{ Route::is("admin.email-themes.assign") ? "active" : "" }}">Tema Atama Listesi</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Route::is("settings") ? "open" : "" }}">
                <a href="{{ route("settings") }}" >
                    <i class="material-icons-two-tone">settings</i>
                    Ayarlar
                </a>
            </li>

            <li class="{{ Route::is("dbLogs") ? "open" : "" }}">
                <a href="{{ route("dbLogs") }}" >
                    <i class="material-icons-two-tone">settings</i>
                    Log Yönetimi
                </a>
            </li>
        </ul>
    </div>
</div>
