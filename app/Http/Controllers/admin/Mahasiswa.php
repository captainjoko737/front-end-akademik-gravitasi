<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\MMahasiswa;
use App\Models\MProgramStudi;
use App\Models\MTahunAkademik;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class Mahasiswa extends Controller
{

    public function index() {

        $data['title'] = 'Data Mahasiswa';

        $result = MMahasiswa::orderBy('created_at', 'DESC')->get();

        $data['result'] = $result;

        return view('admin.data_mahasiswa.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data Mahasiswa';

        $data['program_studi'] = MProgramStudi::all();
        $data['tahun_akademik'] = MTahunAkademik::all();

        return view('admin.data_mahasiswa.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $param['password'] = bcrypt($param['password']);
        $param['status_login'] = '0';
        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MMahasiswa::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data Mahasiswa');
            return redirect()->route('admin.mahasiswa.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.mahasiswa.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Mahasiswa';

        $result = MMahasiswa::where('id', $id)->first();

        $data['program_studi'] = MProgramStudi::all();
        $data['tahun_akademik'] = MTahunAkademik::all();

        $data['result'] = $result;

        return view('admin.data_mahasiswa.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');

        $params['updated_by'] = $user['username'];

        $save = MMahasiswa::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Mahasiswa');
            return redirect()->route('admin.mahasiswa.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.mahasiswa.index');
        }
    }

    public function drop(request $request) {

        $result = MMahasiswa::find($request->id);
        $result->delete();

        session()->flash('status', 'Berhasil Menghapus Data Mahasiswa');
        return response()->json(['success'=>"Berhasil Menghapus Data Mahasiswa", 'tr'=>'tr_'.$request->id]);
  
    }

    public function changePassword($id) {
        
        $data['title'] = 'Ganti Password Mahasiswa';

        $data['id'] = $id;

        return view('admin.data_mahasiswa.change_password', $data);
    }

    public function saveChangePassword(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');
        $params['password'] = bcrypt($params['password']);

        $params['updated_by'] = $user['username'];

        $save = MMahasiswa::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Password Mahasiswa');
            return redirect()->route('admin.mahasiswa.index');
        }else{
            session()->flash('status', 'Something went wrong');
            return redirect()->route('admin.mahasiswa.index');
        }
    }

    public function getImportCsv() {

        $data['title'] = 'Import Csv Mahasiswa';
        $data['result'] = [];
            
        return view('admin.import.mahasiswa', $data);

    }

    public function saveImportCsv(request $request) {

        if (isset($request->file)) {

            $csv = $request->file;
            $fileName = time().'.'.$request->file->getClientOriginalExtension();

            try {
                $client = $this->client(''.config('fkip.URL_SERVER').'/api/mahasiswa/import');
                $result = $client->request('POST', '', [
                    'multipart' => [
                        [
                            'name'     => 'file',
                            'contents' => fopen( $csv->getPathname(), 'r' ),
                            'filename' => $fileName
                            
                        ]
                    ]
                ]);
            
                $body = $result->getBody();
                $response = $this->showJSON($body);

                session()->flash('message', 'Berhasil Import Data Csv!');

                return redirect()->route('admin.import.mahasiswa');

            } catch (\Exception $e) {
                session()->flash('error', 'Maaf, terjadi kesalahan !');
                return redirect()->route('admin.import.mahasiswa');
            }
        }else{
            $data['title'] = 'Import Csv Mahasiswa';
            return view('admin.import.mahasiswa', $data);
        }

    }

    
}
