<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ $profile->name }} - Resume</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">

    <link rel="stylesheet" href="/assets/css/aos.css">

    <link rel="stylesheet" href="/assets/css/ionicons.min.css">
    
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="/assets/css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/"><span>S</span>eptian</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="/" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="/" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="/" class="nav-link"><span>Resume</span></a></li>
	          <li class="nav-item"><a href="/" class="nav-link"><span>Projects</span></a></li>
	          <!-- <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li> -->
	          <li class="nav-item"><a href="/blog" class="nav-link active"><span>My Blog</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	 
    <section class="ftco-section contact-section ftco-no-pb" id="blog-section">
      <!-- Page Content -->
	  <div class="container">

	    <div class="row">

	      <!-- Post Content Column -->
	      <div class="col-lg-8">

	        <!-- Title -->
	        <h1 class="mt-4">{{ $post->title }}</h1>

	        <!-- Author -->
	        <p class="lead">
	          by
	          <a href="{{ route('author',$post->author->slug) }}">{{ $post->author->name }}</a>
	        </p>

	        <hr>

	        <!-- Date/Time -->
	        <p>Posted  {{ $post->published_at->format('M d, Y') }} at {{ $post->published_at->format('H:i') }} on <a href="{{ route('category',$post->category->slug)}}">{{ $post->category->title }}</a></strong></p>
 

	        <hr>
	     	@if($post->image_url)
	      	<!-- Preview Image -->
	      	<img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
	      	<hr>
	      	@endif

	        <!-- Post Content -->
	        {!! $post->body_html !!}

	        <article class="post-author padding-10">
		      <div class="media">
		        <div class="media-center">
		          <a href="{{ route('author', $post->author->slug) }}">
		            <img src="{{ $post->author->gravatar() }}" width="100" height="100" alt="{{ $post->author->name }}" class="media-object">
		          </a>
		        </div>
		        <div class="media-body" style="padding-left: 10px;">
		          <h4 class="media-heading"><a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a></h4>
		          <div class="post-author-count">
		            <a href="{{ route('author', $post->author->slug) }}">
		              <i class="fa fa-clone"></i>
		              <?php $postCount = $post->author->posts()->published()->count();?>
		              {{ $postCount }} {{ str_plural('post', $postCount) }}
		            </a>
		          </div>
		          {!! $post->author->bio_html !!}
		        </div>
		      </div>
		    </article>

	        <hr>

	        <!-- Comments Form -->
	        <div class="card my-4">
	          <h5 class="card-header">Leave a Comment:</h5>
	          <div class="card-body">
	            <form>
	              <div class="form-group">
	                <textarea class="form-control" rows="3"></textarea>
	              </div>
	              <button type="submit" class="btn btn-primary">Submit</button>
	            </form>
	          </div>
	        </div>

	        <!-- Single Comment -->
	        <div class="media mb-4">
	          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	          <div class="media-body">
	            <h5 class="mt-0">Commenter Name</h5>
	            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	          </div>
	        </div>

	        <!-- Comment with nested comments -->
	        <div class="media mb-4">
	          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	          <div class="media-body">
	            <h5 class="mt-0">Commenter Name</h5>
	            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

	            <div class="media mt-4">
	              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	              <div class="media-body">
	                <h5 class="mt-0">Commenter Name</h5>
	                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	              </div>
	            </div>

	            <div class="media mt-4">
	              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	              <div class="media-body">
	                <h5 class="mt-0">Commenter Name</h5>
	                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	              </div>
	            </div>

	          </div>
	        </div>

	      </div>

	      <!-- Sidebar Widgets Column -->
	      <div class="col-md-4">

	        <!-- Categories Widget -->
	        <div class="card my-4">
	          <h5 class="card-header">Categories</h5>
	          <div class="card-body">
	            <ul class="list-group list-group-flush">
				  @foreach($categories as $category)
				   <li class="list-group-item"><a href="{{ route('category', $category->slug)}}">{{ $category->title }} <span class="badge badge-pill badge-secondary float-right">{{ $category->posts->count() }}</span></a></li>
				  @endforeach
				</ul>
	          </div>
	        </div>

	        <!-- Side Widget -->
	        <div class="card my-4">
	          <h5 class="card-header">Side Widget</h5>
	          <div class="card-body">
	          	<ul class="list-group list-group-flush">
	            @foreach($popularPosts as $popularPost)
    			  <li class="list-group-item"><img src="{{ url('/assets/images/image_1.jpg') }}" width=35% alt=""><a href="{{ route('show', $popularPost->slug)}}">&nbsp;{{ substr($popularPost->title, 0, 15) }} ...<span class="badge badge-pill badge-secondary float-right">{{ $popularPost->view_count }} {{ str_plural('view', $popularPost->view_count)}}</span></a></li>
    			@endforeach
    			</ul>
	          </div>
	        </div>

	      </div>

	    </div>
	    <!-- /.row -->

	  </div>
	  <!-- /.container -->
    </section>
    
    <section class="ftco-section ftco-hireme img" style="background-image: url(images/bg_1.jpg)">
    	<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 ftco-animate text-center">
						<h2>I'm <span>Available</span> for freelancing</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						<p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Hire me</a></p>
					</div>
				</div>
			</div>
	</section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h1 class="big big-2">Contact</h1>
            <h2 class="mb-4">Contact Me</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>

        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 shadow">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Address</h3>
		            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
		          </div>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 shadow">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Contact Number</h3>
		            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
	            </div>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 shadow">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Email Address</h3>
		            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
		          </div>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4 shadow">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Website</h3>
		            <p><a href="#">yoursite.com</a></p>
	            </div>
	          </div>
          </div>
        </div>

        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-4 p-md-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div class="img" style="background-image: url(images/about.jpg);"></div>
          </div>
        </div>
      </div>
    </section>
    
		

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Design</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Development</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business Strategy</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Data Analysis</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Graphic Design</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/assets/js/popper.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/jquery.easing.1.3.js"></script>
  <script src="/assets/js/jquery.waypoints.min.js"></script>
  <script src="/assets/js/jquery.stellar.min.js"></script>
  <script src="/assets/js/owl.carousel.min.js"></script>
  <script src="/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="/assets/js/aos.js"></script>
  <script src="/assets/js/jquery.animateNumber.min.js"></script>
  <script src="/assets/js/scrollax.min.js"></script>
  
  <script src="/assets/js/main.js"></script>
    
  </body>
</html>