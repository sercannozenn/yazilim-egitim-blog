@extends("layouts.front")
@section("css")
@endsection

@section("content")
    <section class="articles row">

        <div class="popular-title col-md-12">
            <h2 class="font-montserrat fw-semibold">Son Makaleler</h2>
        </div>

        @foreach($articles as $item)
            <div class="col-md-4 mt-4">
                <a href="{{ route("front.articleDetail", ['user' => $item->user->username, "article" => $item->slug]) }}">
                    <img src="{{ asset($item->image) }}" class="img-fluid">
                </a>
                <div class="most-popular-body mt-2">
                    <div class="most-popular-author d-flex justify-content-between">
                        <div>
                            Yazar: <a href="#">{{ $item->user->name }}</a>
                        </div>
                        <div class="text-end">Kategori: <a href="#">{{ $item->category->name }}</a></div>
                    </div>
                    <div class="most-popular-title">
                        <h4 class="text-black">
                            <a href="#">
                                {{ substr($item->title, 0, 20) }}
                            </a>
                        </h4>
                    </div>
                    <div class="most-popular-date">
                        <span>{{ \Carbon\Carbon::parse($item->publish_date)->format("d-m-Y") }}</span> &#x25CF; <span>10 dk</span>
                    </div>
                </div>
            </div>
        @endforeach





        <hr style="border:1px solid #a9abad;" class="mt-5">
        <div class="col-8 mx-auto mt-5">
            {{ $articles->links() }}
        </div>

    </section>
@endsection

@section("js")
@endsection
