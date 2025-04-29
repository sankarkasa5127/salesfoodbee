<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Reservierung</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      html, body {margin: 0 auto !important;padding: 0 !important;height: 100% !important;width: 100% !important;background: #f1f1f1;}
      /* What it does: Stops email clients resizing small text. */
      * {-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}
      /* What it does: Centers email on Android 4.4 */
      div[style*="margin: 16px 0"] {margin: 0 !important;}
      /* What it does: Stops Outlook from adding extra spacing to tables. */
      table, td {mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;}
      /* What it does: Fixes webkit padding issue. */
      table {border-spacing: 0 !important;border-collapse: collapse !important;table-layout: fixed !important;margin: 0 auto !important;}
      /* What it does: Uses a better rendering method when resizing images in IE. */
      img {-ms-interpolation-mode:bicubic;}
      /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
      a {text-decoration: none;}
      </style>
      <!-- CSS Reset : END -->
      <!-- Progressive Enhancements : BEGIN -->
      <style>
      .primary{background: #fccc10;}
      .bg_white{background: #ffffff;}
      .bg_light{background: #f3f3f3;}
      .bg_black{background: #000000;}
      .bg_dark{background: rgba(0,0,0,.8);}
      .email-section{padding:1.5em 2em;}
      /*BUTTON*/
      .btn{padding: 10px 15px;}
      .btn.btn-primary{border-radius: 30px;background: #fccc10;color: #000;}
      h1,h2,h3,h4,h5,h6{font-family: 'Montserrat', sans-serif;color: #000000;margin-top: 0;}
      body{font-family: 'Montserrat', sans-serif;font-weight: 400;font-size: 15px;line-height: 1.2;color: rgba(0,0,0,1);}
      p{padding: 0; margin: 5px 0; color:#000;}
      a{color: #088aff;}
      table th{color:#000;}
      /*FOOTER*/
      .footer{color: rgba(255,255,255,.8);padding-bottom: 10px;}
      .footer .heading{color: #ffffff;font-size: 20px;}
      .footer ul{margin: 0;padding: 0;}
      .footer ul li{list-style: none;margin-bottom: 10px;}
      .footer ul li a{color: rgba(255,255,255,1);}
      .text-center{text-align: center;}
      .border-radius{border-radius:20px;}
      .p-5{padding:20px!important;}
      .cont-table{padding:20px;}
      .cont-table, .cont-table tr, .cont-table td{padding: 20px 10px 0;}
      .cont-table th{text-align: left;padding: 20px 0 0px 30px; font-weight:500; width:22%; color:#898989;}
      .ficon{padding: 10px 16px;float: left;width: 20%; font-size:13px;}
      .ficon i{font-size: 24px;width: 50px;color:#000;height: 50px;background: #fccc10;border-radius: 50%;line-height: 50px;}
      .text-dark{color:#000;}
      .direction{margin-top:70px; font-size:14px; font-weight: 400;color:#0085ff; display: block;}
      .direction i{font-size: 24px;color:#fff;padding-left: 10px;padding-top: 7px;}
      .direction a{width: 40px;height: 40px;background: #0085ff;line-height: 40px; display: inline-flex; border-radius: 5px;}
      @media screen and (max-width: 500px) {
      .icon{text-align: left;}
      .text-services{padding-left: 0;padding-right: 20px;text-align: left;}
      .ficon {padding: 10px 15px;}
      }
      </style>
</head>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
	<center style="width: 100%;">
    <div style="max-width: 400px; margin: 0 auto;" class="email-container">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td class="primary logo" style="padding: 0.5em 2.5em 0;">
            <h1 style="margin-bottom:0;"><a href="https://foodbee.de/"><img src="https://foodbee.de/assets/foodbee/images/logo.png" alt="logo" style="width:40%;"></a></h1>
          </td>
	      </tr><!-- end tr -->
	      <tr>
		      <td class="bg_white">
		        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
		          <tr>
		            <td class="email-section">
		            	<div class="heading-section heading-section-dark">
                            <h4 style="font-weight:500; font-size:18px;">Reservierung Erfolgreich</h4>
		            	</div>
                        <table role="presentation" cellspacing="0" cellpadding="0" width="100%" class="bg_light border-radius cont-table">
                            <tr>
                                <th >Geschaft</th>
                                <td>{{$restaurant_name}}</td>
                            </tr>
                            <tr>
                                <th>Wann</th>
                                <td>{{$date}} Uhrzeit {{$slot}}</td>
                            </tr>
                            <tr>
                                <th>Gaste</th>
                                <td>{{$no_of_person}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$name}}</td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                          </tr>
                          <tr>
                            <td colspan="2" class="email-section" style="padding-top:0;">
                              <div class="heading-section" style="text-align: center; padding: 0 30px;">
                                <span class="ficon"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> <span class="text-dark" style="display:block;">Anruf</span></a></span>
                                <span class="ficon"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-dark" style="display:block;">Kalender</span></a></span>
                                <span class="ficon"><a href="#"><i class="fa fa-close" aria-hidden="true"></i></a> <span class="text-dark" style="display:block;">Stomieren</span></span>
                                
                              </div>
                              <div class="direction" style="padding: 40px 100px 20px;"><a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i> <span style="padding-left:20px;">Navigation</span></a></div>
                            </td>
                          </tr>
                        </table>
		            </td>
		          </tr><!-- end: tr -->
		        </table>

		      </td>
		    </tr><!-- end:tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="middle" class="bg_white footer email-section" style="padding-top:0; padding-bottom:20px;">
            <table>
            	<tr>
                <td valign="top">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left;">
                      	<p style="padding-bottom:10px;">Sie haben Fragen? Kontaktieren Sie uns.</p>
                        <p>Email: <a href="mailto:info@foodbee.de">info@foodbee.de</a></p>
                        <p>Telefon: <a href="tel">069 123456</a></p>
                        <p>Geschaftszeiten: Mon - Fri : 10:00 - 18:00</p>
                        <p>So: Geschlossen</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
      </table>

    </div>
  </center>
</body>
</html>

