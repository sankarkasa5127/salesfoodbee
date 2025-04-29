<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

       protected $table = 'bookings'; 
    protected $fillable = [
                            'restaurant_id',
                            'reservation_id',
                            'no_of_person',
                            'name',
                            'email',
                            'phone_no',
                            'message',
                            'slot',
                            'date',
                            'status',
                        ]; 



    public function booking($request){
      // $date =  date("d.m.y",strtotime($request->date));
       // dd($_POST);

        $number = rand();
        $booking = str_pad($number, 8, "0", STR_PAD_LEFT);
        self::create([
                    'restaurant_id' =>$request->restaurant_id,
                    'reservation_id' =>$booking,
                    'no_of_person' => $request->no_of_person,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_no' => $request->phone_no,
                    'message' => $request->message,
                    'slot' => $request->slot,   
                    'date' => $request->date,
                    'status' => 0
                ]);

        
    }
}
