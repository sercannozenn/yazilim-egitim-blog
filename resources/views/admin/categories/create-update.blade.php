@extends("layouts.admin")
@section("title")
    Kategori {{ isset($category) ? "Güncelleme" : "Ekleme" }}
@endsection
@section("css")
@endsection

@section("content")
    <x-bootstrap.card>
        <x-slot:header>
            <h2 class="card-title">Kategori {{ isset($category) ? "Güncelleme" : "Ekleme" }}</h2>
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
                    <form action="{{ isset($category) ? route('categories.edit', ['id' => $category->id]) : route('category.create') }}" method="POST">
                        @csrf
                        <input type="text"
                               class="form-control form-control-solid-bordered m-b-sm
                               @if($errors->has("name"))
                                    border-danger
                               @endif
                               "
                               aria-describedby="solidBoderedInputExample"
                               placeholder="Kategori Adı"
                               name="name"
                               value="{{ isset($category) ? $category->name : "" }}"
                               required
                        >
                        @if($errors->has("name"))
                            {{ $errors->first("name") }}
                        @endif
                        <input type="text"
                               class="form-control form-control-solid-bordered m-b-sm"
                               aria-describedby="solidBoderedInputExample"
                               placeholder="Kategori Slug"
                               name="slug"
                               value="{{ isset($category) ? $category->slug : "" }}"
                        >
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="description"
                            id=""
                            cols="30"
                            rows="5"
                            placeholder="Kategori Açıklama"
                            style="resize: none">{{ isset($category) ? $category->description : "" }}</textarea>
                        <input type="number"
                               class="form-control form-control-solid-bordered m-b-sm"
                               aria-describedby="solidBoderedInputExample"
                               placeholder="Sıralama"
                               name="order"
                               value="{{ isset($category) ? $category->order : "" }}"
                        >
                        <select
                            class="form-select form-control form-control-solid-bordered m-b-sm"
                            aria-label="Üst Kategori Seçimi"
                            name="parent_id"
                        >
                            <option value="{{ null }}">Üst Kategori Seçimi</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}" {{ isset($category) && $category->id == $item->id ? "selected" : "" }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_keywords"
                            id="seo_keywords"
                            cols="30"
                            rows="5"
                            placeholder="Seo Keywords"
                            style="resize: none">{{ isset($category) ? $category->seo_keywords : "" }}</textarea>
                        <textarea
                            class="form-control form-control-solid-bordered m-b-sm"
                            name="seo_description"
                            id="seo_description"
                            cols="30"
                            rows="5"
                            placeholder="Seo Description"
                            style="resize: none">{{ isset($category) ? $category->seo_description : "" }}</textarea>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ isset($category) && $category->status  ? "checked" : "" }}>
                            <label class="form-check-label" for="status">
                                Kategori Sitede Görünsün mü?
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="feature_status" value="1" id="feature_status" {{ isset($category) && $category->feature_status  ? "checked" : "" }}>
                            <label class="form-check-label" for="feature_status">
                                Kategori Anasayfada Öne Çıkarılsın mı?
                            </label>
                        </div>
                        <hr>
                        <div class="col-6 mx-auto mt-2">
                            <button type="submit" class="btn btn-success btn-rounded w-100">
                                {{ isset($category) ? "Güncelle" : "Kaydet" }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section("js")
@endsection
