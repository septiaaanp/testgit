<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ $profile->name }} - Resume</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
	          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
	          <li class="nav-item"><a href="#services-section" class="nav-link"><span>Projects</span></a></li>
	          <!-- <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li> -->
	          <li class="nav-item"><a href="/blog" class="nav-link"><span>My Blog</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  <section class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-center">
          	<div class="text text-center">
          		<span class="subheading">Hey! I am</span>
		  				<h1>{{ $profile->name }}</h1>
			  				<h2>I'm a 
								  <span
								     class="txt-rotate"
								     data-period="2000"
								     data-rotate='[ "Information System Graduated."]'></span>
								</h2>
							</div>
            </div>
          </div>
        </div>
      </div>
      <div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
				</a>
			</div>
    </section>

    <section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url('{{ '/data_profile/'.$profile->profile->foto }}');">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 pl-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<h1 class="big">About</h1>
		            <h2 class="mb-4">About Me</h2>
		            {!! $profile->profile->about !!}
		            <ul class="about-info mt-4 px-md-0 px-2">
		            	<li class="d-flex"><span>Name:</span> <span>{{ $profile->name }}</span></li>
		            	<li class="d-flex"><span>Date of birth:</span> <span>{{ $profile->profile->ttl }}</span></li>
		            	<li class="d-flex"><span>Address:</span> <span>{{ $profile->profile->alamat }}</span></li>
		            	<li class="d-flex"><span>Email:</span> <span>{{ $profile->profile->email }}</span></li>
		            	<li class="d-flex"><span>Phone: </span> <span>{{ $profile->profile->hp }}</span></li>
		            </ul>
		          </div>
		        </div>
	          <div class="counter-wrap ftco-animate d-flex mt-md-3">
              <div class="text">
              	<!-- <p class="mb-4">
	                <span class="number" data-number="120">0</span>
	                <span>Project complete</span>
                </p> -->
                <p><a href="{{ url('/data_profile/'.$profile->profile->cv) }}" target="_blank" class="btn btn-primary py-3 px-3">Download CV</a></p>
              </div>
	          </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pb goto-here" id="resume-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-3">
				    <nav id="navi">
					    <ul>
					      <li><a href="#page-1">Education</a></li>
					      <li><a href="#page-2">Experience</a></li>
					      <li><a href="#page-3">Skills</a></li>
					      <li><a href="#page-4">Certificate</a></li>
					    </ul>
					  </nav>
					</div>
					<div class="col-md-9">
					  <div id="page-1" class= "page one">
					  	<h2 class="heading">Education</h2>

					  	@foreach($education as $e)
					    <div class="resume-wrap d-flex ftco-animate">
					    	<div class="icon d-flex align-items-center justify-content-center">
					    		<span class="flaticon-ideas"></span>
					    	</div>
					    	<div class="text pl-3">
		    					<span class="date">{{ $e->tahun_masuk }} - 
		    						{{ $e->tahun_selesai }}
		    					</span>
		    					<h2>{{ $e->sekolah }} - {{ $e->jurusan }}</h2>
		    					<span class="position"></span>
		    					<p>
									{!! $e->deskripsi !!}

									@foreach($e->file as $f)
									@if($f->filename == true)
									<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url('{{ '/data_education/'.$f->filename }}');">
										<div class="overlay"></div>
									</div><br>
									@endif
									@endforeach
								</p>
	    					</div>
	    				</div>
	    				@endforeach
					  </div>

					  <div id="page-2" class= "page two">
						<h2 class="heading">Experience</h2>
						@foreach($experience as $ex)
						<div class="resume-wrap d-flex ftco-animate">
	    					<div class="icon d-flex align-items-center justify-content-center">
					    		<span class="flaticon-ideas"></span>
					    	</div>
					    	<div class="text pl-3">
		    					<span class="date">{{ $ex->tahun_masuk }} - 
		    					@if(is_null( $ex->tahun_selesai))
		    					{{ $ex->sekarang }}
		                        @else
		                        {{ $ex->tahun_selesai }}
		                        @endif</span>
		    					<h2>{{ $ex->posisi}}</h2>
		    					<span class="position">{{ $ex->perusahaan }}</span>
		    					<p>{!! $ex->deskripsi !!}</p>
		    				</div>
						</div>
						@endforeach

						
					  </div>
					  <div id="page-3" class= "page three">
					  	<h2 class="heading">Skills</h2>
					  	<div class="row">
					  		<div class="col-md-6 animate-box">
									<div class="progress-wrap ftco-animate">
										<h3>CorelDraw</h3>
										<div class="progress">
										 	<div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
										  	aria-valuemin="0" aria-valuemax="100" style="width:70%">
										    <span>70%</span>
										  	</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box">
									<div class="progress-wrap ftco-animate">
										<h3>jQuery</h3>
										<div class="progress">
										 	<div class="progress-bar color-2" role="progressbar" aria-valuenow="85"
										  	aria-valuemin="0" aria-valuemax="100" style="width:70%">
										    <span>70%</span>
										  	</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box">
									<div class="progress-wrap ftco-animate">
										<h3>HTML5</h3>
										<div class="progress">
										 	<div class="progress-bar color-3" role="progressbar" aria-valuenow="95"
										  	aria-valuemin="0" aria-valuemax="100" style="width:80%">
										    <span>80%</span>
										  	</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box">
									<div class="progress-wrap ftco-animate">
										<h3>CSS3</h3>
										<div class="progress">
										 	<div class="progress-bar color-4" role="progressbar" aria-valuenow="90"
										  	aria-valuemin="0" aria-valuemax="100" style="width:70%">
										    <span>70%</span>
										  	</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box">
									<div class="progress-wrap ftco-animate">
										<h3>Java</h3>
										<div class="progress">
										 	<div class="progress-bar color-5" role="progressbar" aria-valuenow="70"
										  	aria-valuemin="0" aria-valuemax="100" style="width:70%">
										    <span>70%</span>
										  	</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 animate-box">
									<div class="progress-wrap ftco-animate">
										<h3>MySQL</h3>
										<div class="progress">
										 	<div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
										  	aria-valuemin="0" aria-valuemax="100" style="width:80%">
										    <span>80%</span>
										  	</div>
										</div>
									</div>
								</div>
					  	</div>
					  </div>
					  <div id="page-4" class= "page four">
					    <h2 class="heading">Certificate</h2>
					    @foreach($certificate as $c)
					    <div class="resume-wrap d-flex ftco-animate">
					    	<div class="icon d-flex align-items-center justify-content-center">
					    		<span class="flaticon-ideas"></span>
					    	</div>
					    	<div class="text pl-3">
		    					<span class="date">{!! substr($c['bulan_terbit'], 5) !!} - {{ $c->tahun_terbit }}</span>
		    					<h2>{{ $c->certificate }}</h2>
		    					<span class="position">{{ $c->penerbit }}</span>
		    					<p>
									<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url('{{ '/data_certificate/'.$c->file }}');">
										<div class="overlay"></div>
										<div class="text text-center p-4">
											<h3><a href="https://www.sololearn.com/Certificate/1060-15806535/pdf/" target="_blank">SQL Fundamentals Course</a></h3>
											<span>SoloLearn - 2019</span>
										</div>
									</div>
								</p>
	    					</div>
						</div>
						@endforeach
					  </div>
					</div>
			  </div>
    	</div>
    </section>

    <section class="ftco-section" id="services-section">
    	<div class="container-fluid px-md-5">
    		<div class="row justify-content-center py-5 mt-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Projects</h1>
            <h2 class="mb-4">Projects</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore non, officiis quia animi deserunt facilis a dicta distinctio dignissimos optio explicabo, quas ea tempora adipisci similique porro! Quibusdam, amet et?</p>
          </div>
        </div>
    		<div class="row">
					<div class="col-md-4 text-center d-flex ftco-animate">
						<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/project1.jpg);">
							<div class="overlay"></div>
							<div class="text text-center p-4">
								<h3><a href="#">Branding &amp; Illustration Design</a></h3>
								<span>Web Design</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/project2.jpg);">
							<div class="overlay"></div>
							<div class="text text-center p-4">
								<h3><a href="#">Branding &amp; Illustration Design</a></h3>
								<span>Web Design</span>
							</div>
						</div>
					</div>
					<!-- <div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-ideas"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Web Developer</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							</div>
						</a>
					</div>

					<div class="col-md-4 text-center d-flex ftco-animate">
					<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/project1.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
					</div>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-ux-design"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Branding</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							</div>
						</a>
					</div>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-idea"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Product Strategy</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							</div>
						</a>
					</div> -->
				</div>
    	</div>
    </section>
 

    <!-- <section class="ftco-section ftco-project" id="projects-section">
    	<div class="container-fluid px-md-0">
    		<div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Projects</h1>
            <h2 class="mb-4">Our Projects</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
    		<div class="row no-gutters">
    			<div class="col-md-4">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/project1.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
  				</div>
  				<div class="col-md-4">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/project2.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
				</div>
				  

    			<div class="col-md-4">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/work-3.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/work-4.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/work-5.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(assets/images/work-6.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section> -->
<!-- 
    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
    	<div class="container-fluid px-md-5">
				<div class="row d-md-flex align-items-center">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="100">0</strong>
                <span>Awards</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="1200">0</strong>
                <span>Complete Projects</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="1200">0</strong>
                <span>Happy Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="500">0</strong>
                <span>Cups of coffee</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

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
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  
  <script src="assets/js/main.js"></script>
    
  </body>
</html>