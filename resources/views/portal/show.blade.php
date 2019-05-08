@extends('layouts.portal')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
<div class="section">
		<!-- container -->
	<div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post share -->
                <div class="section-row">
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
            <div class="section-row">
                <h3> {{$post->title}}  </h3>
                <li><a href="author.html">{{$post->user->name}}</a></li>
                {{ $post->description }}
                <figure class="pull-right">
                    <img src="{{ $post->image_link }}">
                    <figcaption>Lorem ipsum dolor sit amet, mea ad idque detraxit,</figcaption>
                </figure>
                <p> {!! $post->content !!}
            </div>
            <!-- /post content -->

            <!-- post tags -->
            <div class="section-row">
                <div class="post-tags">
                    <ul>
                        <li>TAGS:</li>
                        @foreach($post->tags as $tag)
                        <li><a href="{{ route('tag.posts', $tag->id) }}">{{ $tag->tag }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- post comments -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">Comments</h3>
						</div>
						<div class="post-comments">
						<div id="disqus_thread"></div>
                            <script>

                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                
                                var disqus_config = function () {
                                    this.page.url = "{{ config('app.url') }}/news/posts/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://world-news-daily.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>

                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>                           
							
							
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<!-- ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="{{ asset('img/ad-3.jpg')}}" alt="">
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
                            <li><a href="#">{{ $category->name }}</a></li>
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
								<input class="input" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->
        </div>
    </div>
</div>
@endsection