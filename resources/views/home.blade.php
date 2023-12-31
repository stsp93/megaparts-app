@extends('layout')

@section('content')
    <x-search-bar />

    <section class="banners">
        <div id="banners-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#banners-carousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#banners-carousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#banners-carousel" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/banners/banner1.png') }}" class="img-fluid" alt="banner" />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banners/banner2.jpg') }}" class="img-fluid" alt="banner" />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banners/banner3.jpg') }}" class="img-fluid" alt="banner" />
                </div>
            </div>
        </div>
    </section>
    <section class="highlights">
        <div class="container">
            <div class="highlight">
                <img src="{{ asset('img/delivery truck.svg') }}" alt="" />
                <div class="body">
                    <h4>Експресна доставка</h4>
                    <p>Доставяме до всяка точка на България.</p>
                </div>
            </div>
            <div class="highlight">
                <img src="{{ asset('img/new parts.svg') }}" alt="" />
                <div class="body">
                    <h4>Нови части всеки ден</h4>
                    <p>Ежедневно зареждаме нова стока.</p>
                </div>
            </div>
            <div class="highlight">
                <img src="{{ asset('img/qa.svg') }}" alt="" />
                <div class="body">
                    <h4>Проверено качество</h4>
                    <p>Авточасти с гаранция.</p>
                </div>
            </div>
            <div class="highlight">
                <img src="{{ asset('img/return.svg') }}" alt="" />
                <div class="body">
                    <h4>Право на връщане</h4>
                    <p>14 дни право на връщане на всяка поръчка</p>
                </div>
            </div>
        </div>
    </section>
    <section class="sliders container">
        <!-- 1st slider -->
        <div class="slider">
            <div class="slider-header service-big text-white rounded-5">
                <div>
                    <img src="{{ asset('img/sec header/gear-sm.svg') }}" alt="gear" />
                    <h3>Авточасти</h3>
                </div>
                <p>Най-големия онлайн магазин за авточасти в България!</p>
                <button class="btn rounded-5 bg-white">Разгледай</button>
            </div>

            <!-- Carousel slider -->
            <div class="slider-body">
                <h3>Специални предложения</h3>
                <div class="main-carousel">
                    @foreach ($manualProducts as $product)
                        <div class="carousel-cell">
                            <a href="/details/{{ $product->id }}" class="card">
                                <img src="{{ $product->imageUrl }}" class="card-img-top" alt="{{ $product->imageUrl }}" />
                                <div class="card-body">
                                    <h6 class="card-title">
                                        {{ $product->name }}
                                    </h6>
                                    <div class="d-flex justify-content-between">
                                        <p class="number">Кат. &#8470;: s_167232784</p>
                                        <p class="price">{{ $product->price }} лв.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach




                </div>
            </div>
        </div>
        <!-- 2nd auto slider -->

        <div class="slider">
            <div class="slider-header service-big text-white rounded-5">
                <div>
                    <img src="{{ asset('img/sec header/gear-sm.svg') }}" alt="gear" />
                    <h3>Борса части</h3>
                </div>
                <p>Най-голямата борса за авточасти в България!</p>
                <button class="btn rounded-5 bg-white">Разгледай</button>
            </div>

            <!-- Carousel slider -->
            <div class="slider-body">
                <h3>Последни оферти и запитвания</h3>
                <div class="auto-carousel">

                    @foreach ($autoProducts as $product)
                        <div class="carousel-cell">
                            <a href="/details/{{ $product->id }}" class="card">
                                <img src="{{ $product->imageUrl }}" class="card-img-top" alt="{{ $product->imageUrl }}" />
                                <div class="card-body">
                                    <h6 class="card-title">
                                        {{ $product->name }}
                                    </h6>
                                    <div class="d-flex justify-content-between">
                                        <p class="number">Кат. &#8470;: s_167232784</p>
                                        <p class="price">{{ $product->price }} лв.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="services container">
        <!-- big services -->
        <div class="service-group row gap-4">
            <div class="service-big text-white rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/avtoborsa.svg') }}" alt="gear" />
                    <h3>Автоборса</h3>
                </div>
                <p>Залагане, търгуване и продаване на автомобили.</p>
                <button class="btn rounded-5 bg-white">Разгледай</button>
            </div>
            <div class="service-big text-white rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/prodavakoli.svg') }}" alt="gear" />
                    <h3>Продава коли</h3>
                </div>
                <p>Обяви за коли. Част от MEGACARS.</p>
                <button class="btn rounded-5 bg-white">Разгледай</button>
            </div>
            <div class="service-big text-white rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/prodavachasti.svg') }}" alt="gear" />
                    <h3>Продава части</h3>
                </div>
                <p>Обяви за части. Част от MEGAОБЯВИ.</p>
                <button class="btn rounded-5 bg-white">Разгледай</button>
            </div>
            <div class="service-big text-white rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/igri.svg') }}" alt="gear" />
                    <h3>Игри</h3>
                </div>
                <p>Забавления за ценители!</p>
                <button class="btn rounded-5 bg-white">Разгледай</button>
            </div>
        </div>
        <!-- small services -->
        <div class="service-group row gap-4">
            <div class="service-small rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/zastrahovkiOrange.svg') }}" alt="insurance" />
                    <h5>Застраховки</h5>
                </div>
                <p>Застраховай автомобила си.</p>
            </div>
            <div class="service-small rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/crediti.svg') }}" alt="credits" />
                    <h5>Кредити</h5>
                </div>
                <p>MEGA в нужда се познава.</p>
            </div>
            <div class="service-small rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/avtodnevnik.svg') }}" alt="diary" />
                    <h5>Автодневник</h5>
                </div>
                <p>Твоят автодневник.</p>
            </div>
            <div class="service-small rounded-5 col-md">
                <div>
                    <img src="{{ asset('img/sec header/novini.svg') }}" alt="news" />
                    <h5>Новини</h5>
                </div>
                <p>Всичко в света на колите.</p>
            </div>
        </div>
    </section>
    <section class="reviews container">
        <div class="reviews-carousel">
            <div class="carousel-cell">
                <div class="review rounded-5">
                    <div class="header">
                        <img src="{{ asset('img/quotes.svg') }}" alt="" />
                        <p>
                            Единственото място в Интернет (българско) , където намирам
                            части за коли 25+ години. Имат доставка за Пловдив! Реално Ти
                            ги носят на адрес. Не мога да кажа нищо лошо.
                        </p>
                    </div>
                    <div class="user">
                        <img src="" alt="" />
                        <div class="info">
                            <h6 class="name">Мартин</h6>
                            <div class="stars">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-cell">
                <div class="review rounded-5">
                    <div class="header">
                        <img src="{{ asset('img/quotes.svg') }}" alt="" />
                        <p>
                            Много бързо и изключително коректно и професионално отношение!
                        </p>
                    </div>
                    <div class="user">
                        <img src="" alt="" />
                        <div class="info">
                            <h6 class="name">Мартин</h6>
                            <div class="stars">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="review rounded-5">
                    <div class="header">
                        <img src="{{ asset('img/quotes.svg') }}" alt="" />
                        <p>
                            Реагират своевременно, СУК работи и повишава качеството на
                            услугите.
                        </p>
                    </div>
                    <div class="user">
                        <img src="" alt="" />
                        <div class="info">
                            <h6 class="name">Мартин</h6>
                            <div class="stars">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="review rounded-5">
                    <div class="header">
                        <img src="{{ asset('img/quotes.svg') }}" alt="" />
                        <p>
                            Доволен съм от поръчаните до момента авточасти. Хубаво е да Ви
                            има на пазара с авточасти, защото иначе автоморгите ще откачат
                            с високите си цени. Вие сте нещо като регулатор на този не
                            малък пазар на части втора употреба. Благодаря!
                        </p>
                    </div>
                    <div class="user">
                        <img src="" alt="" />
                        <div class="info">
                            <h6 class="name">Мартин</h6>
                            <div class="stars">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-cell">
                <div class="review rounded-5">
                    <div class="header">
                        <img src="{{ asset('img/quotes.svg') }}" alt="" />
                        <p>
                            Много бързо и изключително коректно и професионално отношение!
                        </p>
                    </div>
                    <div class="user">
                        <img src="" alt="" />
                        <div class="info">
                            <h6 class="name">Мартин</h6>
                            <div class="stars">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map container">
        <img src="{{ asset('img/map.svg') }}" alt="" />
        <div class="pin">
            <div class="info">
                <p>MEGAPARTS Sofia</p>
                <p>ул.Васил Левски 123</p>
            </div>
        </div>
        <div class="pin">
            <div class="info">
                <p>MEGAPARTS Varna</p>
                <p>ул.Васил Левски 123</p>
            </div>
        </div>
    </section>
@endsection
