@extends('layout.master')
@section('title')
    <title>{{ config('web_config')['WEBSITE_TITLE'] }}</title>
@endsection
@section('content')
    <!-- Start Slider Area -->
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{ Storage::url('images/setting/'.config('web_config')['SLIDER_1']) }}" alt="" title="#slider-direction-1" />
                <img src="{{ Storage::url('images/setting/'.config('web_config')['SLIDER_2']) }}" alt="" title="#slider-direction-2" />
                <img src="{{ Storage::url('images/setting/'.config('web_config')['SLIDER_3']) }}" alt="" title="#slider-direction-3" />
            </div>

            <!-- direction 1 -->
            <div id="slider-direction-1" class="slider-direction slider-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">{{ config('web_config')['TEXT_TITLE'] }}</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">{{ config('web_config')['TEXT_DESCRIPTION_1'] }}</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                                    <a class="ready-btn page-scroll" href="#about">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content text-center">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">{{ config('web_config')['TEXT_TITLE'] }}</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">{{ config('web_config')['TEXT_DESCRIPTION_2'] }}</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                                    <a class="ready-btn page-scroll" href="#about">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 3 -->
            <div id="slider-direction-3" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">{{ config('web_config')['TEXT_TITLE'] }}</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">{{ config('web_config')['TEXT_DESCRIPTION_3'] }}</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                                    <a class="ready-btn page-scroll" href="#about">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start About area -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>About Dtech</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <a href="#">
                                @if(!empty($about->image))
                                <img src="{{ Storage::url('images/about/'. $about->image) }}" alt="{{ $about->image }}">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <p>{{ $about->description }}</p>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div>
    <!-- End About area -->

    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="services-contents">
                    <!-- Start Left services -->
                    @foreach($listServices as $services)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <img src="{{ Storage::url('images/services/'.$services->image) }}" class="img-responsive" alt="{{ $services->image }}">
                                    </a>
                                    <h4>{{ $services->title }}</h4>
                                    <p>{!! $services->description !!}</p>
                                </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Service area -->

    <!-- Faq area start -->
    <div class="faq-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Faq Question</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="faq-details">
                        <div class="panel-group" id="accordion">
                            <!-- Panel Default -->
                            @foreach($listFaqs as $faqs)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check{{ $loop->iteration }}">
                                            <span class="acc-icons"></span>{!! $faqs->question !!}
                                        </a>
                                    </h4>
                                </div>
                                <div id="check{{ $loop->iteration }}" class="panel-collapse collapse out">
                                    <div class="panel-body">
                                        <p>{!! $faqs->answer !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Panel Default -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Row -->
        </div>
    </div>
    <!-- End Faq Area -->

    <!-- Start Wellcome Area -->
    <div class="wellcome-area">
        <div class="well-bg">
            <div class="test-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wellcome-text">
                            <div class="well-text text-center">
                                <h2>Welcome To Our Dtech</h2>
                                <p>
                                    Busuness Lorem ipsum dolor sit amet, consectetur adipiscing elit.luctus est eget congue.
                                </p>
                                <div class="subs-feilds">
                                    <div class="suscribe-input">
                                        <input type="email" class="email form-control width-80" id="sus_email" placeholder="Email">
                                        <button type="submit" id="sus_submit" class="add-btn width-20">Subscribe</button>
                                        <div id="msg_Submit" class="h3 text-center hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wellcome Area -->

    <!-- Start team Area -->
    <div id="team" class="our-team-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Our special Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="team-top">
                    @foreach($listTeam as $team)
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="single-team-member">
                            <div class="team-img">
                                <a href="#">
                                    <img src="{{ Storage::url('images/profile/'.$team->image) }}" alt="{{ $team->name }}">
                                </a>
                            </div>
                            <div class="team-content text-center">
                                <h4>{{ $team->name }}</h4>
                                <p>{{ $team->position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- End column -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Area -->

    <!-- Start portfolio Area -->
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Our Portfolio</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Portfolio -page -->
                <div class="awesome-project-content">
                    <!-- single-awesome-project start -->
                    @foreach($listPortofolio as $portofolio)
                    <div class="col-md-4 col-sm-4 col-xs-12 design development">
                        <div class="single-awesome-project">
                            <div class="awesome-img">
                                <a href="#"><img src="{{ Storage::url('images/portfolio/'.$portofolio->image) }}" alt="{{ $portofolio->title }}" /></a>
                                <div class="add-actions text-center">
                                    <div class="project-dec">
                                        <a class="venobox" data-gall="myGallery" href="{{ Storage::url('images/portfolio/'.$portofolio->image) }}">
                                            <h4>{{ $portofolio->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- single-awesome-project end -->
                </div>
            </div>
        </div>
    </div>
    <!-- awesome-portfolio end -->

    <!-- Start Testimonials -->
    <div class="testimonials-area">
        <div class="testi-inner area-padding">
            <div class="testi-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Start testimonials Start -->
                        <div class="testimonial-content text-center">
                            <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
                            <!-- start testimonial carousel -->
                            <div class="testimonial-carousel">
                                @foreach($listTestimoni as $testimoni)
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <p>{{ $testimoni->quote }}</p>
                                        <h6>{{ $testimoni->name }}</h6>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End single item -->
                            </div>
                        </div>
                        <!-- End testimonials end -->
                    </div>
                    <!-- End Right Feature -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->
    <!-- Start Blog Area -->
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Latest News</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($listArticles as $articles)
                    <!-- Start Left Blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="team-blog">
                                <a href="{{ route('article.detail', $articles->slug)  }}">
                                    <img src="{{ Storage::url('images/articles/'.$articles->image) }}" alt="{{ $articles->title }}">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="date-type">
                                      <i class="fa fa-calendar"></i>{{ date('d M Y', strtotime($articles->created_at)) }}
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="{{ route('article.detail', $articles->slug)  }}">{{ $articles->title }}</a>
                                </h4>
                                <p>{!! $articles->description !!}</p>
                            </div>
                            <span>
                                <a href="{{ route('article.detail', $articles->slug) }}" class="ready-btn">Read more</a>
                            </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    @endforeach
                    <!-- End Left Blog-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
    <!-- Start contact Area -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Contact us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-mobile"></i>
                                <p>
                                    Call: {{ $contactUs->contact_number }}<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-envelope-o"></i>
                                <p>
                                    Email: {{ $contactUs->email }}<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    Location: {{ $address->adress }}<br>
                                    <span>{{ $address->city }}, {{ $address->country }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Google Map -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- Start Map -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <!-- End Map -->
                    </div>
                    <!-- End Google Map -->

                    <!-- Start  contact -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form contact-form">
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>
                            <form action="{{ route('contact.store') }}" method="post" role="form" class="contactForm">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                    @if($error = $errors->first('name'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                    @if($error = $errors->first('email'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                    @if($error = $errors->first('subject'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                    @if($error = $errors->first('message'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                @if($message = session('message'))
                                    <div class="row mt-0 ml-2">
                                        <div class="col-md-6">
                                            <h4 class="btn btn-danger">{{ $message }}</h4>
                                        </div>
                                    </div>
                                @endif
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
@endsection
