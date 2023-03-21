@extends("layouts.front")
@section("css")
@endsection

@section("container-top")
    @if(isset($settings) && $settings->feature_categories_is_active)
        <section class="feature-categories mt-4">
            <div class="row">
                <div class="col-md-3 p-2"
                     data-aos="fade-down-right"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-out">
                    <div
                        style="
                             background: url('https://via.placeholder.com/600x400') no-repeat center center;
                             background-size: cover;
                             height: 300px"
                        class="p-4 position-relative">
                        <h2 class="text-center text-secondary">Lorem ipsum.</h2>
                        <p class="" style="text-align: justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, necessitatibus?
                        </p>

                        <p class="position-absolute" style="bottom: 10px; left: 10px; right: 10px; ">
                            Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 p-2"
                     data-aos="fade-down-right"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-out">
                    <div
                        style="
                             background: url('https://via.placeholder.com/600x400') no-repeat center center;
                             background-size: cover;
                             height: 300px"
                        class="p-4 position-relative">
                        <h2 class="text-center text-secondary">Lorem ipsum.</h2>
                        <p class="" style="text-align: justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, necessitatibus?
                        </p>

                        <p class="position-absolute" style="bottom: 10px; left: 10px; right: 10px; ">
                            Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 p-2"
                     data-aos="fade-down-left"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-out">
                    <div
                        style="
                             background: url('https://via.placeholder.com/600x400') no-repeat center center;
                             background-size: cover;
                             height: 300px"
                        class="p-4 position-relative">
                        <h2 class="text-center text-secondary">Lorem ipsum.</h2>
                        <p class="" style="text-align: justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, necessitatibus?
                        </p>

                        <p class="position-absolute" style="bottom: 10px; left: 10px; right: 10px; ">
                            Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 p-2"
                     data-aos="fade-down-left"
                     data-aos-duration="1000"
                     data-aos-easing="ease-in-out">
                    <div
                        style="
                             background: url('https://via.placeholder.com/600x400') no-repeat center center;
                             background-size: cover;
                             height: 300px"
                        class="p-4 position-relative">
                        <h2 class="text-center text-secondary">Lorem ipsum.</h2>
                        <p class="" style="text-align: justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, necessitatibus?
                        </p>

                        <p class="position-absolute" style="bottom: 10px; left: 10px; right: 10px; ">
                            Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
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
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <a href="#">
                            <img src="https://via.placeholder.com/600x400" class="img-fluid">
                        </a>

                        <div class="most-popular-body mt-2">
                            <div class="most-popular-author d-flex justify-content-between">
                                <div>
                                    Yazar: <a href="#">Sercan Özen</a>
                                </div>
                                <div class="text-end">Kategori: <a href="#">Css</a></div>
                            </div>
                            <div class="most-popular-title">
                                <h4 class="text-black">
                                    <a href="#">
                                        Lorem ipsum dolor sit amet, consectetur...
                                    </a>
                                </h4>
                            </div>
                            <div class="most-popular-date">
                                <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                            </div>
                        </div>
                    </div>



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

        <div class="col-md-4 mt-4">
            <a href="#">
                <img src="https://via.placeholder.com/600x400" class="img-fluid">
            </a>
            <div class="most-popular-body mt-2">
                <div class="most-popular-author d-flex justify-content-between">
                    <div>
                        Yazar: <a href="#">Sercan Özen</a>
                    </div>
                    <div class="text-end">Kategori: <a href="#">Css</a></div>                            </div>
                <div class="most-popular-title">
                    <h4 class="text-black">
                        <a href="#">
                            Lorem ipsum dolor sit amet, consectetur...
                        </a>
                    </h4>
                </div>
                <div class="most-popular-date">
                    <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <a href="#">
                <img src="https://via.placeholder.com/600x400" class="img-fluid">
            </a>
            <div class="most-popular-body mt-2">
                <div class="most-popular-author d-flex justify-content-between">
                    <div>
                        Yazar: <a href="#">Sercan Özen</a>
                    </div>
                    <div class="text-end">Kategori: <a href="#">Css</a></div>                            </div>
                <div class="most-popular-title">
                    <h4 class="text-black">
                        <a href="#">
                            Lorem ipsum dolor sit amet, consectetur...
                        </a>
                    </h4>
                </div>
                <div class="most-popular-date">
                    <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <a href="#">
                <img src="https://via.placeholder.com/600x400" class="img-fluid">
            </a>
            <div class="most-popular-body mt-2">
                <div class="most-popular-author d-flex justify-content-between">
                    <div>
                        Yazar: <a href="#">Sercan Özen</a>
                    </div>
                    <div class="text-end">Kategori: <a href="#">Css</a></div>                            </div>
                <div class="most-popular-title">
                    <h4 class="text-black">
                        <a href="#">
                            Lorem ipsum dolor sit amet, consectetur...
                        </a>
                    </h4>
                </div>
                <div class="most-popular-date">
                    <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <a href="#">
                <img src="https://via.placeholder.com/600x400" class="img-fluid">
            </a>
            <div class="most-popular-body mt-2">
                <div class="most-popular-author d-flex justify-content-between">
                    <div>
                        Yazar: <a href="#">Sercan Özen</a>
                    </div>
                    <div class="text-end">Kategori: <a href="#">Css</a></div>                            </div>
                <div class="most-popular-title">
                    <h4 class="text-black">
                        <a href="#">
                            Lorem ipsum dolor sit amet, consectetur...
                        </a>
                    </h4>
                </div>
                <div class="most-popular-date">
                    <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <a href="#">
                <img src="https://via.placeholder.com/600x400" class="img-fluid">
            </a>
            <div class="most-popular-body mt-2">
                <div class="most-popular-author d-flex justify-content-between">
                    <div>
                        Yazar: <a href="#">Sercan Özen</a>
                    </div>
                    <div class="text-end">Kategori: <a href="#">Css</a></div>                            </div>
                <div class="most-popular-title">
                    <h4 class="text-black">
                        <a href="#">
                            Lorem ipsum dolor sit amet, consectetur...
                        </a>
                    </h4>
                </div>
                <div class="most-popular-date">
                    <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <a href="#">
                <img src="https://via.placeholder.com/600x400" class="img-fluid">
            </a>
            <div class="most-popular-body mt-2">
                <div class="most-popular-author d-flex justify-content-between">
                    <div>
                        Yazar: <a href="#">Sercan Özen</a>
                    </div>
                    <div class="text-end">Kategori: <a href="#">Css</a></div>                            </div>
                <div class="most-popular-title">
                    <h4 class="text-black">
                        <a href="#">
                            Lorem ipsum dolor sit amet, consectetur...
                        </a>
                    </h4>
                </div>
                <div class="most-popular-date">
                    <span>18 Mart 2023</span> &#x25CF; <span>10 dk</span>
                </div>
            </div>
        </div>

    </section>
@endsection

@section("js")
@endsection
