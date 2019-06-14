<?php

namespace App\Http\Controllers\Site\Auth;

use App\Member;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use App\Categorie;
use App\Data;
use App\Contact;
use App\Sub;

class AuthController extends Controller {

    public function __construct(Request $request) {
        $this->middleware('guest.site', ['except' => ['logout', 'getLogout']]);
        parent::__construct($request);
    }
    
    public function getLogin() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.login', compact('categories','subs','data','contact'));
    }

    public function postLogin(Request $r) {
        $v = validator($r->all() ,[
            'username' => 'required',
            'password' => 'required',
        ] ,[
            'username.required' => 'Please Enter UserName',
            'password.required' => 'Please Enter Password',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name = $r->input('username');
        $password = $r->input('password');
        
        $member = Member::where('active', 1)->where('email', $name)->orWhere('username', $name)->first();

        if ($member && Hash::check($password, $member->password)) {
            Auth::guard('members')->login($member, $r->has('remember'));
            return ['status' => 'succes' ,'data' => 'Now you are logged in'];
        }else{
            return ['status' => false ,'data' => 'Login Failed , please try again'];
        }
    }

    /**
     * Logout The user
     */
    public function logout() {
        Auth::guard('members')->logout();
        return redirect()->route('site.home');
    }

    public function register(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'username' => 'required|unique:members|min:6|alpha_dash|alpha_num',
            'type' => 'required',
            'email' => 'required|email|unique:members',
            'password1' => 'required',
            'password2' => 'required',
            'phone' => 'required|unique:members|regex:/(201)[0-9]{9}/'
        ] ,[
            'name.required' => 'Please insert Name',
            'username.required' => 'Please insert UserName',
            'email.unique' => 'Please insert another Email',
            'password1.required' => 'Please insert Password',
            'password2.required' => 'Please confirm Password',
            'phone.required' => 'Please insert Phone',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $p1 = $request->input('password1');
        $p2 = $request->input('password2');

        if ($p1 == $p2) {
            $name = $request->input('name');
            $username = $request->input('username');
            $type = $request->input('type');
            $email = $request->input('email');
            $password = bcrypt($request->input('password1'));
            $phone = $request->input('phone');

            $member = new Member();
            $member->name = $name;
            $member->username = $username;
            $member->type = $type;
            $member->phone = $phone;

            $member->email = $email;
            $member->password = $password;
            $member->recover = $p1;
            $member->active = 0;
            $member->password = $password;
            $code = str_random(5);
            $member->code = $code;

            if ($member->save()){
                $nexmo = app('Nexmo\Client');
                if($nexmo){
                    $sent = $nexmo->message()->send([
                    'to'   => $phone,
                    'from' => '60202',
                    'text' => 'Your Verification Code is : '.$code
                    ]);
                    if($sent){
                     return ['status' => 'succes' ,'data' => 'Now Check your phone to get Verification Code'];
                    }else{
                        return ['status' => false ,'data' => 'Invalid Phone Number , Please Enter Valid Phone Number including Country Key'];
                    }
                    
                }else{
                    return ['status' => false ,'data' => 'Invalid Phone Number , Please Try Another Phone Number'];
                }
            }
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }

        return ['status' => false ,'data' => 'Please make sure that passwords are matching'];
    }
    
    public function phone() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.verify', compact('categories','subs','data','contact'));
    }
    
    public function error() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.error', compact('categories','subs','data','contact'));
    }

    public function verify(Request $request){

        $v = validator($request->all() ,[
            'code' => 'required',
        ] ,[
            'code.required' => 'Please Enter Your Verification Code',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        
        $code = $request->input('code');
        $member = DB::table('members')->select('members.code')->where('members.code' , '=' , $code)->get();
        if ($member) {
            $mem = Member::where('code', $code)->first();
            if($mem){
                $mem->active = 1;
                Auth::guard('members')->login($mem, $request->has('remember'));
                return ['status' => 'succes' ,'data' => 'Now you are logged in'];
            }else{
                return ['status' => false ,'data' => 'Something went wrong , Please Enter Valid Code'];
            }
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }


    public function password(Request $r) {

        $v = validator($r->all() ,[
            'email' => 'required|email',
        ] ,[
            'email.required' => 'Please Enter E-mail',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $email = $r->input('email');

        $site = Member::where('email', $email)->first();

        if ($site) {

            $name = $site->name;

            $password = $site->recover;

            Mail::to($email)->send(new SendMail($password));

            return ['status' => 'succes' ,'data' => 'Now check your inbox to get your password'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

}
