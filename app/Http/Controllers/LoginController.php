<?php

namespace App\Http\Controllers;
ini_set('maxdb_execution_time',300);
ini_set('max_execution_time',300);
ini_set("memory_limit","512M");
use Mail;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Session;
use DB;
use Hash;


class LoginController extends Controller
{
    protected $data = [];

    /**
     * @return login page view
     */
    public function login()
    {
        return view('auth.loginadmin');
        //return view('auth.login', $data);
    }

  
    public function authenticate(Request $request)
    {
        $this->validate($request, User::$login_validation_rule);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $pref = \DB::table('preference')->get();
            if(!empty($pref)) {
                $prefData = AssColumn($a=$pref, $column='id');
                foreach ($prefData as $value) {
                    $prefer[$value->field] = $value->value;
                }
            }

            Session::put($prefer);
            
            
            return redirect()->intended('admin/dashboard');
        }

        return back()->withInput()->withErrors(['email' => "Invalid Username & Password"]);
    }



    public function backup(){

        $backupData = DB::table('backup')->orderBy('id', 'desc')->first();

        if($backupData!=""){

            return    redirect()->intended('storage/laravel-backups/'.$backupData->name);
        }

    }

   

    
    public function logout()
    {
        Auth::logout();
        \Session::flush();

        return redirect('/login');
    }

    /**
     * forget password
     *
     * @return forget password form
     */
    public function reset()
    {
        $data = [];
        //$data['companyData'] = \DB::table('company')->get();
        
        return view('auth.passwords.email', $data);
    }

    /**
     * Send reset password link
     *
     * @return Null
     */
    public function sendResetLinkEmail(Request $request)
    {
        //setDbConnect($request->company);
        
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            //'company' => 'required',
        ]);

        $data['email'] = $request->email;
        $data['token'] = base64_encode(encryptIt(rand(1000000,9999999).'_'.$request->email));
        $data['created_at'] = date('Y-m-d H:i:s');
        
        \DB::table('password_resets')->insert($data);

        Mail::send('auth.emails.password', ['data' => $data], function ($message) use ($data) {
            
            $message->from('us@example.com', 'goBilling');

            $message->to($data['email'])->subject('Reset Password!');

        });

        \Session::flash('status','Password reset link sent to your email address');
        return back()->withInput();

    }



    public function showResetForm(Request $request, $tokens)
    {
        $db_token = base64_decode($tokens);
        $token = decryptIt($db_token);
        $str=explode("_",$token);
        $tokn = \DB::table('password_resets')->where('token', $tokens)->get();
        
        if (empty($tokn)) {

            return redirect()->intended('password/reset')->withErrors(['email' => "Invalid Password Token"]);
            exit;
        }

        $data['c_id'] = $str['0'];
        $data['token'] = $tokens;
        $data['userData'] = \DB::table('users')->where('email', $str['1'])->first();

        return view('auth.passwords.reset',$data);
    }

   




    public function setPassword(Request $request)
    {
        if ($_POST) {

            $this->validate($request, [
                'password' => 'required|min:6|confirmed',
            ]);

            $user_pass = \Hash::make($request->password);

            \DB::table('users')->where('id', $request->id)->update(['password'=> $user_pass]);
            \DB::table('password_resets')->where('token', '=', $request->token)->delete();

            \Session::flash('status','Password reset Successfull');
            return redirect()->intended('login');
        }
    }


 


}
