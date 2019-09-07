<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['title'] = 'Beranda';

        // return $data;

        $user = session('user');

        if ($user['status_user'] == 'mahasiswa') {
            return redirect()->route('dashboard.mahasiswa');
        }elseif ($user['status_user'] == 'dosen'){
            return redirect()->route('dashboard.dosen');
        }else{
            return view('dashboard.dashboard', $data);
        }

        // return view('dashboard.dashboard', $data);
    }

    public function dosen()
    {

        $data['title'] = 'Beranda';

        $user = session('user');

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/dosen/pengumuman');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            $semesterArr = [];

            if (isset($response['data'])) {
                $data['result'] = $response['data'];
            }
            
            return view('dashboard.dosen', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

        
    }

    public function mahasiswa()
    {   

        $data['title'] = 'Beranda';

        $user = session('user');

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/mahasiswa/pengumuman');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            $semesterArr = [];

            if (isset($response['data'])) {
                $data['result'] = $response['data'];
            }
            
            return view('dashboard.mahasiswa', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

        
    }

    public function monitor()
    {   

        $data['title'] = 'Monitor Server';
            
        return view('dashboard.monitor', $data);

        
    }

    public function cpu()
    {   

        try {
            $client = $this->client('https://cloud.digitalocean.com/api/v1/droplets/154628884/statistics/cpu?period=hour');
            $result = $client->request('GET');
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            return $response;
        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

        
    }

    

}
