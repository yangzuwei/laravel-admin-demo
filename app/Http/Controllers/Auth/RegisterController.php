<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Appuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => 'required|string|max:255|unique:mysql2.app_users',
            'password' => 'required|string|min:6|confirmed',
            //'captcha' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Appuser::create([
            'user_name' => $data['user_name'],
            'nick'=> $data['user_name'],
            'email'=>$data['email'],
            'password' => md5($data['password'].'kaichuang'),
        ]);
    }

    public function register(Request $request)
    {
        try{
            $this->validator($request->all())->validate();
        }catch (ValidationException $e){
            //echo $e->getMessage();
            return redirect()->back()->with('log_message','注册失败');
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ? redirect()->back()->with('log_message','注册失败'):redirect()->back();
    }

//    protected function registered(Request $request, $user)
//    {
//        return Appuser::where('user_name',$user->user_name)->firstOrFail();
//    }

}
