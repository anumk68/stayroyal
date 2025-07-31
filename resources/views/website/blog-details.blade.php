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


<section class="royal_blog_detail">
    <div class="container">
        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="blog-card">
                    {{-- Blog image --}}
                    @if($blog->image)
                        <img src="{{ asset('storage/app/public/' . $blog->image) }}" alt="{{ $blog->image_alt }}" style="max-width: 100%;" />
                    @else
                        <img src="{{ asset('images/default-blog.png') }}" alt="default image" style="max-width: 100%;" />
                    @endif

                    {{-- Blog Title --}}
                    <h2 class="mt-3">{{ $blog->title }}</h2>
                    <p class="text-muted">{{ config('app.name') }}</p>

                    {{-- Blog Description --}}
                    <div class="blog-body">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar recent-blogs">
                    <h5>📘 Recent Blogs</h5>
                    @foreach ($recentBlogs as $recent)
                        <div class="blog-item">
                            <a href="{{ route('blog.details', $recent->slug) }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ $recent->image ? asset('storage/app/public/' . $recent->image) : asset('images/default-thumb.png') }}" alt="{{ $recent->title }}" style="width: 60px; height: 60px; object-fit: cover;" />
                                <p><strong>{{ Str::limit($recent->title, 50) }}</strong><br>
                                    <small>{{ $recent->created_at->format('M d, Y') }}</small>
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
