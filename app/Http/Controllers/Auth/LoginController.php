<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
//use League\Flysystem\Config;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Config;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }


    public $successStatus = 200;


    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $test = Config::get('test');
        dd($test);
        if (Auth::attempt(['username' => request('user_name'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
//             $message = response()->json(['success' => $success], $this->successStatus);
            return redirect('home');

        } else {
            $message = 'thong tin dang nhap chua chinh xac, de nghi nhap lai';
            Session::flash('message', $message);
            return back()->withInput();
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $validator = $this->user->validate($data);

        if ($validator->fails()) {
            $messages = $validator->messages()->getMessages();
            return redirect()->back()->withErrors($messages)->withInput();
        } else {
            $data['created_at'] = Carbon::now();
            $data['role_id'] = 1;

            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
//            $success['token'] =  $user->createToken('MyApp')->accessToken;
//            $success['username'] =  $user->username;
            return redirect('login');
        }
//        return response()->json(['success'=>$success], $this->successStatus);
        return redirect()->route('login');
    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}