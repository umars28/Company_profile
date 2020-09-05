@extends('layout.master')
@section('title')
    <title>List Article By Category</title>
@endsection
@section('content')
    <!-- Start Bottom Header -->
    <div class="header-bg page-area">
        <div class="home-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content text-center">
                        <div class="header-bottom">
                            <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                <h1 class="title2">List Article</h1>
                            </div>
                            <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                                <h2 class="title3">By Category</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Header -->
    <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="page-head-blog">
                        <div class="single-blog-page">
                            <!-- recent start -->
                            <div class="left-blog">
                                <h4>recent post</h4>
                                <div class="recent-post">
                                    <!-- start single post -->
                                    @foreach($listArticles as $listArticle)
                                        <div class="recent-single-post">
                                            <div class="post-img">
                                                <a href="{{ route('article.detail', $listArticle->slug) }}">
                                                    <img src="{{ Storage::url('images/articles/'.$listArticle->image) }}" alt="{{ $listArticle->title }}">
                                                </a>
                                            </div>
                                            <div class="pst-content">
                                                <p><a href="{{ route('article.detail', $listArticle->slug) }}">{!! substr($listArticle->description, 0,15) !!}</a></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- recent end -->
                        </div>
                        <div class="single-blog-page">
                            <div class="left-blog">
                                <h4>categories</h4>
                                <ul>
                                    @foreach($listCategories as $category)
                                        <li>
                                            <a href="{{ route('article.index', $category->id) }}">{{ $category->category }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End left sidebar -->
                <!-- Start single blog -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        @foreach($listArticleByCategory as $listArticle)
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="{{ route('article.detail', $listArticle->slug) }}">
                                        <img src="{{ Storage::url('images/articles/'.$listArticle->image) }}" alt="{{ $listArticle->title }}">
                                    </a>
                                </div>
                                <div class="blog-meta">
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>{{ date('d M Y', strtotime($listArticle->created_at)) }}
							    	</span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="{{ route('article.detail', $listArticle->slug) }}">{{ $listArticle->title }}</a>
                                    </h4>
                                    <p>{!! substr($listArticle->description, 0, 20) !!}</p>
                                </div>
                                    <span>
										<a href="{{ route('article.detail', $listArticle->slug) }}" class="ready-btn">Read more</a>
									</span>
                                </div>
                        </div>
                        @endforeach
                        <!-- End single blog -->
                        <div class="blog-pagination">
                            <b>Jumlah Artikel : {{ $listArticleByCategory->total() }}</b>
                            {{ $listArticleByCategory->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <div class="clearfix"></div>
@endsection
