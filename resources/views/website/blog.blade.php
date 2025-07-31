@extends('website.layouts.layout')
@section('content')
    <!--==================================================-->
    <!-- Start Royella Breadcumb Area -->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="breacumb-content">
                        <div class="breadcum-title">
                            <h4>Blog</h4>
                        </div>
                        <!-- <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>/</li>
                            <li>Blog</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">


                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-md-6">
                                <div class="single-blog-box inner">
                                    <div class="single-blog-thumb">
                                        <a href="{{ route('blog.details', $blog->slug) }}">
                                            <img src="{{ asset('storage/app/public/' . $blog->image) }}" alt="{{ $blog->title }}"
                                                style="width:100%;height:auto;">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="meta-blog">
                                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                                            <span>{{ $blog->category_name }}</span>
                                        </div>
                                        <a href="{{ route('blog.details', $blog->slug) }}"
                                            style="font-weight:bold;">{{ $blog->title }}</a>
                                    </div>
                                    <div class="blog-button">
                                        <a href="{{ route('blog.details', $blog->slug) }}">Read More <span><i
                                                    class="bi bi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="row">
			<div class="col-md-12">
				<div class="pagination-box">
					<ul>
						<li><a href="#"><i class="bi bi-arrow-left-short"></i></a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#"><i class="bi bi-arrow-right-short"></i></a></li>
					</ul>
				</div>
			</div>
		</div> --}}
            </div>
        </div>
    </div>
@endsection
