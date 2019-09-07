<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Session;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login() {

        if (Session::get('user')) {
            return redirect('/');
        }

        return view('auth.login');
    }

    public function postLogin(request $request) {

        // return $request->all();

        if (!$this->validete($request)) {
            session()->flash('error', 'Username atau Password tidak boleh kosong !');
            return redirect()->route('login');
        }

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/auth/login?nomor_induk='.$request->nomor_induk.'&password='.$request->password.'');
            $result = $client->request('POST', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

        if ($response['status'] == 200) {
            
            $user = $response['data'][0];

            $photo = $user['photo'];

            Session::put('photo_profile', $photo);
            Session::put('user', $user);

            if ($user['status_user'] == 'dosen') {
                return redirect()->route('dashboard.dosen');  
            }
            return redirect()->route('dashboard.mahasiswa');   
            
            
        }else{
            session()->flash('error', $response['message']);
            return redirect()->route('login');
        }

    }

    public function validete($request) {
        if (!$request['nomor_induk']) {
            return false;
        }else if (!$request['password']) {
            return false;
        }else{
            return true;
        }
    }

    public function valideteAdmin($request) {
        if (!$request['username']) {
            return false;
        }else if (!$request['password']) {
            return false;
        }else{
            return true;
        }
    }

    public function admin() {

        if (Session::get('user')) {
            return redirect('/');
        }

        return view('auth.login-admin');
    }

    public function postAdmin(request $request) {

        if (!$this->valideteAdmin($request)) {
            session()->flash('error', 'Username atau Password tidak boleh kosong !');
            return redirect()->route('admin');
        }

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/auth/admin/login?username='.$request->username.'&password='.$request->password.'');
            $result = $client->request('POST', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

        if ($response['status'] == 200) {
            
            $user = $response['data'][0];
// return $user;
            
            Session::put('user', $user);
            Session::put('photo_profile', $user['photo']);
            return redirect()->route('home');   
            
            
        }else{
            session()->flash('error', $response['message']);
            return redirect()->route('login');
        }

    }

    public function logout() {

        Session::forget('user');
        Session::forget('photo_profile');
        
        return redirect()->route('login');
    }

}
