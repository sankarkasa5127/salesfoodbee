<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Models\Theme;
use App\Models\Website;
use App\Models\MenuCard;
use App\Models\MenuCategory;
use App\Models\Booking;
use Mail;
use Pusher\Pusher;
use Cookie;
class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('themes.theme');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $theme = new Theme();
      // $this->validate($request, [
      //   'bannerTitle'   =>'required',
      //   'bannerSubTitle'  => 'required',
      //   'bannerContent'  =>'required',
      //   'videoLink'  =>'required',
      //   'aboutUsContent'  =>'required',
      //   'whyweeAreContent'  =>'required',
      //   'Review'  =>'required',
      //   'customerImg'  =>'required',
      //   'facebook'  =>'required',
      //   'instagram'  =>'required',
      //   'twitter'  =>'required',
      //   'youtube'  =>'required',
      //   'indeed'  =>'required',
      //   'linkdin'  =>'required',
      //   'service1'  =>'required',
      //   'service2'  =>'required',
      //   'service3'  =>'required',
      //   'service4'  =>'required',
      //   'email'  =>'required|email',
      //   'Phone_no'  =>'required',
      //   'whatsapp_no'  =>'required',
      //   'address'  =>'required',
      //   'opening_time'  =>'required',
      //   'googlemap'  =>'required',
    // ]);
       
        $theme = $theme->websiteContent($request);

        if($theme){
         return redirect()->back()->with('error' , "sonthing Went wrong..!!!");
       }
       return redirect()->route('theme_show')->with('success' , "success..!!!");
    }

    public function exportTheme(Request $request)
    {
        $menu =  MenuCard::where('restaurant_id', $_POST['restaurant_id'])->get();

       if($this->checkAuth()==false){
        return redirect()->route('login');die;

}
        $user = Session::get('user');
        $userId=$user->userId;

        $tabmenu=DB::table('websiteMenuCardCategories  as w')
                ->select('w.*','categories.category')
                ->join('categories','categories.id','w.catId')
                ->where('w.restaurantid',$userId)
                ->where('w.status',1)
                ->get();


        $tabmenuitem=DB::table('websiteMenuCardItems  as w')
                ->select('w.*','products.name','products.price')
                ->join('products','products.id','w.Itemid')
                ->where('w.restaurantid',$userId)
                ->where('w.status',1)
                ->get();

        $menu_cat =  MenuCategory::where('restaurant_id', $_POST['restaurant_id'])->get();
       
        $theme =  Theme::where('id', $_POST['export_id'])->first();
        
        $website =  Website::where('id', $_POST['image_name'])->first();
       if($_POST['Theme'] == 'StandardTheme'){
        return view('exportTheme.StandardTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
       }
       if($_POST['Theme'] == 'OmegaTheme'){
        return view('exportTheme.OmegaTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
       }
       if($_POST['Theme'] == 'UltraTheme'){
        return view('exportTheme.UltraTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
       }
       if($_POST['Theme'] == 'DiamandTheme'){
        return view('exportTheme.DiamandTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
       }
       if($_POST['Theme'] == 'SilverTheme'){
        return view('exportTheme.SilverTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
       }
    }


    public function DownloadTheme(Request $request)
    {

      if($this->checkAuth()==false){
        return redirect()->route('login');die;

}
      $user = Session::get('user');
        $userId=$user->userId;
      $tabmenu=DB::table('websiteMenuCardCategories  as w')
      ->select('w.*','categories.category')
      ->join('categories','categories.id','w.catId')
      ->where('w.restaurantid',$userId)
      ->where('w.status',1)
      ->get();


$tabmenuitem=DB::table('websiteMenuCardItems  as w')
      ->select('w.*','products.name','products.price')
      ->join('products','products.id','w.Itemid')
      ->where('w.restaurantid',$userId)
      ->where('w.status',1)
      ->get();

        $menu =  MenuCard::where('restaurant_id', $_POST['restaurant_id'])->get();
        // dd($menu);
        $menu_cat =  MenuCategory::where('restaurant_id', $_POST['restaurant_id'])->get();
        // dd($menu_cat);
        $theme =  Theme::where('id', $_POST['export_id'])->first();
        // dd($theme);
        $website =  Website::where('restaurant_id', $_POST['restaurant_id'])->where('id', $_POST['image_name'])->first();
        // dd($menu_cat);



       if($_POST['Theme'] == 'StandardTheme'){
        $StandardTheme = view('exportTheme.StandardTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
        File::put('export/index.html', $StandardTheme);
        $file= 'export/index.html';
        $headers = array(
              'Content-Type: application/html',
            );

        return Response::download($file, 'index.html', $headers);

       }
       if($_POST['Theme'] == 'OmegaTheme'){
        $OmegaTheme =  view('exportTheme.OmegaTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));

         File::put('export/index.html', $OmegaTheme);
        $file= 'export/index.html';
        $headers = array(
              'Content-Type: application/html',
            );

        return Response::download($file, 'index.html', $headers);
       }
       if($_POST['Theme'] == 'UltraTheme'){
        $UltraTheme = view('exportTheme.UltraTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
         File::put('export/index.html', $UltraTheme);
        $file= 'export/index.html';
        $headers = array(
              'Content-Type: application/pdf',
            );

        return Response::download($file, 'index.html', $headers);
       }
       if($_POST['Theme'] == 'DiamandTheme'){
        $DiamandTheme = view('exportTheme.DiamandTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
         File::put('export/index.html', $DiamandTheme);
        $file= 'export/index.html';
        $headers = array(
              'Content-Type: application/pdf',
            );

        return Response::download($file, 'index.html', $headers);
       }
       if($_POST['Theme'] == 'SilverTheme'){
        $SilverTheme = view('exportTheme.SilverTheme', compact('theme','website','menu','menu_cat','tabmenu','tabmenuitem'));
         File::put('export/index.html', $SilverTheme);
        $file= 'export/index.html';
        $headers = array(
              'Content-Type: application/pdf',
            );

        return Response::download($file, 'index.html', $headers);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       // $theme =  Theme::all();
       // $Website =  Website::all();

       if($this->checkAuth()==false){
        return redirect()->route('login');die;

}
      $user = Session::get('user');
      $theme =  Theme::where('restaurant_id', $user->userId)->get();
      $Website =  Website::where('restaurant_id', $user->userId)->get();

       return view('themes.themeTbale',compact('theme' , 'Website'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $theme =  Theme::find($id);
       return view('themes.themeEdit',compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $theme =  Theme::find($id);
        $theme = $theme->websiteContentUpdate($request);

       if($theme){
         return redirect()->back()->with('img_error' , "sonthing Went wrong..!!!");
       }
       return redirect()->route('theme_show')->with('img_error' , "sonthing Went wrong..!!!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme =  Theme::find($id);
         $image = explode("|",$theme->customerImg);
      foreach($image as $img){
        if(\File::exists(public_path("image/".$img))){
            \File::delete(public_path("image/".$img));
            $theme->delete();
          }else{
            return redirect()->back()->with('img_error' , "sonthing Went wrong..!!!");
          }
      }
          // if(\File::exists(public_path("image/".$theme->file))){
          //   \File::delete(public_path("image/".$theme->file));

          //   $theme->delete();
          // }else{
          //   return redirect()->back()->with('img_error' , "sonthing Went wrong..!!!");
          // }
         return back()->with('dlt_success','Post deleted successfully');
    }




    public function allThemeas()
    {
       return view('themes.allTheme');
    }


    public function download_asset()
    {
       if($_POST['Theme_name'] == 'StandardTheme'){
        $file= 'export/Theme-standard.zip';
        $headers = array(
              'Content-Type: application/zip',
            );

        return Response::download($file, 'Theme-standard.zip', $headers);

       }

       if($_POST['Theme_name'] == 'omega_theme'){
        $file= 'export/Theme-omega.zip';
        $headers = array(
              'Content-Type: application/zip',
            );

        return Response::download($file, 'Theme-omega.zip', $headers);

       }

       

       if($_POST['Theme_name'] == 'UltraTheme'){
        $file= 'export/Theme-ultra.zip';
        $headers = array(
              'Content-Type: application/zip',
            );

        return Response::download($file, 'Theme-ultra.zip', $headers);

       }

       if($_POST['Theme_name'] == 'DiamandTheme'){
        $file= 'export/Theme-diamand.zip';
        $headers = array(
              'Content-Type: application/zip',
            );

        return Response::download($file, 'Theme-diamand.zip', $headers);

       }

       if($_POST['Theme_name'] == 'SilverTheme'){
        $file= 'export/Theme-silver.zip';
        $headers = array(
              'Content-Type: application/zip',
            );

        return Response::download($file, 'Theme-silver.zip', $headers);

       }
    }



     public function booking_slot(Request $request)
    { 
        $book = new Booking();
        $this->validate($request, [
        'no_of_person'  =>'required',
        'name'   =>'required',
        'email'  => 'required|email',
        'phone_no'  =>'required|min:10|max:10',
        'message'  =>'required',
        'slot'  =>'required',
        'date'  =>'required',
    ]);

    $book =  $book->booking($request);
    $last_insert_id  = Booking::latest('id')->first();
    $users = DB::table('tbl_users')->Where('code', $request->restaurant_id)->first();
    // dd($last_insert_id);
    $response=array();
            //$data = $this->Api_model->getOrderByOrderId($order_id);
        $response['error']='202';
        $response['data']=$last_insert_id;
        $response['start']='';
        $pusherdata['message']=$response;
                    $options = array(
                'cluster' => 'ap2',
                'useTLS' => true
            );
            $pusher = new Pusher(
                    '83a310a5fd0558a9e5bf',
                    '728027e92c112e10790d',
                    '1332051',
                    $options
            );
            $pusher->trigger('foodbeeApp', 'ReservationStatus'.$users->userId, $pusherdata);

    
    $data =[ 
            'no_of_person'  => $request->no_of_person,
            'restaurant_name'  => $request->restaurant_name,
            'rest_email'  => $request->rest_email,
            'name'   => $request->name,
            'email'  => $request->email,
            'phone_no'  => $request->phone_no,
            'message'  => $request->message,
            'slot'  => $request->slot,
            'rest_email'  => $users->email,
            'reservation_id'  => $last_insert_id->reservation_id,
            'date'  => $request->date
        ]; 
        
       if($book){
         return response()->json(['error' , "sonthing Went wrong..!!!"]);
       }
        Mail::send('booking_email.mail', $data, function($message) use ($data) {
         $message->to($data['email'])->subject
            ('Booking mail');
         $message->from('info@reservation.harjassinfotech.org','foodbee.de');
      });

         Mail::send('booking_email.adminMail', $data, function($message) use ($data) {
         $message->to($data['rest_email'])->subject
            ('Booking mail');
         $message->from('info@reservation.harjassinfotech.org','foodbee.de');
      });
       return response()->json(['success' ,'last_insert_id' => Booking::latest('id')->first(), "slot add successFully...!!!"]);
    }
    public function checkAuth()
    {
    if(Session::has('user')){
       return true;
    }elseif(Cookie::get('user')!== null){
        $cookies = json_decode(Cookie::get('user'));
            $id = $cookies->id;
           $details = DB::table('tbl_users')->where('userId', $id)->first(); 
           if($details){
            Session::put('user', $details);
            return true;
           }else{
            return false;
           }  
    }
    else{
        return false;
    }
    }
}
