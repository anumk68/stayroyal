@extends('website.layouts.layout')
@section('content')
@section('meta_title', $blog->meta_title)
@section('meta_description', $blog->meta_description)

<style>
    a {
        color: #b19043 !important;
    }

    .sidebar {
        transition: top 0.1s ease, transform 0.4s ease, opacity 0.1s ease;
    }

    .sidebar.smooth-sticky {
        transform: translateY(10px);
        opacity: 1;
    }

    #sticky-sidebar {
        transition: transform 0.3s ease, top 0.3s ease;
        will-change: transform, top;
    }

    .sidebar-container {
        position: relative;
    }

    .sidebar-container.is-stuck .sidebar {
        position: fixed;
        top: 20px;
        width: inherit;
        max-width: 350px;
    }

    .sidebar-container.is-bottom .sidebar {
        position: absolute;
        bottom: 20;
        top: auto;
        width: 100%;
    }

    .sidebar {
        transition: top 0.2s ease;
    }

    .sidebar-container {
        position: relative;
    }

    .sidebar-container.is-stuck .sidebar {
        position: fixed;
        top: 20px;
        width: inherit;
        max-width: 350px;

    }

    .sidebar-container.is-bottom .sidebar {
        position: absolute;
        bottom: 20;
        top: auto;
        width: 100%;
    }
</style>
<!--==================================================-->
<!-- Start Royella Breadcumb Area -->
<div class="breadcumb-area d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="breacumb-content">
                    <div class="breadcum-title">
                        {{-- <h4>Blog</h4> --}}
                        <h1 class="text-white">{{ $blog->title }}</h1>
                    </div>
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
                    @if ($blog->image)
                        <img src="{{ asset('storage/app/public/' . $blog->image) }}" alt="{{ $blog->image_alt }}"
                            style="max-width: 100%;" />
                    @else
                        <img src="{{ asset('images/default-blog.png') }}" alt="default image"
                            style="max-width: 100%;" />
                    @endif

                    {{-- Blog Title --}}
                    <h2 class="mt-3 mb-2">{{ $blog->title }}</h2>
                    {{-- <p class="text-muted">{{ config('app.name') }}</p> --}}

                    {{-- Blog Description --}}
                    <div class="blog-body">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-container" id="sidebarContainer">
                    <div class="sidebar recent-blogs shadow-sm rounded-3 p-3">
                        <h5 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="bi bi-journal-text me-2 text-primary"></i> Recent Blogs
                        </h5>

                        @foreach ($recentBlogs as $recent)
                            <div class="blog-item d-flex align-items-center mb-3 border-bottom pb-2">
                                <a href="{{ route('blog.details', $recent->slug) }}"
                                    class="d-flex align-items-center text-decoration-none text-dark w-100">
                                    <img src="{{ $recent->image ? asset('storage/app/public/' . $recent->image) : asset('images/default-thumb.png') }}"
                                        alt="{{ $recent->title }}" class="rounded me-3"
                                        style="width: 70px; height: 70px; object-fit: cover;">
                                    <div class="flex-grow-1">
                                        <p class="mb-1 fw-semibold" style="font-size: 14px;">
                                            {{ Str::limit($recent->title, 55) }}
                                        </p>
                                        <small class="text-muted">
                                            {{ $recent->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const sidebarContainer = document.getElementById('sidebarContainer');
        const sidebar = sidebarContainer.querySelector('.sidebar');
        const container = document.querySelector('.royal_blog_detail .container');
        const navbarHeight = 20; // distance from top when sticky

        let sidebarWidth = sidebar.offsetWidth;

        function handleScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const containerRect = container.getBoundingClientRect();
            const containerTop = container.offsetTop;
            const containerBottom = containerTop + container.offsetHeight;
            const sidebarHeight = sidebar.offsetHeight;

            // Calculate how far bottom is from current scroll
            const distanceFromBottom = containerBottom - (scrollTop + sidebarHeight + navbarHeight);

            // --- smooth transition logic ---
            if (scrollTop + navbarHeight > containerTop && distanceFromBottom > 0) {
                // Stick to top while scrolling
                sidebar.style.position = 'fixed';
                sidebar.style.top = navbarHeight + 'px';
                sidebar.style.width = sidebarWidth + 'px';
                sidebar.style.transition = 'top 0.3s ease, transform 0.3s ease';
                sidebar.style.transform = 'translateY(0)';
            } else if (distanceFromBottom <= 0) {
                // Reaching the bottom — smoothly stop before footer
                sidebar.style.position = 'absolute';
                sidebar.style.top = (containerBottom - containerTop - sidebarHeight - 20) + 'px';
                sidebar.style.width = '100%';
                sidebar.style.transition = 'top 0.3s ease, transform 0.3s ease';
                sidebar.style.transform = 'translateY(0)';
            } else {
                // Normal (top of section)
                sidebar.style.position = 'static';
                sidebar.style.width = '';
                sidebar.style.transition = '';
                sidebar.style.transform = '';
            }
        }

        function handleResize() {
            sidebarWidth = sidebar.offsetWidth;
            handleScroll();
        }

        window.addEventListener('scroll', handleScroll);
        window.addEventListener('resize', handleResize);
        handleScroll();
    });
</script>




@endsection
