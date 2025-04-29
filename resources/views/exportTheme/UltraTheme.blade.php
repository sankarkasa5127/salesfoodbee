	<!doctype html>
<html lang="en">
<head>
     <?php $user = Session::get('user'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>logo</title>
     @if(isset($_POST['downloads']))
      <link href="Theme-ultra/css/bootstrap.min.css" rel="stylesheet">
       @else
        <link href="{{asset('public/Theme-ultra/css/bootstrap.min.css')}}" rel="stylesheet">
    @endif

    @if(isset($_POST['downloads']))
      <link href="Theme-ultra/css/style.css" rel="stylesheet">
       @else
       <link href="{{asset('public/Theme-ultra/css/style.css')}}" rel="stylesheet">
    @endif


   @if(isset($_POST['downloads']))
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
       @else
         <link href="{{asset('public/Theme-standard/fontawesome/css/font-awesome.css')}}" rel="stylesheet">
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
   
    <div class="bodyy">
        @if(isset($_POST['downloads']))
      <section class="banner" style="background: url(image/{{$website->bannerimg}});">
       @else
       <section id="home" class="banner" style="background: url({{ asset('public/uploads/website/themes'.$user->userId.'/' . $website->bannerimg) }});">
    @endif
            <div class="top_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xl-8 col-xxl-8 col-lg-8">
                            <ul class="topleftsection">
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+490005689742">+{{$theme->Phone_no}} </a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i><a href="tel:{{$theme->email}}">{{$theme->email}}</a>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i><a href="#">{{$theme->opening_time}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-xl-4 col-xxl-4 col-lg-4">
                            <ul class="socal_media">
                                <li><a href="{{$theme->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{$theme->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="{{$theme->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="{{$theme->youtube}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="{{$theme->linkdin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <header id="myHeader" class="header d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
                <div class="container">
                    <div class="row">
                        <a href="/" class="logo_bg text-center align-items-center col-lg-2 col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
                             @if(isset($_POST['downloads']))
                          <img class="logo" src="image/{{$website->logoimg}}" />
                           @else
                           <img class="logo" src="{{ asset('public/uploads/website/themes'.$user->userId.'/' . $website->logoimg) }}" />
                        @endif
                            
                        </a>

                        <ul class="nav col-12 col-lg-7 col-md-7 col-md-auto mb-2 justify-content-center mb-md-0 m-hide">
                            <li><a href="#home" class="nav-link px-2 link-secondary">Home</a></li>
                            <li><a href="#about-us-id" class="nav-link px-2 link-dark">About Us</a></li>
                            <li><a href="#menu-id" class="nav-link px-2 link-dark">Menu</a></li>
                            <li><a href="#whywebest-id" class="nav-link px-2 link-dark">Why We Are</a></li>
                            <li><a href="#gallery-id" class="nav-link px-2 link-dark">Gallery</a></li>
                            <li><a href="#booktable-id" class="nav-link px-2 link-dark">Book Table</a></li>
                        </ul>

                        <div class="col-md-3 col-lg-3 col-md-3 text-end m-hide">
                            <a href="#booktable-id" class="btn btndefultt bgred">Table Reservation</a>
                        </div>
						
						<span class="mobile-menu" onclick="openNav()">&#9776;</span>
						<div id="mySidenav" class="sidenav">
						  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						  <ul class="nav col-12 col-lg-7 col-md-7 col-md-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="#home" class="nav-link px-2 link-secondary">Home</a></li>
                            <li><a href="#about-us-id" class="nav-link px-2 link-dark">About Us</a></li>
                            <li><a href="#menu-id" class="nav-link px-2 link-dark">Menu</a></li>
                            <li><a href="#whywebest-id" class="nav-link px-2 link-dark">Why We Are</a></li>
                            <li><a href="#gallery-id" class="nav-link px-2 link-dark">Gallery</a></li>
                            <li><a href="#booktable-id" class="nav-link px-2 link-dark">Book Table</a></li>
                          </ul>
						</div>
                    </div>
                </div>
            </header>
            <div class="container">
                <div class="banner_text">
                    <span>{{$theme->bannerTitle}} </span>
                    <h1>{{$theme->bannerSubTitle}}</h1>
                    <p>{{$theme->bannerContent}}</p>
                      @if(!empty($theme->foodbeelink))
                    <a class="buttonclick" href="{{$theme->foodbeelink}}">Delivery Service</a>
                    @endif
                    <a class="buttonclick bgred" href="#booktable-id">Table Reservation</a>
                    
                </div>
            </div>
        </section>
        <section class="about_us" id="about-us-id">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        @if(isset($_POST['downloads']))
                         <span class="stepss"><img src="Theme-ultra/images/img1.png" />{{$theme->service1}} </span>
                           @else
                           <span class="stepss"><img src="{{asset('public/Theme-ultra/images/img1.png')}}" />{{$theme->service1}} </span>
                        @endif
                        
                    </div>
                    <div class="col-md-3">
                         @if(isset($_POST['downloads']))
                          <span class="stepss"><img src="Theme-ultra/images/247.png"/>{{$theme->service2}} </span>
                           @else
                            <span class="stepss"><img src="{{asset('public/Theme-ultra/images/247.png')}}" />{{$theme->service2}} </span>
                        @endif
                       
                    </div>
                    <div class="col-md-3">
                         @if(isset($_POST['downloads']))
                           <span class="stepss"><img src="Theme-ultra/images/stepn.png" />{{$theme->service3}}</span>
                           @else
                            <span class="stepss"><img src="{{asset('public/Theme-ultra/images/stepn.png')}}" />{{$theme->service3}}</span>
                        @endif
                       
                    </div>
                    <div class="col-md-3">
                         @if(isset($_POST['downloads']))
                           <span class="stepss"><img src="Theme-ultra/images/stepn.png" />{{$theme->service4}}</span>
                           @else
                           <span class="stepss"><img src="{{asset('public/Theme-ultra/images/stepn.png')}}" />{{$theme->service4}}</span>
                        @endif
                        
                    </div>
                </div>
                <div class="box_abouts">
                    <div class="row">
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
                        <div class="col-md-12 col-xl-6 col-xxl-6 col-lg-6 padingleftss">
                            <span>About Us </span>
                            <h2>Come to our Restaurant, Ready Your Food</h2>
                             @if(isset($_POST['downloads']))
                         <img src="Theme-ultra/images/aboutus.png" />
                           @else
                         <img src="{{asset('public/Theme-ultra/images/aboutus.png')}}" />
                        @endif
                           
                            <p>
                               {{$theme->aboutUsContent}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="menu">
        <div class="container">
            <div class="box_menu">
                <img class="crown" src="public/Theme-ultra/images/crown.png" />
                <div class="box_menu_inner">
                    <h2>Our Food Menu</h2>
                    <img class="widthfixi" src="public/Theme-ultra/images/aboutus.png" />
                    <!--p class="subtitle_menu">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    </p-->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                    @foreach ($tabmenu as $key => $menu)
                    <li class="nav-item" role="presentation" >
                      <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab" style="color:#000 !important;padding: 15px 0 !important;" href="#tab{{ $key }}" role="tab">{{ $menu->category }}</a>
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
                                    {{$item->price}}&euro;
                                    </span>
                                    <span class="textbx">
                                        <h2>{{$item->name}}</h2>
                                        <!--p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elitet dolore magna aliqua.
                                            Ut enim ad minim veniam
                                        </p-->
                                    </span>
                                    <!--img src="public/Theme-ultra/images/menu1.jpg" /-->
                                </li>

                                @endif

                            @endforeach
    
                               
                                <li class="lastborder">
                                    <a class="buttonclick bgred menusss" href="#">View More</a>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                <img class="crown bottom" src="public/Theme-ultra/images/crown1.png" />
            </div>
        </div>
        <img class="hathi" src="public/Theme-ultra/images/hathi.png" />
    </section>
   
    <section class="about_us" id="whywebest-id">
        <div class="imgtop">
            @if(isset($_POST['downloads']))
                       <img src="Theme-ultra/images/leftline.png" />
                       <img src="Theme-ultra/images/rightline.png" />
                           @else
                       <img src="{{asset('public/Theme-ultra/images/leftline.png')}}" />
                       <img src="{{asset('public/Theme-ultra/images/rightline.png')}}" />
                        @endif
            
        </div>
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
                        <h2>Why We Are the Best?</h2>
                        @if(isset($_POST['downloads']))
                       <img src="Theme-ultra/images/aboutus.png" />
                           @else
                       <img src="{{asset('public/Theme-ultra/images/aboutus.png')}}" />
                        @endif
                        
                        <p>
                             {{$theme->whyweeAreContent}}
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $BookTable = explode("|",$website->BookTableimage);?>
        @foreach($BookTable as $Book)
         @if(isset($_POST['downloads']))
                      <section class="booktable" style="background: url(image/{{$Book}});" id="booktable-id">
                           @else
                       <section class="booktable" style="background: url({{ asset('public/uploads/website/themes'.$user->userId.'/' . $Book) }});" id="booktable-id">
                        @endif
    
         @endforeach
        <div class="container">
            <div class="box_menu">
                 @if(isset($_POST['downloads']))
                     <img class="crown" src="Theme-ultra/images/crown.png" />
                           @else
                       <img class="crown" src="{{asset('public/Theme-ultra/images/crown.png')}}" />
                        @endif
                
                <div class="box_menu_inner">
                    <h2>Book A Table</h2>
                    @if(isset($_POST['downloads']))
                    <img class="widthfixi" src="Theme-ultra/images/aboutus.png" />
                           @else
                       <img class="widthfixi" src="{{asset('public/Theme-ultra/images/aboutus.png')}}" />
                        @endif
                    
                    <p class="subtitle_menu">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
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
                 @if(isset($_POST['downloads']))
                    <img class="crown bottom" src="Theme-ultra/images/crown1.png" />
                           @else
                      <img class="crown bottom" src="{{asset('public/Theme-ultra/images/crown1.png')}}" />
                        @endif
                
            </div>
        </div>
    </section>
    <section class="testimonal">
        <div class="container">
            <span>Testimonials </span>
            <h2>Customer Review</h2>
            @if(isset($_POST['downloads']))
                   <img class="bootmvodx" src="Theme-ultra/images/aboutus.png" />
                           @else
                    <img class="bootmvodx" src="{{asset('public/Theme-ultra/images/aboutus.png')}}" />
                        @endif
            
            <div class="row">
                <?php $name = explode("|",$theme->name);?>

                       <?php $review = explode("|",$theme->Review);?>
                            @foreach($review as $key => $reviews)
                <div class="col-md-6">
                    <div class="boxtestmin">
                        <div class="boxtestmin1">
                             @if(isset($_POST['downloads']))
                  <img class="img1" src="Theme-ultra/images/coma1.png" />
                           @else
                    <img class="img1" src="{{asset('public/Theme-ultra/images/coma1.png')}}" />
                        @endif
                            
                            <p>
                                {{$reviews}}
                                

                            </p>
                            <div class="imgboxtestmonal">
                                  @if(isset($_POST['downloads']))
                                  <img height="83px" width="79px" src="Theme-ultra/image/icon-thumbnail.png" style="border-radius: 25%;" />
                                           @else
                                   <img height="83px" width="79px" src="{{asset('public/image/icon-thumbnail.png')}}" style="border-radius: 25%;" />
                                @endif
                                 
                                <span>{{$name[$key]}}</span>
                                <p class="">Customer</p>
                            </div>
                            @if(isset($_POST['downloads']))
                                 <img class="img2" src="Theme-ultra/images/coma2.png" />
                                           @else
                                 <img class="img2" src="{{asset('public/Theme-ultra/images/coma2.png')}}" />
                                @endif
                            
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>
    <section class="Gallery" id="gallery-id">
        <div class="container">
            <span>Our Gallery </span>
            <h2>Restaurant Gallery</h2>
             @if(isset($_POST['downloads']))
             <img class="bootmvodx" src="Theme-ultra/images/aboutus.png" />
            @else
            <img class="bootmvodx" src="{{asset('public/Theme-ultra/images/aboutus.png')}}" />
            @endif
            
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
    <footer>
          @if(isset($_POST['downloads']))
       @else
        <span id="hide_div" class="" >@include('exportTheme.sticky_icon')</span>
        @endif
        <div class="container">
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
               <script src="Theme-ultra/js/bootstrap.bundle.min.js"></script>
            @else
            <script src="{{asset('public/Theme-ultra/js/bootstrap.bundle.min.js')}}"></script>
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
                    var no_of_person = $('#no_of_person').val();
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var phone_no = $('#phone_no').val();
                    var message = $('#message').val();
                    var slot = $('#slot').val();
                    var booking_date = $('#booking_date').val();
                    // var url = '{{route('booking_save')}}'; 
                    var url = 'https://sale.harjassinfotech.org/booking-save'; 
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