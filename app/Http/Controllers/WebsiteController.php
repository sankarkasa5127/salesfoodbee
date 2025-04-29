<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use Illuminate\Support\Facades\Session;
use ZipArchive;
use DB;
use \RecursiveIteratorIterator;
use \RecursiveDirectoryIterator;

class WebsiteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('websiteImg.imageform');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $user = Session::get('user');
    $webimg = Website::where('restaurant_id', $user->userId)->get();
    // dd($webimg);
    return view('websiteImg.showImages', compact('webimg'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $webimg = new Website();
    $this->validate($request, [
      'imageTitle' => 'required',
      'logoimg' => 'required',
      'bannerimg' => 'required',
      'aboutusimage' => 'required',
      'whyweareimage' => 'required',
      'BookTableimage' => 'required',
      'Testimonialsimage' => 'required',
      'galleryimage' => 'required'
    ]);


    $webimg = $webimg->websiteimage($request);
    if ($webimg) {
      dd('i am hare');
      return redirect()->route('web_img_form')->with('error', 'somthing went wrong!!!');

    }
    return redirect()->route('web_img_show')->with('success', 'images add success fully !!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function compress_zip_img()
  {
    $user = Session::get('user');

    $zip = new \ZipArchive();
    $fileName = "image.zip";
    if ($zip->open(public_path($fileName), \ZipArchive::CREATE) === true) {
      $files = \Illuminate\Support\Facades\File::allFiles(
        public_path('/uploads/website/themes' . $user->userId . '/')
      );

      foreach ($files as $file) {
        $zip->addFile($file->getPathname(), $file->getRelativePathname());
      }

      $zip->close();
      return response()
        ->download(public_path($fileName))
        ->deleteFileAfterSend(true);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data = Website::find($id);
    return view('websiteImg.imageeditform', ['data' => $data]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {

    $user = Session::get('user');

    $logoimage='';
    if ($files = $request->file('logoimg')) {
      $logoimage = $files->getClientOriginalName();
      $files->move(public_path('/uploads/website/themes' . $user->userId . ''), $logoimage);
    }

    $banner='';
    if ($files = $request->file('bannerimg')) {
      $banner = $files->getClientOriginalName();
      $files->move(public_path('/uploads/website/themes' . $user->userId . ''), $banner);
    }

    $aboutusimage = array();
    if ($files = $request->file('aboutusimage')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $file->move(public_path('/uploads/website/themes' . $user->userId . ''), $name);
        $aboutusimage[] = $name;
      }
    }

    $whyweareimage = array();
    if ($files = $request->file('whyweareimage')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $file->move(public_path('/uploads/website/themes' . $user->userId . ''), $name);
        $whyweareimage[] = $name;
      }
    }

    $BookTableimage = array();
    if ($files = $request->file('BookTableimage')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $file->move(public_path('/uploads/website/themes' . $user->userId . ''), $name);
        $BookTableimage[] = $name;
      }
    }

    $Testimonialsimage = array();
    if ($files = $request->file('Testimonialsimage')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $file->move(public_path('/uploads/website/themes' . $user->userId . ''), $name);
        $Testimonialsimage[] = $name;
      }
    }

    $galleryimage = array();
    if ($files = $request->file('galleryimage')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $file->move(public_path('/uploads/website/themes' . $user->userId . ''), $name);
        $galleryimage[] = $name;
      }
    }

    $hiddenabout=$request->aboutus_hidden ? $request->aboutus_hidden:[];
    $whywehidden=$request->whyweareimage_hidden ? $request->whyweareimage_hidden:[];
    $bookhidden=$request->BookTableimage_hidden ? $request->BookTableimage_hidden:[];
    $testihidden=$request->Testimonialsimage_hidden ? $request->Testimonialsimage_hidden:[];
    $galleryhidden=$request->galleryimage_hidden ? $request->galleryimage_hidden:[];

    $aboutbox = array_merge($hiddenabout, $aboutusimage);
    $whywe = array_merge($whywehidden, $whyweareimage);
    $booktabl = array_merge($bookhidden, $BookTableimage);
    $testi = array_merge($testihidden, $Testimonialsimage);
    $gallery = array_merge($galleryhidden, $galleryimage);

    $params = [
      'img_title' => $request->imageTitle,
      'aboutusimage' => implode("|", $aboutbox),
      'whyweareimage' => implode("|", $whywe),
      'BookTableimage' => implode("|", $booktabl),
      'Testimonialsimage' => implode("|", $testi),
      'galleryimage' => implode("|", $gallery)
    ];

    if($logoimage!=''){
      $params['logoimg']=$logoimage;
    }

    if($banner!=''){
      $params['bannerimg']=$banner;
    }
    
    $update = DB::table('websiteImg')->where('id', $request->id)->update($params);

    if ($update) {
      return redirect()->route('web_img_show')->with('success', 'images updated success fully !!');
    }

    return redirect()->route('web_img_show')->with('error', 'somthing went wrong!!!');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = Session::get('user');
    $website = Website::find($id);

    $website->delete();

    if (\File::exists(public_path("public/uploads/website/themes'.$user->userId.'/'" . $website->logoimg))) {
      \File::delete(public_path("public/uploads/website/themes'.$user->userId.'/'" . $website->logoimg));

    } else {
      return redirect()->back()->with('img_error', "sonthing Went wrong..!!!");
    }


    if (\File::exists(public_path("public/uploads/website/themes'.$user->userId.'/'" . $website->bannerimg))) {
      \File::delete(public_path("public/uploads/website/themes'.$user->userId.'/'" . $website->bannerimg));

    } else {
      return redirect()->back()->with('img_error', "sonthing Went wrong..!!!");
    }



    $image1 = explode("|", $website->aboutusimage);
    foreach ($image1 as $img1) {

      if (\File::exists(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img1))) {
        \File::delete(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img1));
      } else {
        return redirect()->back()->with('img_error', "sonthing Went wrong..!!!");
      }
    }

    $image2 = explode("|", $website->whyweareimage);
    foreach ($image2 as $img2) {

      if (\File::exists(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img2))) {
        \File::delete(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img2));

      } else {
        return redirect()->back()->with('img_error', "sonthing Went wrong..!!!");
      }
    }

    $image3 = explode("|", $website->BookTableimage);
    foreach ($image3 as $img3) {

      if (\File::exists(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img3))) {
        \File::delete(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img3));

      } else {
        return redirect()->back()->with('img_error', "sonthing Went wrong..!!!");
      }
    }

    $image4 = explode("|", $website->Testimonialsimage);
    foreach ($image4 as $img4) {

      if (\File::exists(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img4))) {
        \File::delete(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img4));

      } else {
        return redirect()->back()->with('img_error', "sonthing Went wrong..!!!");
      }
    }

    $image5 = explode("|", $website->galleryimage);
    foreach ($image5 as $img5) {

      if (\File::exists(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img5))) {
        \File::delete(public_path("public/uploads/website/themes'.$user->userId.'/'" . $img5));

      } else {
        return redirect()->back()->with('img_error', "sonthing Went wrong..!!!");
      }
    }

    return redirect()->route('web_img_show')->with('dlt_success', 'Post deleted successfully');
  }
}