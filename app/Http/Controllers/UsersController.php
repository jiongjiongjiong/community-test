<?php

namespace App\Http\Controllers;

use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Image;


class UsersController extends Controller
{

    public function register()
    {
        return view('users.register');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Requests\UserRegisterRequest $request)
    {
//        dd($request->all());
        $data = [
            'confirm_code' => str_random(48),
            'avatar'=>'/images/default-avatar.png'
        ];
        //保存用户数据，并重定向
        $user = User::create(array_merge($request->all(),$data));
        //发送用户邮件
        $subject = 'Confirm Your Email';
        $view = 'email.register';
        $this->sendTo($user,$subject,$view,$data);
        return redirect('/');
    }

    public function confirmEmail($confirm_code)
    {
        $user = User::where('confirm_code', $confirm_code)->first();
        if(is_null($user)){
            return redirect('/');
        }
        $user->is_confirmed = 1;
        $user->confirm_code = str_random(48);
        $user->save();
        \Session::flash('email_confirm','邮箱验证');
        return redirect('user/login');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        return view('users.login');
    }

    public function signin(Requests\UserLoginRequest $request)
    {
        if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'is_confirmed' => 1
        ])){
            return redirect('/');
        }
        \Session::flash('user_login_failed','密码不正确或者邮箱没有验证');
        return redirect('/user/login')->withInput();
    }

    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
        $file = $request->file('avatar');
        $input = ['image' => $file];
        $rules = [
            'image' => 'image'
        ];
        $validator = \Validator::make($input, $rules);
        if( $validator->fails()){
            return \Response::json([
                'success' => false,
                'errors'  => $validator->getMessageBag()->toArray()
            ]);
        }
        $destinationPath = 'uploads/';
        $filename = Auth::user()->id. '_' .time() .$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        Image::make($destinationPath.$filename)->fit(400)->save();
//        $user = User::find(Auth::user()->id);
//        $user->avatar = $destinationPath.$filename;
//        $user->save();

        return \Response::json([
            'success' => true,
            'avatar'  =>asset($destinationPath.$filename),
            'image'  => $destinationPath.$filename
        ]);

    }

    public function cropAvatar(Request $request)
    {
        $photo = $request->get('photo');
        $width = (int) $request->get('w');
        $height = (int) $request->get('h');
        $xAlign = (int) $request->get('x');
        $yAlign = (int) $request->get('y');

        Image::make($photo)->crop($width,$height,$xAlign,$yAlign)->save();
        $user = Auth::user();
        $user->avatar = asset($photo);
        $user->save();

        return redirect('/user/avatar');
    }

    private function sendTo($user, $subject, $view, $data=[])
    {

       Mail::queue($view, $data, function($m) use ($user, $subject){
           $m->to($user->email)->subject($subject);
        });

    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
