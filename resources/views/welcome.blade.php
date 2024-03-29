@extends('layouts.portal')

@section('title')
    World News Daily
@endsection

	<!-- /HEADER -->

	<!-- SECTION -->
    @section('content')
    <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img img-thumbnail" href="blog-post.html"><img src="{{ asset($latest_post->image_link)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{ $latest_post->category->name }}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{ route('post.detail', $latest_post->id) }}">{{ $latest_post->title }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html"><img src="{{ Gravatar::src($latest_post->user->email) }}" alt="" height="40px" width="40px" style="border-radius:50%">
								{{$latest_post->user->name}}</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					@foreach($breaking_posts as $breaking_post)
					<div class="post post-thumb">
						<a class="post-img img-thumbnail" href="blog-post.html"><img src="{{ asset($breaking_post->image_link)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{ $breaking_post->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('post.detail', $breaking_post->id) }}">{{ $breaking_post->title }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">
								<img src="{{ Gravatar::src($breaking_post->user->email) }}" alt="" height="20px" width="20px" style="border-radius:50%">
								{{$breaking_post->user->name}}</a></li>
								<li>{{ $breaking_post->published_at }}</li>
							</ul>
						</div>
						
					</div>
					@endforeach
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Recent posts</h2>
							</div>
						</div>
                        <!-- post -->
                        @foreach($posts as $post)
						<div class="col-md-6">
                            
							<div class="post">
								<a class="post-img img-thumbnail" href=""><img src="{{ asset($post->image_link) }}" alt="" ></a>
								<div class="post-body">
									<div class="post-category">
										<a href="">{{ $post->category->name }}</a>
									</div>
									<h3 class="post-title"><a href="{{ route('post.detail', $post->id) }}">{{ $post->title }}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">
										<img src="{{ Gravatar::src($post->user->email) }}" alt="" height="20px" width="20px" style="border-radius:50%">
										{{$post->user->name}} </a></li>
										<li>{{$post->published_at}}</li>
									</ul>
								</div>
                            </div>
                            
                        </div>
                        @endforeach

						<div class="col-md-6">
						@forelse($posts as $post)

						@empty

						<p class="text">
						No result found for query <strong>{{ request()->query('search') }}</strong>
						</p>
						@endforelse

						</div>


						<!-- /post -->
						<div class="clearfix visible-md visible-lg">{{ $posts->appends(['search'=> request()->query('search')])->links() }}</div>


						<!-- /post -->
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Politics</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($politics_posts as $politics_post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img img-thumbnail" href="blog-post.html"><img src="{{ asset($politics_post->image_link) }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{$politics_post->category->name}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="blog-post.html">{{$politics_post->title}}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$politics_post->user->name}}</a></li>
										<li>{{$politics_post->published_at}}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Business</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($business_posts as $business_post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img img-thumbnail" href="blog-post.html"><img src="{{ asset($business_post->image_link) }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{$business_post->category->name}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="blog-post.html">{{$business_post->title}}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$business_post->user->name}}</a></li>
										<li>{{$business_post->published_at}}</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /post -->
						@endforeach
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Finance</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($finance_posts as $finance_post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img img-thumbnail" href="blog-post.html"><img src="{{ asset($finance_post->image_link) }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{$finance_post->category->name}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="blog-post.html">{{$finance_post->title}}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$finance_post->user->name}}</a></li>
										<li>{{$finance_post->published_at}}</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /post -->
						@endforeach
						<!-- /post -->
					</div>
					<!-- /row -->
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

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>
						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-3.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Lifestyle</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Technology</a>
									<a href="category.html">Lifestyle</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-4.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Health</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-5.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Health</a>
									<a href="category.html">Lifestyle</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
							</div>
						</div>
						<!-- /post -->
					</div>
					<!-- /post widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ad -->
				<div class="col-md-12 section-row text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-2.jpg" alt="">
					</a>
				</div>
				<!-- /ad -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	
	<!-- /SECTION -->

	<!-- SECTION -->
	
    @endsection
	<!-- /SECTION -->


