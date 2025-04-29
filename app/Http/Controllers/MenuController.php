<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCard;
use Illuminate\Support\Facades\Session;
use App\Models\MenuCategory;
use Cookie;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if($this->checkAuth()==false){
         return redirect()->route('login'); 
 }
        $user = Session::get('user');
        $cat = MenuCategory::where('restaurant_id', $user->userId)->get();
        $MenuCard = MenuCard::where('restaurant_id', $user->userId)->get();
       return view('menucard.menuform' , compact('cat','MenuCard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $product = new MenuCard();
       $product = $product->addProduct($request);
       if($product){
        return redirect()->back()->with('error' , "sonthing Went wrong..!!!");
       }
       return redirect()->back()->with('success' , "success..!!!");

    }

     public function category(Request $request)
    {
       $category = new MenuCategory();
       $category = $category->addcategory($request);
       if($category){
        return redirect()->back()->with('error' , "sonthing Went wrong..!!!");
       }
       return redirect()->back()->with('success' , "success..!!!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = MenuCategory::all();
        $MenuCard = MenuCard::find($id);
       return view('menucard.editMenu' , compact('cat','MenuCard'));
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
        $product = MenuCard::find($id);
       $product = $product->updateProduct($request);
       if($product){
        return redirect()->back()->with('error' , "sonthing Went wrong..!!!");
       }
       return redirect()->route('menu_form')->with('success' , "success..!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = MenuCard::find($id);
         $product->delete();
          if($product){
        return redirect()->back()->with('error' , "sonthing Went wrong..!!!");
       }
       return redirect()->route('menu_form')->with('success' , "success..!!!");
    }
    public function checkAuth()
    {
        // dd(Cookie::get('user'));
    if(Session::has('user')){
       return true;
    }elseif(Cookie::get('user') != null){
         $cookies = json_decode(Cookie::get('user'));
         // dd($cookies->id);
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
