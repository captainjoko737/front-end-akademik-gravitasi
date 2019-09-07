<?php

namespace App\Http\Controllers\dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Log;

class Dosen extends Controller
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

        $user = session('user');

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/jadwal/dosen?nidn='.$user['nidn'].'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            if (isset($response['data']['jadwal_mengajar'])) {
                $data['result'] = $response['data']['jadwal_mengajar'];
            }else{
                $data['result'] = [];
                session()->flash('error', $response['message']);
            }

            return view('dosen.jadwal_mengajar.index', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }
      
    }

    public function getKrsDosen() {

        if (request()->state == 'absensi') {
            $data['title'] = 'Daftar Absensi Mahasiswa';
        }else{
            $data['title'] = 'Daftar Nilai Mahasiswa';
        }

        $user = session('user');

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/jadwal/dosen?nidn='.$user['nidn'].'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            if (isset($response['data']['jadwal_mengajar'])) {
                $data['result'] = $response['data']['jadwal_mengajar'];
            }else{
                $data['result'] = [];
                session()->flash('error', $response['message']);
            }

            if (request()->state == 'absensi') {
                return view('dosen.absensi.index', $data);
            }else{
                return view('dosen.nilai.index', $data);
            }
            
        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
        }
      
    }

    public function getAbsensiMahasiswa() {

        $data['title'] = 'Daftar Absensi Mahasiswa';

        $user = session('user');

        $pertemuan = request()->total_pertemuan;

        $pertemuanArr = [];

        for ($i=0; $i < $pertemuan; $i++) { 
            array_push($pertemuanArr, $i + 1);
        }

        $data['total_pertemuan'] = $pertemuanArr;
        $data['param_pertemuan'] = $pertemuan;
        $data['id_krs'] = request()->id_krs;

        return view('dosen.absensi.detail', $data);

    }

    public function getAbsensiMahasiswaPerSmt() {

        $data['title'] = 'Daftar Absensi Mahasiswa';

        $user = session('user');

        $idKrs = request()->id_krs;
        $pertemuanSelected = request()->pertemuanSelected;

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/krs/absensi?nidn='.$user['nidn'].'&id_krs='.$idKrs.'&pertemuan='.$pertemuanSelected.'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);
// return $response;
            $pertemuan = request()->pertemuan;

            $pertemuanArr = [];

            for ($i=0; $i < $pertemuan; $i++) { 
                array_push($pertemuanArr, $i + 1);
            }

            if (isset($response['data'])) {
                $data['result'] = $response['data'];
            }
            

            $data['total_pertemuan'] = $pertemuanArr;
            $data['param_pertemuan'] = $pertemuan;
            $data['pertemuanSelected'] = request()->pertemuanSelected;
            $data['id_krs'] = request()->id_krs;
// return $data;
            return view('dosen.absensi.detail', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }
      
    }


    public function saveAbsensiMahasiswa() {

        $parameter = [];

        foreach (request()->arr as $key => $value) {
            
            $param = [
                'nidn' => request()->nidn[$key],
                'id_krs' => request()->id_krs[$key],
                'nim' => request()->nim[$key],
                'pertemuan' => request()->pertemuan[$key],
                'status' => request()->arr[$key]
            ];

            array_push($parameter, $param);
            
        }

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/absensi/input');
            $result = $client->request('POST', '', [
                'json' => $parameter,
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            session()->flash('message', 'Berhasil melakukan absensi mahasiswa!');

            return redirect()->route('dosen.absensi', ['state' => 'absensi']);

        } catch (\Exception $e) {
            
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('dosen.absensi', ['state' => 'absensi']);
        }

    }

    public function getKhsMahasiswaPerSmt() {

        $data['title'] = 'Daftar Nilai Mahasiswa';

        $user = session('user');

        $idKrs = request()->id_krs;
        $matakuliah = request()->matakuliah;

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/khs/dosen/detail?nidn='.$user['nidn'].'&id_krs='.$idKrs.'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            $pertemuanArr = [];

            for ($i=0; $i < 8; $i++) { 
                array_push($pertemuanArr, $i + 1);
            }

            if (isset($response['data'])) {
                $data['result'] = $response['data'];
            }
            
            $data['total_pertemuan'] = $pertemuanArr;
            $data['pertemuanSelected'] = request()->pertemuanSelected;
            $data['id_krs'] = request()->id_krs;
            $data['matakuliah'] = $matakuliah;

            return view('dosen.nilai.detail', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }
      
    }

    public function saveNilaiMahasiswa() {

        $parameter = [];

        foreach (request()->nidn as $key => $value) {
            
            $param = [
                'nidn' => request()->nidn[$key],
                'id_krs' => request()->id_krs[$key],
                'nim' => request()->nim[$key],
                'tugas' => request()->tugas[$key],
                'uts' => request()->uts[$key],
                'uas' => request()->uas[$key]
            ];

            array_push($parameter, $param);
            
        }

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/khs/dosen');
            $result = $client->request('POST', '', [
                'json' => $parameter,
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            if ($response['status'] != '200') {
                session()->flash('error', $response['message']);
                return redirect()->route('dosen.nilai', ['state' => 'nilai']);
            }

            session()->flash('message', 'Berhasil menginput nilai mahasiswa!');

            return redirect()->route('dosen.nilai', ['state' => 'nilai']);

        } catch (\Exception $e) {
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('dosen.nilai', ['state' => 'nilai']);
        }

    }

    public function getMahasiswaPerSemester() {

        $data['title'] = 'Daftar Mahasiswa';

        $user = session('user');

        $semesterArr = [];

        for ($i=0; $i < 8; $i++) {
            array_push($semesterArr, $i + 1);
        }

        $data['total_semester'] = $semesterArr;

        return view('dosen.daftar_mahasiswa.index', $data);

    }

    public function getDataMahasiswaPerSemester() {

        $data['title'] = 'Daftar Mahasiswa';

        $user = session('user');

        $semester = request()->semesterSelected;

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/mahasiswa/semester?semester='.$semester.'');
            $result = $client->request('GET', '', [
                'headers' => [
                    'content-type' => 'application/json'
                ]
            ]);
        
            $body = $result->getBody();
            $response = $this->showJSON($body);

            $semesterArr = [];

            for ($i=0; $i < 8; $i++) { 
                array_push($semesterArr, $i + 1);
            }

            $data['total_semester'] = $semesterArr;

            if (isset($response['data'])) {
                $data['result'] = $response['data'];
            }
            
            $data['semesterSelected'] = request()->semesterSelected;

            return view('dosen.daftar_mahasiswa.index', $data);

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }
      
    }

    public function getUpdateProfile() {

        $data['title'] = 'Update Profile Dosen';
        $data['result'] = [];

        return view('dosen.update_profile.index', $data);

    }

    public function saveUpdateProfile() {

        $parameter = request()->all();

        unset($parameter['_token']);

        try {
            $client = $this->client(''.config('fkip.URL_SERVER').'/api/dosen/update');
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

            return redirect()->route('dashboard.dosen');

        } catch (\Exception $e) {
            return $e;
            session()->flash('error', 'Maaf, terjadi kesalahan !');
            return redirect()->route('login');
        }

    }

    public function getUpdatePhoto() {

        $data['title'] = 'Update Photo Dosen';
        $data['result'] = [];
            
        return view('dosen.update_profile.photo', $data);

    }

    public function saveUpdatePhoto(request $request) {

        if (isset($request->photo)) {

            $image = $request->photo;
            $fileName = time().'.'.$request->photo->getClientOriginalExtension();

            if ($image->getSize() > 1000000) {
                session()->flash('error', 'Photo tidak boleh lebih dari 1 Mb');
                $data['title'] = 'Update Photo Dosen';
                return view('dosen.update_profile.photo', $data);
            }

            try {
                $client = $this->client(''.config('fkip.URL_SERVER').'/api/dosen/photo?nidn='.session('user')['nidn'].'');
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

                return redirect()->route('dashboard.dosen');

            } catch (\Exception $e) {
                return $e;
                session()->flash('error', 'Maaf, terjadi kesalahan !');
                return redirect()->route('login');
            }
        }else{
            $data['title'] = 'Update Photo Dosen';
            return view('dosen.update_profile.photo', $data);
        }

    }

}
