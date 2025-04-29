<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>logo</title>
    @if(isset($_POST['downloads']))
      <link href="Theme-omega/css/bootstrap.min.css" rel="stylesheet">
       @else
         <link href="{{asset('public/Theme-omega/css/bootstrap.min.css')}}" rel="stylesheet">
    @endif

     @if(isset($_POST['downloads']))
      <link href="Theme-omega/css/style.css" rel="stylesheet">
       @else
         <link href="{{asset('public/Theme-omega/css/style.css')}}" rel="stylesheet">
    @endif

     @if(isset($_POST['downloads']))
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
       @else
           <link href="{{asset('public/Theme-standard/fontawesome/css/font-awesome.css')}}" rel="stylesheet">
    @endif

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style type="text/css">
        span.pricebox {
   
                 font-size: 25px;
    
        }
    </style>
</head>
<body>
    <?php $user = Session::get('user'); ?>
    @if(isset($_POST['downloads']))
      <section class="banner" style="background: url(image/{{$website->bannerimg}}) no-repeat;">
       @else
            <section id="home" class="banner" style="background: url({{ asset('public/uploads/website/themes'.$user->userId.'/' . $website->bannerimg) }}) no-repeat;">
    @endif
   
        <div class="box_higet">
            <header id="myHeader" class="header d-flex flex-wrap justify-content-between py-3">
                <div class="container">
                    <div class="row">
                        <a href="/" class="logo_bg text-center align-items-center col-lg-2 col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
                            @if(isset($_POST['downloads']))
                              <img class="logo" src="image/{{$website->logoimg}}" />
                               @else
                                 <img class="logo" src="{{ asset('public/uploads/website/themes'.$user->userId.'/' . $website->logoimg) }}" />
                            @endif
                           
                        </a>
                        <ul class="nav col-12 col-lg-10 col-md-10 col-md-auto mb-2 justify-content-end mb-md-0 m-hide">
                            <li><a href="#home" class="nav-link px-2 link-secondary">Home</a></li>
                            <li><a href="#about-us-id" class="nav-link px-2 link-dark">About</a></li>
                            <li><a href="#menu-id" class="nav-link px-2 link-dark">Menu</a></li>
                            <li><a href="#whywebest-id" class="nav-link px-2 link-dark">Why Choose Us</a></li>
                            <li><a href="#testimonal-id" class="nav-link px-2 link-dark">Testimonal</a></li>
                            
                            <li><a href="#Gallery-id" class="nav-link px-2 link-dark">Gallery</a></li>
                           
                            <li class="contactinfoh">
                                <span>+{{$theme->Phone_no}} <br /> <em>Contact us for reservation </em></span>
                            </li>
                             <li>
                               
                               <a href="#booktable-id"> <button type="button" class="btn btndefultt bgred">Book Table</button>
                               </a>
                            </li>
                             
                        </ul>
						
						<span class="mobile-menu" onclick="openNav()">&#9776;</span>
						<div id="mySidenav" class="sidenav">
						  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						  <ul class="nav col-12 col-lg-10 col-md-10 col-md-auto mb-2 justify-content-end mb-md-0">
                            <li><a href="#home" class="nav-link px-2 link-secondary">Home</a></li>
                            <li><a href="#about-us-id" class="nav-link px-2 link-dark">About</a></li>
                            <li><a href="#menu-id" class="nav-link px-2 link-dark">Menu</a></li>
                            <li><a href="#whywebest-id" class="nav-link px-2 link-dark">Why Choose Us</a></li>
                            <li><a href="#testimonal-id" class="nav-link px-2 link-dark">Testimonal</a></li>
                            
                            <li><a href="#Gallery-id" class="nav-link px-2 link-dark">Gallery</a></li>
                           
                            <li class="contactinfoh">
                                <span>+{{$theme->Phone_no}} <br /> <em>Contact us for reservation </em></span>
                            </li>
                             <li>
                               <a href="#booktable-id"> <button type="button" class="btn btndefultt bgred">Book Table</button>
                               </a>
                            </li>
                             
                        </ul>
						</div>

                    </div>
                </div>
            </header>
        </div>
        <div class="container">
            <div class="banner_text">
                <span>{{$theme->bannerTitle}} </span>
                <h1>{{$theme->bannerSubTitle}}</h1>
                <p>{{$theme->bannerContent}}</p>
                  @if(!empty($theme->foodbeelink))
				<a class="buttonclick bgred" href="{{$theme->foodbeelink}}">Liefer Service (DELIVERY)</a>
				@endif
                <a class="buttonclick bgred" href="#booktable-id">Book a Table</a>
            </div>
        </div>
    </section>
    <section class="about_us" id="about-us-id">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <span class="stepss">
                        @if(isset($_POST['downloads']))
                             <img src="Theme-omega/images/img1.png" /><p>{{$theme->service1}}</p>
                               @else
                                <img src="{{asset('public/Theme-omega/images/img1.png')}}" /><p>{{$theme->service1}}</p>
                            @endif
                         @if(isset($_POST['downloads']))
                            <img class="positionss" src="Theme-omega/images/img1.png" />
                               @else
                                <img class="positionss" src="{{asset('public/Theme-omega/images/img1.png')}}" />
                            @endif
                    </span>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span class="stepss">
                         @if(isset($_POST['downloads']))
                             <img src="Theme-omega/images/247.png" /><p>{{$theme->service2}}</p>
                               @else
                                <img src="{{asset('public/Theme-omega/images/247.png')}}" /><p>{{$theme->service2}}</p>
                            @endif
                        @if(isset($_POST['downloads']))
                             <img class="positionss" src="Theme-omega/images/247.png" />
                               @else
                                 <img class="positionss" src="{{asset('public/Theme-omega/images/247.png')}}" />
                            @endif
                        
                       
                    </span>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span class="stepss">
                        @if(isset($_POST['downloads']))
                             <img src="Theme-omega/images/stepn.png" /><p>{{$theme->service3}}</p>
                               @else
                                 <img src="{{asset('public/Theme-omega/images/stepn.png')}}" /><p>{{$theme->service3}}</p>
                            @endif
                        @if(isset($_POST['downloads']))
                            <img class="positionss" src="Theme-omega/images/stepn.png" />
                               @else
                                 <img class="positionss" src="{{asset('public/Theme-omega/images/stepn.png')}}" />
                            @endif
                        
                        
                    </span>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span class="stepss">
                        @if(isset($_POST['downloads']))
                              <img src="Theme-omega/images/qult.png" /><p>{{$theme->service4}}</p>
                               @else
                                  <img src="{{asset('public/Theme-omega/images/qult.png')}}" /><p>{{$theme->service4}}</p>
                            @endif
                        @if(isset($_POST['downloads']))
                            <img class="positionss" src="public/Theme-omega/images/qult.png" />
                               @else
                                 <img class="positionss" src="{{asset('public/Theme-omega/images/qult.png')}}" />
                            @endif
                
                    </span>
                </div>
            </div>
            <div class="box_abouts">
                <div class="row">
                    <div class="col-md-12 col-xl-6 col-xxl-6 col-lg-6 padingleftss">
                        <span>About Us </span>
                         @if(isset($_POST['downloads']))
                             <img src="Theme-omega/images/aboutus.png" />
                               @else
                                  <img src="{{asset('public/Theme-omega/images/aboutus.png')}}" />
                            @endif
                       
                        <h2>Come to our Restaurant, <br />Ready Your Food</h2>
                        <p>
                            {{$theme->aboutUsContent}}
                        </p>
                        <a class="buttonclick bgred" href="#booktable-id">Book a Table</a>
                        
                        @if(!empty($theme->videoLink))
                        @if(isset($_POST['downloads']))
                            <a href="{{$theme->videoLink}}" class="watchvideo"><img src="Theme-omega/images/watch.png"/> Watch Video</a>
                        <img class="wdthboxx" src="Theme-omega/images/iconsss.png" />
                               @else
                                  <a href="{{$theme->videoLink}}" class="watchvideo"><img src="{{asset('public/Theme-omega/images/watch.png')}}"/> Watch Video</a>
                        <img class="wdthboxx" src="{{asset('public/Theme-omega/images/iconsss.png')}}" />
                            @endif
                            @endif
                        
                    </div>
                    <div class="col-md-12 col-xl-6 col-xxl-6 col-lg-6">
                        <?php $aboutus = explode("|",$website->aboutusimage);?>
                             @foreach($aboutus as $about)
                              @if(isset($_POST['downloads']))
                            <img class="img-fluid" src="image/{{$about}}" />
                               @else
                               <img class="img-fluid" src="{{ asset('public/uploads/website/themes'.$user->userId.'/' . $about) }}" />
                            @endif
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="menu">
        <div class="container">
            <div class="box_menu">
                <div class="box_menu_inner">
                    <h2 class="menuheadingd">Our Food Menu</h2>
                    <!--p class="subtitle_menu">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    </p-->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                    @foreach ($tabmenu as $key => $menu)
                    <li class="nav-item" role="presentation" >
                      <a class="nav-link {{ $key == 0 ? 'active' : '' }}"  style="padding:8px 50px !important;{{ $key == 0 ? '' : 'color:#000 !important' }}" data-bs-toggle="tab" style="" href="#tab{{ $key }}" role="tab"><!--img src="public/Theme-omega/images/tab1.png" /-->{{ $menu->category }}</a>
                    </li>
                    @endforeach
                      
                    </ul>
                    <div class="tab-content" id="myTabContent">
                       
                    @foreach ($tabmenu as $key => $tab)
                    
                    <div id="tab{{$key }}" class="tab-pane {{ $key == 0 ? 'active' : '' }}">

                            <ul class="box_menus">

                            @foreach($tabmenuitem  as $item)

                            @if($tab->catId==$item->catId)
                                <li>
                                    <span class="price_box">
                                        <h2>{{$item->name}}</h2>
                                        <span class="line"></span>
                                        <span class="pricebox">{{$item->price}}&euro;</span>
                                    </span>
                                    <!--span class="textbx">
                                        <!--p>
                                            Toasted French bread topped with romano, cheddar 560 CAL
                                        </p>
                                    </span-->
                                </li>
                                @endif

                            @endforeach

                            </ul>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </section>
    
    <section class="about_us whywebest" id="whywebest-id">
        <div class="container">
            <div class="box_abouts">
                <div class="row">
                    <div class="col-md-12 col-xl-6 col-xxl-6 col-lg-6">
                        <?php $whyweare = explode("|",$website->whyweareimage);?>
                        @foreach($whyweare as $whywe)
                        @if(isset($_POST['downloads']))
                        <img class="img-fluid" src="image/{{$whywe}}" />
                           @else
                             <img class="img-fluid" src="{{ asset('public/uploads/website/themes'.$user->userId.'/' . $whywe) }}" />
                        @endif
                        
                        @endforeach
                    </div>
                    <div class="col-md-12 col-xl-6 col-xxl-6 col-lg-6 padingleftss">
                        <span>Why Choose Us </span>
                        @if(isset($_POST['downloads']))
                        <img src="Theme-omega/images/aboutus.png" />
                           @else
                             <img src="{{asset('public/Theme-omega/images/aboutus.png')}}" />
                        @endif
                       
                        <h2>Why We Are the Best?</h2>
                        <p>
                            {{$theme->whyweeAreContent}}
                        </p>
                        <a class="buttonclick bgred menusss" href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonal" id="testimonal-id">
        <div class="container">
            <span>Testimonials </span>
            @if(isset($_POST['downloads']))
                        <img class="bootmvodx rgallerys" src="Theme-omega/images/whiteaboutus.png" />
                           @else
                              <img class="bootmvodx rgallerys" src="{{asset('public/Theme-omega/images/whiteaboutus.png')}}" />
                        @endif
           
            <h2>Customer Review</h2>
            <div class="row">
                 <?php $name = explode("|",$theme->name);?>

           <?php $review = explode("|",$theme->Review);?>
                @foreach($review as $key => $reviews)
                <div class="col-md-6">
                    <div class="boxtestmin">
                        <div class="boxtestmin1">
                            @if(isset($_POST['downloads']))
                            <img class="img1" src="Theme-omega/images/coma1.png" />
                           @else
                             <img class="img1" src="{{asset('public/Theme-omega/images/coma1.png')}}" />
                        @endif
                            
                            <p>
                                {{$reviews}}

                            </p>
                            <div class="imgboxtestmonal">
                                 @if(isset($_POST['downloads']))
                             <img height="83px" width="79px" src="Theme-omega/images/icon-thumbnail.png" style="border-radius: 25%;" />
                           @else
                              <img height="83px" width="79px" src="{{asset('public/image/icon-thumbnail.png')}}" style="border-radius: 25%;" />
                        @endif
                                
                                <span>{{$name[$key]}}</span>
                                <p class="">Customer</p>
                            </div>
                            @if(isset($_POST['downloads']))
                            <img class="img1" src="Theme-omega/images/coma2.png" />
                           @else
                             <img class="img1" src="{{asset('public/Theme-omega/images/coma2.png')}}" />
                        @endif
                             
                        </div>
                    </div>
                </div>
                  @endforeach
               <!--  <div class="col-md-6">
                    <div class="boxtestmin">
                        <div class="boxtestmin1">
                            <img class="img1" src="Theme-omega/images/coma1.png" />
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

                            </p>
                            <div class="imgboxtestmonal">
                                <img src="Theme-omega/images/testimg.png" />
                                <span>Theresa Jordan</span>
                                <p class="">Customer</p>
                            </div>
                            <img class="img2" src="Theme-omega/images/coma2.png" />
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    <section class="Gallery" id="Gallery-id">
        <div class="container">
            <span>Our Gallery </span>
            @if(isset($_POST['downloads']))
                <img class="bootmvodx" src="Theme-omega/images/aboutus.png" />
               @else
                 <img class="bootmvodx" src="{{asset('public/Theme-omega/images/aboutus.png')}}" />
            @endif
           
            <h2>Restaurant Gallery</h2>
            <div class="row">
                <?php $gallery = explode("|",$website->galleryimage);?>
                    @foreach($gallery as $gall)
                    <div class="img1 col-xxl-4 col-md-4">
                        @if(isset($_POST['downloads']))
                        <img class="img-fluid" src="image/{{$gall}}" />
                        @else
                        <img class="img-fluid" src="{{ asset('public/uploads/website/themes'.$user->userId.'/' . $gall) }}" />
                        @endif
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
    <?php $BookTable = explode("|",$website->BookTableimage);?>
        @foreach($BookTable as $Book)
         @if(isset($_POST['downloads']))
               <section class="booktable" style="background: url(image/{{$Book}})">
               @else
                  <section class="booktable" style="background: url({{ asset('public/uploads/website/themes'.$user->userId.'/' . $Book) }})">
            @endif
    
        @endforeach
        <div class="container" id="booktable-id">
            <div class="box_menu">
                <div class="box_menu_inner">
                    <h2>Book A Table</h2>
                    <p class="subtitle_menu">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                    </p>
                     <form>
                            <input class="form-control" id="code_id" type="hidden" name="code" value="<?= $user->code; ?>" data-sb-validations="required" />
                            
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <input placeholder="Name" id="name" type="text" name="name" class="form-control" />
                                   
                                </div>
                                <div class="col-md-6">
                                    <input placeholder="Email" type="email" id="email" name="email" class="form-control" />
                                    
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <input placeholder="Phone" id="phone_no" name="phone_no" type="number"  class="form-control" />
                                    
                                </div>

                                <div class="col-md-6">
                                    <input placeholder="" id="booking_date" name="booking_date" type="date" class="form-control" />
                                    
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <input placeholder="Time Slot" name="slot" id="slot" type="time" class="form-control" />
                                     
                                </div>
                                <div class="col-md-6">
                                    <input placeholder="People" name="no_of_person" id="no_of_person" type="text" class="form-control" />
                                    
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="message" name="message" placeholder="message"></textarea>
                                   
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <button class="submitbook" id="submitButton">BOOK NOW</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </section>
    <div class="contacttime">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-lg-4">
                       <div class="boxcontactus">
                           <h2>Contact Us</h2>
                           <span><i class="fa fa-phone" aria-hidden="true"></i> {{$theme->Phone_no}}</span>
                           <span class="emailbg">Email: {{$theme->email}}</span>
                           <a href="#">BOOK A TABLE</a>
                       </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <div class="boxcontactusnew">
                        @if(isset($_POST['downloads']))
                          <img src="Theme-omega/images/locat.png" />
                           @else
                             <img src="{{asset('public/Theme-omega/images/locat.png')}}" />
                        @endif
                        
                        <h3>Get Direction</h3>
                        <span>
                            {{$theme->address}}
                        </span>
                        <a href="#">BOOK NOW</a>
                    </div>
                    </div>
                    <div class="col-xxl-4 col-lg-4">
                        <div class="oppenhours">
                            <h2>Opening Hours</h2>
                            <span>{{$theme->opening_time}}</span>
                          
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <footer>
         @if(isset($_POST['downloads']))
       @else
        <span id="hide_div" class="" >@include('exportTheme.sticky_icon')</span>
        @endif
        <div class="container">
            <div class="footer_box">
                <div class="row">
                    <div class="col-xxl-3 col-lg-3">
                        <div class="boxlogo">
                            @if(isset($_POST['downloads']))
                          <img src="image/{{$website->logoimg}}" />
                           @else
                             <img src="{{ asset('public/uploads/website/themes'.$user->userId.'/' . $website->logoimg) }}" />
                        @endif
                            
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-5">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed<br />
                            Ut enim ad minim veniam, quis nostrud
                        </p>
                    </div>
                    <!-- <div class="col-xxl-3 col-lg-4">
                        <div class="boxsecription"><input type="text" placeholder="Enter Your Email" /><button>
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button></div>
                    </div> -->
                </div>

            </div>
            <div class="row">
                <div class="col-md-4 col-xl-4 col-lg-3">
                    <p>© Copyright 2023.logo.com. All Right Reserved</p>
                </div>
                <div class="col-md-8 col-xl-4 col-lg-5">
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#about-us-id" class="nav-link px-2 link-secondary">About Us </a></li>
                        <li><a href="#whywebest-id" class="nav-link px-2 link-dark">Why We Best</a></li>
                        <li><a href="#menu-id" class="nav-link px-2 link-dark">Our Menu</a></li>
              
                    </ul>
                </div>
                <div class="col-md-12 col-xl-4 col-lg-4">
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link px-2 link-secondary">Impressum</a></li>
                        <li><a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal2"  class="nav-link px-2 link-dark">Datenshutz</a></li>
                     
                    </ul>
                </div>
            </div>
        </div>
    </footer>
      <!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="menu-ingredients" style="color: #a7613a;
    font-family: Lora,serif;" id="exampleModalLabel2">Datenschutzerklärung
</h2>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
   <p>
   Wir messen dem Datenschutzgroße Bedeutung bei. Die Erhebung und Verarbeitung Ihrer personenbezogenenDaten geschieht unter Beachtung der geltenden datenschutzrechtlichen Vorschriften,insbesondere der EU-Datenschutzgrundverordnung (DSGVO). Wir erheben undverarbeiten Ihre personenbezogenen Daten, um Ihnen das oben genannten Portal anbietenzu können. Diese Erklärung beschreibt, wie und zu welchem Zweck Ihre Daten erfasstund genutzt werden und welche Wahlmöglichkeiten Sie im Zusammenhang mit persönlichenDaten haben.</p>

<p>Durch Ihre Verwendungdieser Website stimmen Sie der Erfassung, Nutzung und Übertragung Ihrer Datengemäß dieser Datenschutzerklärung zu.
   </p>
<div class=""><h5 style="color:#a7613a;">Verantwortliche Stelle</h5></div>
<p>Verantwortliche Stelle fürdie Erhebung, Verarbeitung und Nutzung Ihrer personenbezogenen Daten im Sinneder DSGVO ist</p>

<p>{{$theme->address}}</p>

<p>Deutschland</p>
<p>Telefon: <span style="color:#a7613a;">{{$theme->Phone_no}}</span></p>
<p>E-Mail: <span style="color:#a7613a;">{{$theme->email}}</span></p>
<p>Sofern Sie der Erhebung,Verarbeitung oder Nutzung Ihrer Daten durch uns nach Maßgabe dieserDatenschutzbestimmungen insgesamt oder für einzelne Maßnahmen widersprechen wollen,können Sie Ihren Widerspruch an oben genannte verantwortliche Stelle richten.</p>

<p>Sie können diese Datenschutzerklärungjederzeit speichern und ausdrucken.</p>
<div class=""><h5 style="color:#a7613a;" >Zugriffsdaten - Server-Logfiles</h5></div>
<p>
Sie könnenunsere Webseiten besuchen, ohne Angaben zu Ihrer Person zu machen. Es werdenbei jedem Zugriff auf unsere Website Nutzungsdaten durch Ihren Internetbrowserübermittelt und in Protokolldaten (Server-Logfiles) gespeichert.</p>
<p>Zu diesengespeicherten Daten gehören z.B. Name der aufgerufenen Seite,Browsertyp und Browserversion, Betriebssystem , Refeffer , Datum und Uhrzeit des Abrufs, übertragene DatenmengeIP-Adresse und der anfragende Provider. Diese Daten dienen ausschließlich derGewährleistung eines störungsfreien Betriebs unserer Website und zurVerbesserung unseres Angebotes. Eine Zuordnung dieser Daten zu einer bestimmtenPerson ist nicht möglich.</p>

<div class=""><h5 style="color:#a7613a;">Erhebung Und Verarbeitung Bei Nutzung Des Kontaktformulars</h5></div>
<p>Bei derNutzung des Kontaktformulars erheben wir Ihre personenbezogenen Daten (Name,E-Mail-Adresse, Nachrichtentext, Bestellung) nur in dem von Ihnen zur Verfügunggestellten Umfang. Die Datenverarbeitung dient dem Zweck der Kontaktaufnahme.</p>

<p>Mit AbsendenIhrer Nachricht willigen Sie in die Verarbeitung der übermittelten Daten ein.</p>

<p>DieVerarbeitung erfolgt auf Grundlage des Art. 6 (1) lit. a DSGVO mit IhrerEinwilligung.</p>

<p>Sie könnenIhre Einwilligung jederzeit durch Mitteilung an uns widerrufen, ohne dass die Rechtmäßigkeitder aufgrund der Einwilligung bis zum Widerruf erfolgten Verarbeitung berührtwird. Ihre E-Mail-Adresse nutzen wir nur zur Bearbeitung Ihrer Anfrage und /oder Bestellung. Ihre Daten werden anschließend gespeichert um bei einerFolgebestellung schnelleren Service leisten zu können.</p>

<p>Die Datenwerden gelöscht, sofern Sie der weitergehenden Verarbeitung und Nutzung nichtzugestimmt haben.</p>

<div class=""><h5 style="color:#a7613a;">Kundenkonto</h5></div>

<p>Bei derEröffnung eines Kundenkontos erheben wir Ihre personenbezogenen Daten in demdort angegeben Umfang. Die Datenverarbeitung dient dem Zweck, IhrEinkaufserlebnis zu verbessern und die Bestellabwicklung zu vereinfachen.</p>
<p> DieVerarbeitung erfolgt auf Grundlage des Art. 6 (1) lit. a DSGVO mit IhrerEinwilligung. Sie können Ihre Einwilligung jederzeit durch Mitteilung an unswiderrufen, ohne dass die Rechtmäßigkeit der aufgrund der Einwilligung bis zumWiderruf erfolgten Verarbeitung berührt wird. Ihr Kundenkonto wird anschließendgelöscht.</p>
<div class=""><h5 style="color:#a7613a;">Erhebung, Verarbeitung Und Nutzungpersonenbezogener Daten Bei Bestellungen</h5></div>
<p>Bei derBestellung erheben und verwenden wir Ihre personenbezogenen Daten nur, soweitdies zur Erfüllung und Abwicklung Ihrer Bestellung sowie zur Bearbeitung IhrerAnfragen erforderlich ist. Die Bereitstellung der Daten ist für denVertragsschluss erforderlich. Eine Nichtbereitstellung hat zur Folge, dass keinVertrag geschlossen werden kann.

DieVerarbeitung erfolgt auf Grundlage des Art. 6 (1) lit. b DSGVO und ist für dieErfüllung eines.

Vertrags mitIhnen erforderlich. Eine Weitergabe Ihrer Daten an Dritte ohne Ihreausdrückliche Einwilligung erfolgt nicht. Ausgenommen hiervon sind lediglichunsere Dienstleistungspartner, die wir zur Abwicklung des Vertragsverhältnissesbenötigen oder Dienstleister derer wir uns im Rahmen einer Auftragsverarbeitungbedienen.

Neben den inden jeweiligen Klauseln dieser Datenschutzerklärung benannten Empfängern sinddies beispielsweise Empfänger folgender Kategorien: Versanddienstleister,Zahlungsdienstleister,

Warenwirtschaftsdienstleister,Dienstanbieter für die Bestellabwicklung, Webhoster, IT-Dienstleister undDropshipping Händler. In allen Fällen beachten wir strikt die gesetzlichenVorgaben.

Der Umfangder Datenübermittlung beschränkt sich auf ein Mindestmaß.</p>

<div class=""><h5 style="color:#a7613a;">Verwendung Der E-Mail-Adresse Für DieZusendung Von Newslettern</h5></div>
<p>Wir nutzenIhre E-Mail-Adresse unabhängig von der Vertragsabwicklung ausschließlich füreigene Werbezwecke zum Newsletterversand, sofern Sie dem ausdrücklichzugestimmt haben. Die Verarbeitung erfolgt auf Grundlage des Art. 6 (1) lit. aDSGVO mit Ihrer Einwilligung. Sie könnendie Einwilligung jederzeit widerrufen, ohne dass die Rechtmäßigkeit deraufgrund der Einwilligung bis zum Widerruf erfolgten Verarbeitung berührt wird.Sie können dazu den Newsletter jederzeit unter Nutzung des entsprechenden Linksim Newsletter oder durch Mitteilung an uns abbestellen. Ihre E-Mail-Adressewird danach aus dem Verteiler entfernt.</p>

<div class=""><h5 style="color:#a7613a;">Verwendung Der E-Mail-Adresse Für DieZusendung Von Direktwerbung </h5></div>
<p>Wir nutzenIhre E-Mail-Adresse, die wir im Rahmen des Verkaufes einer Ware oderDienstleistung erhalten haben, für die elektronische Übersendung von Werbungfür eigene Waren oder Dienstleistungen, die denen ähnlich sind, die Sie bereitsbei uns erworben haben, soweit Sie dieser Verwendung nicht widersprochen haben.Die Bereitstellung der E-Mail-Adresse ist für den Vertragsschluss erforderlich.Eine Nichtbereitstellung hat zur Folge, dass kein Vertrag geschlossen werden kann.Die Verarbeitung erfolgt auf Grundlage des Art. 6 (1) lit. f DSGVO aus dem berechtigten Interesse anDirektwerbung.</p>

<p>Siekönnen dieser Verwendung Ihrer E-Mail-Adresse jederzeit durch Mitteilung an unswidersprechen. Die Kontaktdaten für die Ausübung des Widerspruchs finden Sie imImpressum. Sie können auch den dafür vorgesehenen Link in derWerbe-E-Mail nutzen. Hierfür entstehen keine anderen als dieÜbermittlungskosten nach den Basistarifen.</p>

<div class=""><h5 style="color:#a7613a;">Weitergabe Der E-Mail-Adresse AnVersandunternehmen Zur Information Über Den Versandstatus</h5></div>
<p>Wir gebenIhre E-Mail-Adresse im Rahmen der Vertragsabwicklung an dasTransportunternehmen , den Lieferdienst oder den Fahrer weiter, sofern Sie dem ausdrücklich im Bestellvorgangzugestimmt haben. Die Weitergabe dient dem Zweck, Sie per E-Mail über denVersandstatus zu informieren. Die Verarbeitung erfolgt auf Grundlage des Art. 6(1) lit. a DSGVO mit Ihrer Einwilligung. Sie können die Einwilligung jederzeitdurch Mitteilung an uns widerrufen, ohne dass die Rechtmäßigkeit der aufgrundder Einwilligung bis zum Widerruf erfolgten Verarbeitung berührt wird.</p>

<div class=""><h5 style="color:#a7613a;">Cookies</h5></div>
<p>UnsereWebsite verwendet Cookies. Wir setzen Cookies zu dem Zweck ein, unser Angebotnutzerfreundlicher, effektiver und sicherer zu machen. Cookies sind kleineTextdateien, die vom Internetbrowser auf dem Computersystem eines Nutzersgespeichert werden. Ruft ein Nutzer eine Website auf, so kann ein Cookie aufdem Betriebssystem des Nutzers gespeichert werden. Dieser Cookie enthält einecharakteristische Zeichenfolge, die eine eindeutige Identifizierung desBrowsers beim erneuten Aufrufen der Website ermöglicht.</p>

<p>Des Weiterenermöglichen Cookies unseren Systemen, Ihren Browser auch nach einem.</p>

<p>Seitenwechselzu erkennen und Ihnen Services anzubieten. Einige Funktionen unserer Webseitekönnen ohne den Einsatz von Cookies nicht angeboten werden. Für diese ist eserforderlich, dass der Browser auch nach einem Seitenwechsel wiedererkanntwird.</p>

<p>Wir verwendenauf unserer Website darüber hinaus Cookies zu dem Zweck, eine Analyse desSurfverhaltens unserer Seitenbesucher zu ermöglichen. Des Weiteren verwendenwir Cookies zu dem Zweck, Seitenbesucher anschließend auf anderen Webseiten mitgezielter, interessenbezogener Werbung anzusprechen.</p>

<p>DieVerarbeitung erfolgt auf Grundlage des § 15 (3) TMG sowie Art. 6 (1) lit. fDSGVO aus dem berechtigten Interesse an den oben genannten Zwecken. Die aufdiese Weise von Ihnen erhobenen Daten werden durch technische Vorkehrungenpseudonymisiert. Eine Zuordnung der Daten zu Ihrer Person ist daher nicht mehrmöglich. Die Daten werden nicht gemeinsam mit sonstigen personenbezogenen Datenvon Ihnen gespeichert.</p>

<p>Siehaben das Recht aus Gründen, die sich aus Ihrer besonderen Situation ergeben,jederzeit dieser auf Art. 6 (1) f DSGVO beruhenden Verarbeitung Siebetreffender personenbezogener Daten zu widersprechen. Cookieswerden auf Ihrem Rechner gespeichert. Daher haben Sie die volle Kontrolle überdie Verwendung von Cookies. Durch die Auswahl entsprechender technischerEinstellungen in Ihrem Internetbrowser können Sie die Speicherung der Cookiesund Übermittlung der enthaltenen Daten verhindern. Bereits gespeicherte Cookieskönnen jederrzeit gelöscht werden. Wir weisen Sie jedoch darauf hin, dass Siedann gegebenenfalls nicht sämtliche Funktionen dieser Website vollumfänglichwerden nutzen können.</p>

<p>Unter dennachstehenden Links können Sie sich informieren, wie Sie die Cookies bei denwichtigsten Browsern verwalten (u.a. auch deaktivieren) können:</p>

<div class=""><h5 style="color:#a7613a;">Chrome Browser:</h5></div>

<p><a>https://support.google.com/accounts/answer/61416?hl=de</a></p>

<div class=""><h5 style="color:#a7613a;">InternetExplorer:</h5></div>
<p><a>
https://support.microsoft.com/de-de/help/17442/windows-internet-explorer-delete-manage-cookies</a></p>

<div class=""><h5 style="color:#a7613a;">Mozilla Firefox:</h5></div>
<a>
https://support.mozilla.org/de/kb/cookies-erlauben-und-ablehnen</a></p>

<div class=""><h5 style="color:#a7613a;">Safari:</h5></div>
<p><a>
https://support.apple.com/de-de/guide/safari/manage-cookies-and-website-data-sfri11471/mac</a></p>

<div class=""><h5 style="color:#a7613a;">Nutzung Von Google Analytics</h5></div>
<p>Wir verwendenauf unserer Website den Webanalysedienst Google Analytics der Google Inc. (1600Amphitheatre Parkway, Mountain View, CA 94043, USA; „Google“). DieDatenverarbeitung dient dem Zweck der Analyse dieser Website und ihrerBesucher. Dazu wird Google im Auftrag des Betreibers dieser Website diegewonnenen Informationen benutzen, um Ihre Nutzung der Website auszuwerten, umReports über die Websiteaktivitäten.</p>
<p>
zusammenzustellenund um weitere, mit der Websitenutzung und der Internetnutzung verbundeneDienstleistungen gegenüber dem Websitebetreiber zu erbringen. Die im Rahmen vonGoogle Analytics von Ihrem Browser übermittelte IP-Adresse wird nicht mitanderen Daten von Google zusammengeführt.Google Analytics verwendet Cookies,die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch dieCookies erzeugten Informationen über Ihre Benutzung dieser Website werden inder Regel an einen Server von Google in den USA übertragen und dortgespeichert. Auf dieser Website ist die IP-Anonymisierung aktiviert. Dadurchwird Ihre IP-Adresse von Google innerhalb von Mitgliedstaaten der EuropäischenUnion oder in anderen Vertragsstaaten des Abkommens über den EuropäischenWirtschaftsraum zuvor gekürzt. Nur in Ausnahmefällen wird die volle IP-Adressean einen Server von Google in den USA übertragen und dort gekürzt.</p>
<p>
Ihre Datenwerden gegebenenfalls in die USA übermittelt. Für Datenübermittlungen in dieUSA ist ein Angemessenheitsbeschluss der Europäischen Kommission vorhanden. DieVerarbeitung erfolgt auf Grundlage des Art. 6 (1) lit. f DSGVO aus demberechtigten Interesse an der bedarfsgerechten und zielgerichteten Gestaltungder Website.</p>
<p>
Siehaben das Recht aus Gründen, die sich aus Ihrer besonderen Situation ergeben,jederzeit dieser auf Art. 6 (1) f DSGVO beruhenden Verarbeitung Siebetreffender personenbezogenerDaten zu widersprechen.</p>
<p>
Sie könnendazu die Speicherung der Cookies durch die Auswahl entsprechender technischerEinstellungen Ihrer Browser-Software verhindern . Wir weisen Sie jedoch daraufhin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieserWebsite vollumfänglich werden nutzen können. Sie können des Weiteren dieErfassung der durch das Cookie erzeugten und auf Ihre Nutzung der Websitebezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die Verarbeitungdieser Daten durch Google verhindern, indem sie das unter dem folgenden Linkverfügbare Browser-Plug-in herunterladen und installieren [https://tools.google.com/dlpage/gaoptout?hl=de].</p>

<p>Um dieErfassung durch Google Analytics geräteübergreifend zu verhindern können Sieeinen Opt-Out-Cookie setzen. Opt-Out-Cookies verhindern die zukünftigeErfassung Ihrer Daten beim Besuch dieser Website. Sie müssen das Opt-Out auf allengenutzten Systemen und Geräten.</p>

<p>durchführen,damit dies umfassend wirkt. Wenn Sie hier klicken, wird das Opt-Out-Cookiegesetzt:</p>

<p>GoogleAnalytics deaktivieren.</p>

<p>NähereInformationen zu Nutzungsbedingungen und Datenschutz finden Sie unter:</p>
</p>
https://www.google.com/analytics/terms/de.htmlbzw. unter https://www.google.de/intl/de/policies/.</p>

<div class=""><h5 style="color:#a7613a;">Verwendung Von Google AdwordsConversion-Tracking</h5></div>
<p>Wir verwendenauf unserer Website das Online-Werbeprogramm „Google AdWords“ und in diesemRahmen Conversion-Tracking (Besuchsaktionsauswertung). Das Google ConversionTracking ist ein Analysedienst der Google Inc. (1600 Amphitheatre Parkway,Mountain View, CA 94043, USA; „Google“). Wenn Sie auf eine von Googlegeschaltete Anzeige klicken, wird ein Cookie für das Conversion-Tracking aufIhrem Rechner abgelegt.</p>
<p>
Diese Cookieshaben eine begrenzte Gültigkeit, enthalten keine personenbezogenen Daten unddienen somit nicht der persönlichen Identifizierung. Wenn Sie bestimmte Seitenunserer Website besuchen und das Cookie noch nicht abgelaufen ist, könnenGoogle und wir erkennen, dass Sie auf die Anzeige geklickt haben und zu dieserSeite weitergeleitet wurden. Jeder Google AdWords-Kunde erhält ein anderes Cookie.Somit besteht keine Möglichkeit, dass Cookies über die Websites vonAdWords-Kunden nachverfolgt werden können.</p>
<p>
DieInformationen, die mit Hilfe des Conversion-Cookie eingeholt werden, dienen demZweck.</p>
<p>
Conversion-Statistikenzu erstellen. Hierbei erfahren wir die Gesamtanzahl der Nutzer, die auf eineunserer Anzeigen geklickt haben und zu einer mit einem Conversion-Tracking-Tagversehenen Seite weitergeleitet wurden. Wir erhalten jedoch keineInformationen, mit denen sich Nutzer persönlich identifizieren lassen. DieVerarbeitung erfolgt auf Grundlage des Art. 6 (1) lit. f DSGVO aus demberechtigten Interesse an zielgerichteter Werbung und der Analyse der Wirkungund Effizienz dieser Werbung.Sie haben das Recht aus Gründen, die sich ausIhrer besonderen Situation ergeben, jederzeit dieser aufArt. 6 (1) f DSGVOberuhenden Verarbeitung Sie betreffender personenbezogener Datenzuwidersprechen.</p>
<p>
Dazu könnenSie die Speicherung der Cookies durch die Auswahl entsprechender technischerEinstellungen Ihrer Browser-Software verhindern. Wir weisen Sie jedoch daraufhin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieserWebsite vollumfänglich werden nutzen können. Sie werden sodann nicht in dieConversion-Tracking Statistiken aufgenommen.</p>
<p>
Des Weiterenkönnen Sie in den Einstellungen für Werbung bei Google für Sie personalisierteWerbung deaktivieren. Eine Anleitung dazu finden Sie unter: https://support.google.com/ads/answer/2662922?hl=de.</p>
<p>
Darüberhinaus können Sie die Verwendung von Cookies durch Drittanbieter deaktivieren,indem sie die Deaktivierungsseite der Netzwerkwerbeinitiative (NetworkAdvertising Initiative) unter:</p>
<p>
https://www.networkadvertising.org/choices/aufrufen unddie dort genannten weiterführenden.</p>
<p>
Informationzum Opt-Out umsetzen. Weiterführende Informationen sowie dieDatenschutzerklärung von Google finden Sie unter:https://www.google.de/policies/privacy/.</p>

<div class=""><h5 style="color:#a7613a;">Dauer Der Speicherung</h5></div>
<p>Nachvollständiger Vertragsabwicklung werden die Daten zunächst für die Dauer derGewährleistungsfrist, danach unter Berücksichtigung gesetzlicher, insbesonderesteuer- und handelsrechtlicher Aufbewahrungsfristen gespeichert und dann nachFristablauf gelöscht, sofern Sie der weitergehenden Verarbeitung und Nutzungnicht zugestimmt haben.</p>

<div class=""><h5 style="color:#a7613a;">Rechte Der Betroffenen Person</h5></div>
<p>
Ihnen stehen bei Vorliegen der gesetzlichen Voraussetzungen folgende Rechte nach Art. 15 bis 20 DSGVO zu: Recht auf Auskunft, auf Berichtigung, auf Löschung, auf Einschränkung der Verarbeitung, auf Datenübertragbarkeit. Außerdem steht Ihnen nach Art. 21 (1) DSGVO ein Widerspruchsrecht gegen die Verarbeitungen zu, die auf Art. 6 (1) f DSGVO beruhen, sowie gegen die Verarbeitung zum Zwecke von Direktwerbung.</p>
<p>
Kontaktieren Sie uns auf Wunsch. Die Kontaktdaten finden Sie in unserem Impressum.</p>
<p>
Beschwerderecht bei der Aufsichtsbehörde Sie haben gemäß Art. 77 DSGVO das Recht, sich bei der Aufsichtsbehörde zu beschweren, wenn Sie der Ansicht sind, dass die Verarbeitung Ihrer personenbezogenen Daten nicht rechtmäßig erfolgt.</p>

      </div>
    
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="menu-ingredients" style="color: #a7613a;
    font-family: Lora,serif;" id="exampleModalLabel">Impressum</h2>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
      
<div><h3>Gesetzliche Anbieterkennung:</h3></div>
<div class=""><h5 style="color:#a7613a;">Best Food </h5></div>
<p>{{$theme->address}}</p>

<p>Deutschland</p>
<p>Telefon: <span style="color:#a7613a;">{{$theme->Phone_no}}</span></p>
<p>E-Mail: <span style="color:#a7613a;">{{$theme->email}}</span></p>
<p>Umsatzsteuer-Identifikationsnummer gemäß § 27 a Umsatzsteuergesetz: <strong>{{$theme->vatNumber}} </strong></p>
            <p>Eingetragen Im Handelsregister Des Amtsgerichtes Gewerbeamt {{$theme->districtCourt}}</p>
            
<div class=""><h5 style="color:#a7613a;" >Alternative Streitbeilegung:</h5></div>
<p>
Die Europäische Kommission stellt eine Plattform für die außergerichtliche Online-Streitbeilegung (OS-Plattform) bereit, aufrufbar unter
<a  href="https://ec.europa.eu/odr" target="_blank">https://ec.europa.eu/odr.</a></p>

<div class=""><h5 style="color:#a7613a;">Rechtliche Hinweise Zur Webseite</h5></div>
<p>Alle Texte, Bilder und weiter hier veröffentlichten Informationen unterliegen dem Urheberrecht des Anbieters, soweit nicht Urheberrechte Dritter bestehen. In jedem Fall ist eine Vervielfältigung, Verbreitung oder öffentliche Wiedergabe ausschließlich im Falle einer widerruflichen und nicht übertragbaren Zustimmung des Anbieters gestattet.
Für alle mittels Querverweis (Link) verbundenen Webinhalte übernimmt der Anbieter keine Verantwortung, da es sich hierbei nicht um eigene Inhalte handelt. Die verlinkten Seiten wurden auf rechtswidrige Inhalte überprüft, zum Zeitpunkt der Verlinkung waren solche nicht erkennbar. Verantwortlich für den Inhalt der verlinkten Seiten ist deren Betreiber. Der Anbieter hat hierzu keine allgemeine Überwachungs- und Prüfungspflicht. Bei Bekanntwerden einer Rechtsverletzung wird der entsprechende Link jedoch umgehend entfernt.</p>


      </div>
    
    </div>
  </div>
</div>
 
     @if(isset($_POST['downloads']))
     <script src="Theme-omega/js/bootstrap.bundle.min.js"></script>
       @else
       <script src="{{asset('public/Theme-omega/js/bootstrap.bundle.min.js')}}"></script>
    @endif
    
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        window.onscroll = function () { myFunction() };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
	
	<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "280px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.body.style.backgroundColor = "white";
}
</script>
	
    <script type="text/javascript">
    $( document ).ready(function() {
    $("#cat1").addClass('active');
   $("#cat1").click(function(){
    $("#cat2").removeClass('active');
    $("#cat3").removeClass('active');
    $("#cat4").removeClass('active');
    $("#cat5").removeClass('active');
    $("#cat6").removeClass('active');
    $(".Breakfast").addClass('active');
    $(".Lunch").removeClass('active');
    $(".Dinner").removeClass('active');
    $(".Dessert").removeClass('active');
    $(".Drink").removeClass('active');
    $(".Snack").removeClass('active');
    $(this).addClass('active');

    });
   $("#cat2").click(function(){
     $("#cat1").removeClass('active');
     $("#cat3").removeClass('active');
     $("#cat4").removeClass('active');
     $("#cat5").removeClass('active');
     $("#cat6").removeClass('active');
     $(".Breakfast").removeClass('active');
     $(".Lunch").addClass('active');
     $(".Dinner").removeClass('active');
     $(".Dessert").removeClass('active');
     $(".Drink").removeClass('active');
     $(".Snack").removeClass('active');
      $(this).addClass('active');
    });
   $("#cat3").click(function(){
     $("#cat1").removeClass('active');
     $("#cat2").removeClass('active');
     $("#cat4").removeClass('active');
     $("#cat5").removeClass('active');
     $("#cat6").removeClass('active');
     $(".Breakfast").removeClass('active');
     $(".Lunch").removeClass('active');
     $(".Dinner").addClass('active');
     $(".Dessert").removeClass('active');
     $(".Drink").removeClass('active');
     $(".Snack").removeClass('active');
      $(this).addClass('active');
    });
    $("#cat4").click(function(){
     $("#cat1").removeClass('active');
     $("#cat2").removeClass('active');
     $("#cat3").removeClass('active');
     $("#cat5").removeClass('active');
     $("#cat6").removeClass('active');
    $(".Breakfast").removeClass('active');
     $(".Lunch").removeClass('active');
     $(".Dinner").removeClass('active');
     $(".Dessert").addClass('active');
     $(".Drink").removeClass('active');
     $(".Snack").removeClass('active');
      $(this).addClass('active');
    });
    $("#cat5").click(function(){
     $("#cat1").removeClass('active');
     $("#cat2").removeClass('active');
     $("#cat3").removeClass('active');
     $("#cat4").removeClass('active');
     $("#cat6").removeClass('active');
     $(".Breakfast").removeClass('active');
     $(".Lunch").removeClass('active');
     $(".Dinner").removeClass('active');
     $(".Dessert").removeClass('active');
     $(".Drink").addClass('active');
     $(".Snack").removeClass('active');
      $(this).addClass('active');
    });
     $("#cat6").click(function(){
     $("#cat1").removeClass('active');
     $("#cat2").removeClass('active');
     $("#cat3").removeClass('active');
     $("#cat4").removeClass('active');
     $("#cat5").removeClass('active');
     $(".Breakfast").removeClass('active');
     $(".Lunch").removeClass('active');
     $(".Dinner").removeClass('active');
     $(".Dessert").removeClass('active');
     $(".Drink").removeClass('active');
     $(".Snack").addClass('active');

    $(this).addClass('active');
    });
});
</script>
@if(isset($_POST['downloads']))

<script type="text/javascript">
      $(document).ready(function() {
            $("#submitButton").click(function(e) {
                    e.preventDefault();
                      $(this).html(' <i class="fa fa-spinner fa-spin"></i>Please wait....');
                    var  restaurant_id = $('#code_id').val();
                    var no_of_person = $('#no_of_person').val();
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var phone_no = $('#phone_no').val();
                    var message = $('#message').val();
                    var slot = $('#slot').val();
                    var booking_date = $('#booking_date').val();
                    // var url = 'booking.php'; 
                       var url = 'https://websitemails.harjassinfotech.org/email.php'; 
                   
                    
                    $.ajax({
                    url: url,
                    dataType: "json",
                    type: "Post",
                    async: true,
                    data: { 
                            restaurant_id :restaurant_id,
                            no_of_person : no_of_person,
                            name : name,
                            email : email,
                            phone_no : phone_no,
                            message : message,
                            slot : slot,
                            date : booking_date,
                            submit : 'submit'
                            },
                    success:function(data){
                          $("#submitButton").html('BOOK NOW');
                        if(data.status == true){
                          swal("success!",data.message, "success");  
                        }
                        
                        if(data.status == false){
                          swal("error!",data.message , "error");  
                        }
                        
                        
                    },
                    complete: function () {
                            $("#ajax-loader-img").hide(); //Request is complete so hide spinner
                        }, 
                     error: function (xhr, exception) {
                        
                    }
                     
                }); 
                });   
        
             });

</script>
 @else
<script type="text/javascript">
      $(document).ready(function() {
            $("#submitButton").click(function(e) {
                    e.preventDefault();
                     $(this).html(' <i class="fa fa-spinner fa-spin"></i>Please wait....');
                    var no_of_person = $('#no_of_person').val();
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var phone_no = $('#phone_no').val();
                    var message = $('#message').val();
                    var slot = $('#slot').val();
                    var booking_date = $('#booking_date').val();
                    // var url = '{{route('booking_save')}}'; 
                    var url = 'https://websitemails.harjassinfotech.org/email.php'; 
                    var  restaurant_id = $('#code_id').val();
                    var  restaurant_name = $('#rest_name').val();
                    $.ajax({
                    url: url,
                    dataType: "json",
                    type: "Post",
                    async: true,
                    data: { 
                            _token: "{{ csrf_token() }}",
                            restaurant_name :restaurant_name,
                            restaurant_id :restaurant_id,
                            no_of_person : no_of_person,
                            name : name,
                            email : email,
                            phone_no : phone_no,
                            message : message,
                            slot : slot,
                            date : booking_date
                            },
                    success:function(data){
                         $(this).html('BOOK NOW');
                        swal("success!","slot add successFully...!!!", "success");
                        // window.location.href='thankyou/'+restaurant_id +'/'+data.last_insert_id.id;
                        $("form")[0].reset();       
                    },
                    complete: function () {
                            $("#ajax-loader-img").hide(); //Request is complete so hide spinner
                        }, 
                     error: function (xhr, exception) {
                        $("#spinner-div").hide();
                         var err = eval("(" + xhr.responseText + ")");
                         var errormessage='';
                         if(err.errors.name != undefined){
                             errormessage+=err.errors.name +' ,';
                          //  swal("error!",  err.errors.name[0], "error");
                         }
                         if(err.errors.email != undefined){
                             errormessage+=err.errors.email+' ,';
                           // swal("error!",  err.errors.email[0], "error");
                         }
                         if(err.errors.phone_no != undefined){
                             errormessage+=err.errors.phone_no+' , ';
                            //swal("error!",  err.errors.phone_no[0], "error");
                         }
                         if(err.errors.message != undefined){
                             errormessage=err.errors.message+' , ';
                           // swal("error!",  err.errors.message[0], "error");
                         }
                         if(err.errors.slot != undefined){
                             errormessage+=err.errors.slot+' , ';
                            //swal("error!",  err.errors.slot[0], "error");
                         }
                       //  swal({ title: 'error', html: errormessage, });
                         swal("error!", errormessage , "error");    
                    }
                     
                }); 
                });   
        
             });

</script>
@endif
</body>
</html>