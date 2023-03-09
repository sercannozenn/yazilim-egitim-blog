@extends("layouts.admin")
@section("title")
    Makale {{ isset($article) ? "Güncelleme" : "Ekleme" }}
@endsection
@section("css")
    <link rel="stylesheet" href="{{ asset("assets/plugins/flatpickr/flatpickr.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/summernote/summernote-lite.min.css") }}">

@endsection

@section("content")
    <x-bootstrap.card>
        <x-slot:header>
            <h2 class="card-title">Makale {{ isset($article) ? "Güncelleme" : "Ekleme" }}</h2>
        </x-slot:header>

        <x-slot:body>
            <p class="card-description">We offer some different custom styles for input fields to make your forms more beautiful.</p>
            <div class="example-container">
                <div class="example-content">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{ isset($article) ? route('article.edit', ['id' => $article->id]) : route('article.create') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <label for="title" class="form-label">Makale Başlığı</label>
                        <input type="text"
                               class="form-control form-control-solid-bordered m-b-sm
                               @if($errors->has("title"))
                                    border-danger
                               @endif
                               "
                               placeholder="Makale Başlığı"
                               name="title"
                               id="title"
                               value="{{ isset($article) ? $article->title : "" }}"
                               required
                        >
                        @if($errors->has("title"))
                            {{ $errors->first("title") }}
                        @endif
                        <label for="slug" class="form-label">Makale Slug</label>
                        <input type="text"
                               class="form-control form-control-solid-bordered m-b-sm"
                               placeholder="Makale Slug"
                               name="slug"
                               id="slug"
                               value="{{ isset($article) ? $article->slug : "" }}"
                        >

                        <label for="tags" class="form-label">Etiketler</label>
                        <input type="text"
                               class="form-control form-control-solid-bordered"
                               placeholder="Etiketler"
                               name="tags"
                               value="{{ isset($article) ? $article->tags : "" }}"
                               id="tags"
                        >
                        <div class="form-text m-b-sm">Herbir etiketi virgüllerle ayırarak yazın.</div>

                        <label for="category_id" class="form-label">Kategori</label>
                        <select
                            class="form-select form-control form-control-solid-bordered m-b-sm"
                            name="category_id"
                            id="category_id"
                        >
                            <option value="{{ null }}">Kategori Seçimi</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}" {{ isset($article) && $article->category_id == $item->id ? "selected" : "" }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="summernote" class="form-label">İçerik</label>
                        <textarea name="body" id="summernote" class="m-b-sm">Hello Summernote</textarea>

                        <label for="seo_keywords" class="form-label m-t-sm">Seo Anahtar Kelimeler</label>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_keywords"
                            id="seo_keywords"
                            cols="30"
                            rows="5"
                            placeholder="Seo Keywords"
                            style="resize: none">{{ isset($article) ? $article->seo_keywords : "" }}</textarea>
                        <label for="seo_description" class="form-label m-t-sm">Seo Açıklama</label>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_description"
                            id="seo_description"
                            cols="30"
                            rows="5"
                            placeholder="Seo Description"
                            style="resize: none">{{ isset($article) ? $article->seo_description : "" }}</textarea>

                        <label for="publish_date" class="form-label m-t-sm">Yayınlanma Tarihi</label>
                        <input class="form-control flatpickr2 m-b-sm"
                               id="publish_date"
                               name="publish_date"
                               type="text"
                               placeholder="Ne zaman yayınlansın?">

                        <label for="image" class="form-label m-t-sm">Makale Görseli</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                        <div class="form-text m-b-sm">Makale Görseli Maksimum 2mb olmalıdır</div>

                       @if(isset($article) && $article->image)
                            <img src="{{ asset($article->image) }}" alt="" class="img-fluid" style="max-height: 200px">
                       @endif


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ isset($article) && $article->status  ? "checked" : "" }}>
                            <label class="form-check-label" for="status">
                                Makale Sitede Aktif Olarak Görünsün mü?
                            </label>
                        </div>

                        <hr>
                        <div class="col-6 mx-auto mt-2">
                            <button type="submit" class="btn btn-success btn-rounded w-100">
                                {{ isset($article) ? "Güncelle" : "Kaydet" }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section("js")
    <script src="{{ asset("assets/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset("assets/js/pages/datepickers.js") }}"></script>
    <script src="{{ asset("assets/plugins/summernote/summernote-lite.min.js") }}"></script>
    <script src="{{ asset("assets/js/pages/text-editor.js") }}"></script>
    <script>
        $("#publish_date").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
@endsection
