@extends('cdc.main')

@section('content')

    <div>

        @include('cdc.partials.navbar')

        <div class="main-content">

            <div class="page-content">

                @include('cdc.partials.page-title', ['pageTitle' => 'Artikel', 'pageTitleLink' => route('articles'), 'title' => 'Detail Artikel'])

                <!-- START BLOG-DETAILS -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="blog-post">
                                    <div class="blogdetailSlider">
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="" class="img-fluid rounded-3 w-100">
                                    </div>
                                    
                                    <ul class="list-inline mb-0 mt-3 text-muted">
                                        <li class="list-inline-item">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0">By CDC PNJ</h6>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <i class="uil uil-calendar-alt"></i>
                                                </div>
                                                <div class="ms-2">
                                                    <p class="mb-0"> {{ $article->created_at->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="mt-4">
                                        <h5>{{ $article->title }}</h5>
                                        <p class="text-muted">{!! nl2br($article->content) !!}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4 col-md-5">
                                <div class="sidebar ms-lg-4 ps-lg-4 mt-5 mt-lg-0">
                                    <!-- Search widget-->
                                    <aside class="widget widget_search">
                                        <form class="position-relative">
                                            <input class="form-control" type="text" placeholder="Cari Artikel...">
                                            <button class="bg-transparent border-0 position-absolute top-50 end-0 translate-middle-y fs-22 me-2" type="submit"><span class="mdi mdi-magnify text-muted"></span></button>
                                        </form>
                                    </aside>

                                    <div class="mt-4 pt-2">
                                        <div class="sd-title">
                                            <h6 class="fs-16 mb-3">Artikel Terbaru</h6>
                                        </div>
                                        <ul class="widget-popular-post list-unstyled my-4">
                                            @foreach ($newArticles as $article)
                                            <li class="d-flex mb-3 align-items-center pb-3 border-bottom">
                                                <img src="{{ asset('storage/' . $article->image) }}" alt="" class="widget-popular-post-img rounded" />
                                                <div class="flex-grow-1 text-truncate ms-3">
                                                    <a href="{{ route('article-detail', $article->id) }}" class="text-dark">{{ $article->title }}</a>
                                                    <span class="d-block text-muted fs-14">{{ $article->created_at->format('M d, Y') }}</span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div><!--end Polular Post-->

                                </div>
                                <!--end sidebar-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </section>
                <!-- START BLOG-DETAILS -->

            </div>
            <!-- End Page-content -->

            @include('cdc.partials.footer')

            <!--start back-to-top-->
            <button onclick="topFunction()" id="back-to-top">
                <i class="mdi mdi-arrow-up"></i>
            </button>
            <!--end back-to-top-->

        </div>
        <!-- end main content-->

@endsection