@extends("layouts.front")
@section("css")
@endsection

@section("container-top")
    @if(isset($settings) && $settings->feature_categories_is_active)
        <section class="feature-categories mt-4">
            <div class="row">
                @foreach($mostPopularCategories as $category)
                        <div class="col-6 col-md-3 p-3 most-popular-category-wrapper"
                         data-aos="fade-down-right"
                         data-aos-duration="1000"
                         data-aos-easing="ease-in-out"
                         onclick="window.location.href='{{ route("front.categoryArticles", ['category' => $category->slug]) }}'"
                        >
                        <div class="d-flex justify-content-center align-items-center shadow-sm most-popular-category"
                             style="
                             height: 300px;
                             background-color:{{ $category->color }};
                             border-radius: 10px;"
                        >
                           <div class="w-75">
                               <div class="d-flex justify-content-center">
                                   <img src="{{imageExist($category->image, $settings->category_default_image) }}"
                                        class="img-fluid" style="width: 90px"
                                   >
                               </div>
                               <div class="text-center text-secondary mt-3 border-1 border-secondary border-top mt-4 pt-4">
                                   <h2>{{ $category->name }}</h2>
                               </div>
                           </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endsection

@section("content")
    <section class="most-popular row"
             data-aos="zoom-in-up"
             data-aos-duration="2000"
             data-aos-easing="ease-in-out">
        <div class="popular-title col-md-8">
            <h2 class="font-montserrat fw-semibold">En Çok Okunan Makaleler</h2>
        </div>
        <div class="col-4">
            <div class="most-popular-swiper-navigation text-end">
                <span class="btn btn-secondary material-icons most-popular-swiper-button-prev">arrow_back</span>
                <span class="btn btn-secondary material-icons most-popular-swiper-button-next">arrow_forward</span>
            </div>
        </div>
        <div class="col-12">
            <div class="swiper-most-popular mt-3">
                <div class="swiper-wrapper">
                    @foreach($mostPopularArticles as $article)
                        <div class="swiper-slide">

                            <a href="{{ route('front.articleDetail', [
                                'user' => $article->user->username,
                                'article' => $article->slug
                                ]) }}">
                                <img src="{{ imageExist($article->image, $settings->article_default_image) }}" class="img-fluid">
                            </a>

                            <div class="most-popular-body mt-2">
                                <div class="most-popular-author d-flex justify-content-between">
                                    <div>
                                        Yazar: <a href="{{ route('front.authorArticles',
                            ['user' => $article->user->username]) }}">
                                            {{ $article->user->name }}
                                        </a>
                                    </div>
                                    <div class="text-end">Kategori:
                                        <a href="{{ route('front.categoryArticles', ['category' => $article->category->slug]) }}">
                                            {{ $article->category->name }}
                                        </a>
                                    </div>
                                </div>
                                <div class="most-popular-title">
                                    <h4 class="text-black">
                                        <a href="{{ route('front.articleDetail', [
                                                        'user' => $article->user->username,
                                                         'article' => $article->slug
                                                        ]) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="most-popular-date">
                                    <span>{{ $article->format_publish_date }}</span> &#x25CF; <span>10 dk</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </section>

    <section class="telegram d-flex align-items-center mt-5 p-4 rounded-2 text-white">
        <div class="me-4">
            <span class="material-icons text-black">send</span>
        </div>
        <div class="telegram-body">
            <h4 class="">Telegram grubumuza katılmayı unutma!</h4>
            <p class="">Laravel başta olmak üzere bir çok teknoloji ile ilgili 100+ kişi ile iletişime geçebilirsin.</p>
            <a href="{{ isset($settings) ? $settings->telegram_link : "javascript:void(0)" }}"
               target="_blank"
               class="btn btn-warning p-3 text-black">Telegrama Katıl</a>
        </div>

    </section>

    <section class="articles row mt-5"
             data-aos="flip-left"
             data-aos-duration="2000"
             data-aos-easing="ease-out-cubic">

        <div class="popular-title col-md-12">
            <h2 class="font-montserrat fw-semibold">Son Makaleler</h2>
        </div>

        @foreach($lastPublishedArticles as $article)
            <div class="col-md-4 mt-4">
                <a href="{{ route('front.articleDetail', ['user' => $article->user->username, 'article' => $article->slug]) }}">
                    <img src="{{ imageExist($article->image, $settings->article_default_image) }}" class="img-fluid">
                </a>
                <div class="most-popular-body mt-2">
                    <div class="most-popular-author d-flex justify-content-between">
                        <div>
                            Yazar: <a href="{{ route('front.authorArticles',
                            ['user' => $article->user->username]) }}">
                                {{ $article->user->name }}
                            </a>
                        </div>
                        <div class="text-end">Kategori:
                            <a href="{{ route('front.categoryArticles', ['category' => $article->category->slug]) }}">
                                {{ $article->category->name }}
                            </a>
                        </div>                            </div>
                    <div class="most-popular-title">
                        <h4 class="text-black">
                            <a href="{{ route('front.articleDetail', [
                                                        'user' => $article->user->username,
                                                         'article' => $article->slug
                                                        ]) }}">
                                {{ $article->title }}
                            </a>
                        </h4>
                    </div>
                    <div class="most-popular-date">
                        <span>{{ $article->format_publish_date }}</span> &#x25CF; <span>10 dk</span>
                    </div>
                </div>
            </div>
        @endforeach


    </section>
@endsection
@push("meta")
    <meta name="keywords" content="{{ $settings->seo_keywords_home }}">
    <meta name="description" content="{{ $settings->seo_description_home }}">
    <meta name="author" content="Sercan Özen">
@endpush
@section("js")
@endsection
