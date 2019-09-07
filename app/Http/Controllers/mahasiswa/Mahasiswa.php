<?php

namespace App\Http\Controllers\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Log;
use Image;

class Mahasiswa extends Controller
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
    public function jadwalMengajar() {

        $data['title'] = 'Jadwal Mengajar';

        return view('dosen.jadwal_mengajar.index', $data);
    }

    public function getKrs() {

        $data['title'] = 'Kartu Rencana Studi';

        $user = session('user');

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/krs/mahasiswa?nim='.$user['nim'].'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            if (isset($response['data'])) {
                $data['result'] = $response['data']['kartu_rencana_studi'];
            }else{
                $data['result'] = [];
            }
     
            return view('mahasiswa.kartu_rencana_studi.index', $data);

        } catch (\Exception $e) {
            $data['result'] = [];

            // session()->flash('error', 'Maaf, terjadi kesalahan !');
            return view('mahasiswa.kartu_rencana_studi.index', $data);
            // return redirect()->route('login');
        }

        // return view('mahasiswa.kartu_rencana_studi.index', $data);
    }

    public function getKhs() {

        $data['title'] = 'Kartu Hasil Studi';

        $user = session('user');

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/khs/mahasiswa?nim='.$user['nim'].'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            if (isset($response['data'])) {
                $data['result'] = $response['data'];

                $totalSks = 0;

                foreach ($data['result'] as $key => $value) {
                    $totalSks += $value['sks'];
                }

                $data['total_sks'] = $totalSks;
            }
            // return $data;
            return view('mahasiswa.kartu_hasil_studi.index', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

        // return view('mahasiswa.kartu_rencana_studi.index', $data);
    }

    public function getAbsensi() {

        $data['title'] = 'Absensi Mahasiswa';

        $user = session('user');

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/absensi/mahasiswa?nim='.$user['nim'].'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            if (isset($response['data'])) {
                $data['result'] = $response['data'];
            }
 
// return $data;
            return view('mahasiswa.absensi.index', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

        // return view('mahasiswa.kartu_rencana_studi.index', $data);
    }

    public function getRepositori() {

        $data['title'] = 'Repositori Mahasiswa';
        $data['result'] = [];
            
        return view('mahasiswa.repositori_skripsi.index', $data);

    }

    public function getUpdateProfile() {

        $data['title'] = 'Update Profile Mahasiswa';
        $data['result'] = [];

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/location');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            if (isset($response['data'])) {
                $data['result'] = $response['data'];
            }

            return view('mahasiswa.update_profile.index', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }
            
        // return view('mahasiswa.update_profile.index', $data);

    }

    public function saveUpdateProfile() {

        $parameter = request()->all();

        unset($parameter['_token']);

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/mahasiswa/update');
            $result = $client->request('POST', '', [
                'json' => $parameter,
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            Session::forget('user');
            Session::put('user', $response['data']);
            
            session()->flash('message', 'Berhasil mengubah data!');

            return redirect()->route('dashboard.mahasiswa');

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

    }

    public function getUpdatePhoto() {

        $data['title'] = 'Update Photo Mahasiswa';
        $data['result'] = [];
            
        return view('mahasiswa.update_profile.photo', $data);

    }

    public function saveUpdatePhoto(request $request) {

        if (isset($request->photo)) {


            $image = $request->photo;
            $fileName = time().'.'.$request->photo->getClientOriginalExtension();

            if ($image->getSize() > 1000000) {
                session()->flash('error', 'Photo tidak boleh lebih dari 1 Mb');
                $data['title'] = 'Update Photo Mahasiswa';
                return view('mahasiswa.update_profile.photo', $data);
            }

            try {
                $client = $this->client(''.config('fkip.URL_SERVER').'/api/mahasiswa/photo?nim='.session('user')['nim'].'');
                $result = $client->request('POST', '', [
                    'multipart' => [
                        [
                            'name'     => 'file',
                            'contents' => fopen( $image->getPathname(), 'r' ),
                            'filename' => $fileName
                            
                        ]
                    ]
                ]);
            
                $body = $result->getBody();
                $response = $this->showJSON($body);
                
                Session::forget('photo_profile');
                Session::put('photo_profile', $response['data']);

                session()->flash('message', 'Berhasil mengubah photo profile!');

                return redirect()->route('dashboard.mahasiswa');

            } catch (\Exception $e) {
                return $e;
                session()->flash('error', 'Maaf, terjadi kesalahan !');
                return redirect()->route('login');
            }
        }else{
            $data['title'] = 'Update Photo Mahasiswa';
            return view('mahasiswa.update_profile.photo', $data);
        }

    }



    

}
