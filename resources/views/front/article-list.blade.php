@extends("layouts.front")
@section("css")
@endsection

@section("content")
    <section class="articles row">

        <div class="popular-title col-md-12">
            <h2 class="font-montserrat fw-semibold">
                {{ $title ?? "Son Makaleler" }}
            </h2>
        </div>


        @foreach($articles as $item)
            @php
                $image = $item->image;
                $publishDate = \Carbon\Carbon::parse($item->publish_date)->format("d-m-Y");
                if (!file_exists(public_path($image)) || is_null($image))
                 {
                      $image = $settings->article_default_image;
                 }
            @endphp
            <div class="col-md-4 mt-4">
                <a href="{{ route("front.articleDetail", ['user' => $item->user->username, "article" => $item->slug]) }}">
                    <img src="{{ asset($image) }}" class="img-fluid">
                </a>
                <div class="most-popular-body mt-2">
                    <div class="most-popular-author d-flex justify-content-between">
                        <div>
                            Yazar: <a href="{{ route('front.authorArticles', ['user' => $item->user->username]) }}">{{ $item->user->name }}</a>
                        </div>
                        <div class="text-end">Kategori:
                            <a href="{{ route('front.categoryArticles', ['category' => $item->category->slug]) }}">
                                {{ $item->category->name }}
                            </a>
                        </div>
                    </div>
                    <div class="most-popular-title">
                        <h4 class="text-black">
                            <a href="#">
                                {{ substr($item->title, 0, 20) }}
                            </a>
                        </h4>
                    </div>
                    <div class="most-popular-date">
                        <span>{{ $publishDate }}</span> &#x25CF; <span>10 dk</span>
                    </div>
                </div>
            </div>
        @endforeach





        <hr style="border:1px solid #a9abad;" class="mt-5">

        @if($articles->count() <1)
            <div class="alert alert-info">
                İçerik bulunamamıştır.
            </div>
        @endif
        <div class="col-12 d-flex justify-content-center mx-auto mt-5">
            {{ $articles->links() }}
        </div>

    </section>
@endsection
@push("meta")
{{--    @php--}}
{{--    $url=request()->url();--}}
{{--    $url=request()->segments();--}}
{{--    $url=request()->segment(1);--}}
{{--    @endphp--}}
{{--    @if(str_contains($url,"kategoriler"))--}}
    @if(Route::is("front.categoryArticles"))
        <meta name="keywords" content="{{ $category->seo_keywords }}">
        <meta name="description" content="{{ $category->seo_description }}">
        <meta name="author" content="{{ $category->user->name }}">
    @else
        <meta name="keywords" content="{{ $settings->seo_keywords_articles }}">
        <meta name="description" content="{{ $settings->seo_description_articles }}">
        <meta name="author" content="Sercan Özen">
    @endif
@endpush
@section("js")
@endsection
