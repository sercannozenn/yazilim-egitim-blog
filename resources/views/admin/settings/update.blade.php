@extends("layouts.admin")
@section("title")
    Ayarlar
@endsection
@section("css")
    <link rel="stylesheet" href="{{ asset("assets/plugins/summernote/summernote-lite.min.css") }}">
@endsection

@section("content")
    <x-bootstrap.card>
        <x-slot:header>
            <h2 class="card-title">Ayarlar</h2>
        </x-slot:header>

        <x-slot:body>
            <div class="example-container">
                <div class="example-content">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form action="{{ route('settings') }}" method="POST"
                    enctype="multipart/form-data"
                    id="settingsForm">
                        @csrf
                        <label for="header_text" class="form-label">Telegram Linki</label>
                        <input type="text"
                               class="form-control form-control-solid-bordered m-b-sm
                               @if($errors->has("telegram_link"))
                                    border-danger
                               @endif
                               "
                               placeholder="Telegram Link"
                               name="telegram_link"
                               id="telegram_link"
                               value="{{ isset($settings) ? $settings->telegram_link : "" }}"
                        >
                        <label for="header_text" class="form-label">Header Açıklama</label>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm
                            @if($errors->has("header_text"))
                                    border-danger
                            @endif
                            "
                            name="header_text"
                            id="header_text"
                            cols="30"
                            rows="5"
                            placeholder="Header Açıklama">{!! isset($settings) ? $settings->header_text : "" !!}</textarea>

                        @if($errors->has("header_text"))
                            {{ $errors->first("header_text") }}
                        @endif
                        <label for="seo_keywords_home" class="form-label m-t-sm">Seo Anahtar Kelimeler Anasayfa</label>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_keywords_home"
                            id="seo_keywords_home"
                            cols="30"
                            rows="5"
                            placeholder="Seo Keywords Anasayfa"
                            style="resize: none">{{ isset($settings) ? $settings->seo_keywords_home : "" }}</textarea>

                        <label for="seo_description_home" class="form-label m-t-sm">Seo Description Anasayfa</label>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_description_home"
                            id="seo_description_home"
                            cols="30"
                            rows="5"
                            placeholder="Seo Description Anasayfa"
                            style="resize: none">{{ isset($settings) ? $settings->seo_description_home : "" }}</textarea>

                        <label for="seo_keywords_articles" class="form-label m-t-sm">Seo Anahtar Kelimeler Makale</label>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_keywords_articles"
                            id="seo_keywords_articles"
                            cols="30"
                            rows="5"
                            placeholder="Seo Keywords Makale"
                            style="resize: none">{{ isset($settings) ? $settings->seo_keywords_articles : "" }}</textarea>

                        <label for="seo_description_articles" class="form-label m-t-sm">Seo Description Makale</label>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_description_articles"
                            id="seo_description_articles"
                            cols="30"
                            rows="5"
                            placeholder="Seo Description Makale"
                            style="resize: none">{{ isset($settings) ? $settings->seo_description_articles : "" }}</textarea>

                        <label for="footer_text" class="form-label mt-3">Footer Açıklama</label>

                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm
                            @if($errors->has("footer_text"))
                                    border-danger
                            @endif
                            "
                            name="footer_text"
                            id="footer_text"
                            cols="30"
                            rows="5"
                            placeholder="Footer Açıklama">{!! isset($settings) ? $settings->footer_text : "" !!}</textarea>

                        @if($errors->has("footer_text"))
                            {{ $errors->first("footer_text") }}
                        @endif

                        <label for="image" class="form-label m-t-sm">Logo Görseli</label>
                        <input type="file" name="logo" id="logo" class="form-control" accept="image/png, image/jpeg, image/jpg">
                        <div class="form-text m-b-sm">Logo Görseli Maksimum 2mb olmalıdır</div>

                        @if(isset($settings) && $settings->logo)
                            <img src="{{ asset($settings->logo) }}" alt="" class="img-fluid" style="max-height: 200px">
                        @endif
                        <hr>


                        <label for="image" class="form-label m-t-sm">Kategori Varsayılan Görseli</label>
                        <input type="file" name="category_default_image" id="category_default_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                        <div class="form-text m-b-sm">Kategori Varsayılan Görseli Maksimum 2mb olmalıdır</div>

                        @if(isset($settings) && $settings->category_default_image)
                            <img src="{{ asset($settings->category_default_image) }}" alt="" class="img-fluid" style="max-height: 200px">
                        @endif

                        <hr>

                        <label for="image" class="form-label m-t-sm">Makale Varsayılan Görseli</label>
                        <input type="file" name="article_default_image" id="article_default_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                        <div class="form-text m-b-sm">Makale Varsayılan Görseli Maksimum 2mb olmalıdır</div>

                        @if(isset($settings) && $settings->article_default_image)
                            <img src="{{ asset($settings->article_default_image) }}" alt="" class="img-fluid" style="max-height: 200px">
                        @endif

                        <hr>

                        <label for="image" class="form-label m-t-sm">Parola Sıfırlama Maili Görseli</label>
                        <input type="file" name="reset_password_image" id="reset_password_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                        <div class="form-text m-b-sm">Parola Sıfırlama Maili Görseli Maksimum 2mb olmalıdır</div>

                        @if(isset($settings) && $settings->reset_password_image)
                            <img src="{{ asset($settings->reset_password_image) }}" alt="" class="img-fluid" style="max-height: 200px">
                        @endif

                        <hr>

                        <div class="form-check mt-5">
                            <input class="form-check-input" type="checkbox"
                                   name="feature_categories_is_active"
                                   value="1" id="feature_categories_is_active"
                                {{ isset($settings) && $settings->feature_categories_is_active  ? "checked" : "" }}>
                            <label class="form-check-label" for="feature_categories_is_active">
                                Öne Çıkarılan Kategoriler Anasayfada Görünsün mü?
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                   name="video_is_active"
                                   value="1" id="video_is_active"
                                {{ isset($settings) && $settings->video_is_active  ? "checked" : "" }}>
                            <label class="form-check-label" for="video_is_active">
                                Videolar Sidebarda Görünsün mü?
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                   name="author_is_active"
                                   value="1" id="author_is_active"
                                {{ isset($settings) && $settings->author_is_active  ? "checked" : "" }}>
                            <label class="form-check-label" for="author_is_active">
                                Yazarlar Sidebarda Görünsün mü?
                            </label>
                        </div>


                        <hr>
                        <div class="col-6 mx-auto mt-2">
                            <button type="button" class="btn btn-success btn-rounded w-100" id="btnSave">
                                Kaydet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section("js")
    <script src="{{ asset("assets/plugins/summernote/summernote-lite.min.js") }}"></script>
    <script src="{{ asset("assets/admin/js/pages/text-editor.js") }}"></script>
    <script src="{{ asset("assets/admin/js/custom.js") }}"></script>
    <script>
        $(document).ready(function ()
        {

            $('#btnSave').click(function () {
                let logoCheckStatus = imageCheck($('#logo'));
                let category_default_imageStatus = imageCheck($('#category_default_image'));
                let article_default_imageStatus = imageCheck($('#article_default_image'));
                let reset_password_imageStatus = imageCheck($('#reset_password_image'));

                if(!logoCheckStatus || !category_default_imageStatus || !article_default_imageStatus || !reset_password_imageStatus)
                {
                    return false;
                }
                else
                {
                    $("#settingsForm").submit();
                }
            });
        });
    </script>
@endsection
