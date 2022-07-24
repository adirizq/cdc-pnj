@extends('cdc.main')

@section('content')

    <div>

        @include('cdc.partials.navbar')

        <div class="main-content">

            <div class="page-content">

                @include('cdc.partials.page-title', ['pageTitle' => 'Artikel'])

                <!-- START BLOG-DETAILS -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-7">
                                <div class="blog-post">
                                    <div class="row">
                                        @foreach($articles as $article)
                                        <div class="col-lg-6 mb-4">
                                            <div class="card blog-grid-box p-2">
                                                <img src="{{ asset('storage/' . $article->image) }}" alt="" class="img-fluid" style="max-height: 250px; width: 100%; object-fit: cover;">
                                                <div class="card-body">
                                                    <ul class="list-inline d-flex justify-content-between mb-3">
                                                        <li class="list-inline-item">
                                                            <p class="text-muted mb-0"><i class="uil uil-user"></i> CDC PNJ &nbsp;&nbsp;<i class="uil uil-calendar-alt"></i> {{ $article->created_at->format('M d, Y') }}</p>
                                                        </li>
                                                    </ul>
                                                    <a href="{{ route('article-detail', $article->id) }}" class="primary-link"><h6 class="fs-17">{{ $article->title }}</h6></a>
                                                    <p class="text-muted" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; text-overflow: ellipsis; overflow:hidden">{{ $article->content}}</p>
                                                    <div>
                                                        <a href="{{ route('article-detail', $article->id) }}" class="form-text text-primary">Baca Artikel <i class="uil uil-angle-right-b"></i></a>
                                                    </div>
                                                </div>
                                            </div><!--end blog-grid-box-->
                                        </div><!--end col-->
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-5">
                                            {{ $articles->links('vendor.pagination.default') }}
                                        </div><!--end col-->
                                    </div><!-- end row -->
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
                                            <h6 class="fs-16 mb-3">Artikel Acak</h6>
                                        </div>
                                        <ul class="widget-popular-post list-unstyled my-4">
                                            @foreach ($randArticles as $article)
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