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
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Blog</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Breadcumb Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Blog Area -->
<!--==================================================-->
<div class="blog-details-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">


                @foreach($blogs as $blog)
					<div class="col-lg-6 col-md-6">
						<div class="single-blog-box inner">
							<div class="single-blog-thumb">
								<img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
							</div>
		                    <div class="blog-content">
		                       <div class="meta-blog">
								 <span>{{ $blog->created_at->format('F d, Y') }}</span>
								  <span>{{ $blog->category_name }}</span>
							    </div>
		                    	<a href="blog-details.html">{{ $blog->title }}</a>
		                    </div>
		                    <div class="blog-button">
								<a href="blog.html">Read More<span><i class="bi bi-arrow-right"></i></span></a>
		                    </div>
						</div>
					</div>	
					@endforeach
					

				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<div class="widget_search">
						    <form action="#" method="get">
						    	<input type="text" name="s" value="" placeholder="Search Here" title="Search for:">
						    	<button type="submit" class="icons">
						    		<i class="fa fa-search"></i>
						    	</button>
						    </form>
				    	</div>
				    			    	
					    <div class="widget-categories-box">
							<!-- categories title -->
							<div class="categories_title">
								<h4>Categories </h4>
							</div>
                            <div class="widget-catefories-list">
                            	<ul>
                            		<li><a href="#"><i class="fas fa-angle-double-right"></i>Luxury Hotels</a></li>
                            		<li><a href="#"><i class="fas fa-angle-double-right"></i>Restaurents</a></li>
                            		<li><a href="#"><i class="fas fa-angle-double-right"></i>SPA Center</a></li>
                            		<li><a href="#"><i class="fas fa-angle-double-right"></i>Health Club</a></li>
                            		<li><a href="#"><i class="fas fa-angle-double-right"></i>Industrial</a></li>
                            		<li><a href="#"><i class="fas fa-angle-double-right"></i>Uncategories</a></li>
                            	</ul>
                            </div>
					    </div>					    
					    <div class="widget-categories-box">
							<!-- categories title -->
							<div class="categories_title">
								<h4>Tags </h4>
							</div>
                            <div class="widget-catefories-tags">
                                <a href="#">Luxury Hotel</a>
                                <a href="#">Interior Design</a>
                                <a href="#">SPA Center</a>
                                <a href="#">Luxury Restaurent</a>
                                <a href="#">Luxury Home</a>
                            </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
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
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Blog Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Brand Area -->
<!--==================================================-->
<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-8">
				<div class="row">
					<div class="brand-list owl-carousel">
					    <div class="col-lg-12">
						    <div class="single-brand-box">
							    <div class="brand-thumb">
							    	<img src="assets/images/home-1/brand-1.png" alt="">
							    </div>
						    </div>
					    </div>					   
					    <div class="col-lg-12">
						    <div class="single-brand-box">
							    <div class="brand-thumb">
							    	<img src="assets/images/home-1/brand-2.png" alt="">
							    </div>
						    </div>
					    </div>					    
					    <div class="col-lg-12">
						    <div class="single-brand-box">
							    <div class="brand-thumb">
							    	<img src="assets/images/home-1/brand-3.png" alt="">
							    </div>
						    </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Brand Area -->
<!--==================================================-->

@endsection
