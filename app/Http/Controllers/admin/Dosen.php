<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\MDosen;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class Dosen extends Controller
{

    public function index() {

        $user = Auth::user();

        $data['title'] = 'Data Dosen';

        $result = MDosen::orderBy('created_at', 'DESC')->get();

        $data['result'] = $result;

        return view('admin.data_dosen.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data Dosen';

        return view('admin.data_dosen.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $param['password'] = bcrypt($param['password']);
        $param['status_login'] = '0';
        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MDosen::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data Dosen');
            return redirect()->route('admin.dosen.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.dosen.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Dosen';

        $result = MDosen::where('id', $id)->first();

        $data['result'] = $result;

        return view('admin.data_dosen.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');

        $params['updated_by'] = $user['username'];

        $save = MDosen::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Dosen');
            return redirect()->route('admin.dosen.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.dosen.index');
        }
    }

    public function drop(request $request) {

        $result = MDosen::find($request->id);
        $result->delete();

        session()->flash('status', 'Berhasil Menghapus Data Dosen');
        return response()->json(['success'=>"Berhasil Menghapus Data Dosen", 'tr'=>'tr_'.$request->id]);
  
    }

    public function changePassword($id) {
        
        $data['title'] = 'Ganti Password Dosen';

        $data['id'] = $id;

        return view('admin.data_dosen.change_password', $data);
    }

    public function saveChangePassword(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');
        $params['password'] = bcrypt($params['password']);

        $params['updated_by'] = $user['username'];

        $save = MDosen::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Password Dosen');
            return redirect()->route('admin.dosen.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.dosen.index');
        }
    }

    public function getImportCsv() {

        $data['title'] = 'Import Csv Dosen';
        $data['result'] = [];
            
        return view('admin.import.dosen', $data);

    }

    public function saveImportCsv(request $request) {

        if (isset($request->file)) {

            $csv = $request->file;
            $fileName = time().'.'.$request->file->getClientOriginalExtension();

            try {
                $client = $this->client(''.config('fkip.URL_SERVER').'/api/dosen/import');
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

                return redirect()->route('admin.import.dosen');

            } catch (\Exception $e) {
                session()->flash('error', 'Maaf, terjadi kesalahan !');
                return redirect()->route('admin.import.dosen');
            }
        }else{
            $data['title'] = 'Import Csv Dosen';
            return view('admin.import.dosen', $data);
        }

    }

    
}
