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
                            <h4>Blogs</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-4 col-md-4">
                                <div class="single-blog-box inner">
                                    <div class="single-blog-thumb">
                                        <a href="{{ route('blog.details', $blog->slug) }}">
                                            <img src="{{ asset('storage/app/public/' . $blog->image) }}"
                                                alt="{{ $blog->title }}" style="width:100%;height:auto;">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="meta-blog">
                                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                                            <span>{{ $blog->category_name }}</span>
                                        </div>
                                        <a href="{{ route('blog.details', $blog->slug) }}"
                                            style="font-weight:bold; text-decoration: none;">{{ Str::limit($blog->title, 40) }}</a>
                                        <p>{{ Str::limit($blog->short_description, 100) }}</p>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-box">
                            <ul>
                                {{-- Previous Page Link --}}
                                @if ($blogs->onFirstPage())
                                    <li class="disabled"><span><i class="bi bi-arrow-left-short"></i></span></li>
                                @else
                                    <li>
                                        <a href="{{ $blogs->previousPageUrl() }}"><i class="bi bi-arrow-left-short"></i></a>
                                    </li>
                                @endif

                                {{-- Page Numbers --}}
                                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                    @if ($page == $blogs->currentPage())
                                        <li class="active"><a href="#">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($blogs->hasMorePages())
                                    <li><a href="{{ $blogs->nextPageUrl() }}"><i class="bi bi-arrow-right-short"></i></a>
                                    </li>
                                @else
                                    <li class="disabled"><span><i class="bi bi-arrow-right-short"></i></span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
