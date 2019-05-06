@extends('layouts.portal')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
<div class="page-header">
			<div class="page-header-bg" style="background-image: url('{{asset('img/header-2.jpg')  }}')" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{ $category->name }}</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
<!-- SECTION -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">                
					<div class="row">
						<!-- post -->
                        @foreach($posts as $post)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="blog-post.html"><img src="{{ asset($post->image_link) }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{ $post->category->name }}</a>
									</div>
									<h3 class="post-title"><a href="{{ route('post.detail', $post->id) }}">{{ $post->title }}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{ $post->user->name }}</a></li>
										<li>{{ $post->published_at }}</li>
									</ul>
								</div>
                               
							</div>                           
						</div>
                        @endforeach
                    </div>
						<!-- /post -->


				</div>

				<div class="col-md-4">
					<!-- ad widget-->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-3.jpg" alt="">
						</a>
					</div>
					<!-- /ad widget -->

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{ route('category.posts', $category->id) }}">{{ $category->name }} <span>{{$category->posts->count()}}</span></a></li>
                                @endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->

					

					<!-- galery widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Instagram</h2>
						</div>
						<div class="galery-widget">
							<ul>
								<li><a href="#"><img src="{{ asset('img/galery-1.jpg') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('img/galery-2.jpg') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('img/galery-3.jpg') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('img/galery-4.jpg') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('img/galery-5.jpg') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('img/galery-6.jpg') }}" alt=""></a></li>
							</ul>
						</div>
					</div>
					<!-- /galery widget -->

					<!-- Ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /Ad widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection