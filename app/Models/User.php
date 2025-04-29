<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
// class User extends Authenticatable implements JWTSubject
class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ="tbl_users";

    protected $fillable = ['email' , 'password'];

    protected $primaryKey = 'userId';


    // public function login($request)
    // {

       
    //     $user = User::email($request->email)->first();


    //     if (!$user?->isPwdConfirmed($request->password)) {
    //         abort(Response::HTTP_UNAUTHORIZED, __('The provided credentials were incorrect.'));
    //     }

    //     return $this->authService->issueAccessToken($user);
    // }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ['message' => 'Successfully logout.'];
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    
}
