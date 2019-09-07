<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\MMatakuliah;
use App\Models\MProgramStudi;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class Matakuliah extends Controller
{

    public function index() {

        $data['title'] = 'Data Matakuliah';

        $result = MMatakuliah::orderBy('created_at', 'DESC')->get();

        $data['result'] = $result;

        return view('admin.data_matakuliah.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data Matakuliah';

        $data['program_studi'] = MProgramStudi::all();

        return view('admin.data_matakuliah.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MMatakuliah::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data Matakuliah');
            return redirect()->route('admin.matakuliah.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.matakuliah.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Matakuliah';

        $result = MMatakuliah::where('id', $id)->first();

        $data['program_studi'] = MProgramStudi::all();

        $data['result'] = $result;

        return view('admin.data_matakuliah.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $save = MMatakuliah::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Matakuliah');
            return redirect()->route('admin.matakuliah.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.matakuliah.index');
        }
    }

    public function drop(request $request) {

        $result = MMatakuliah::find($request->id);
        $result->delete();

        session()->flash('status', 'Berhasil Menghapus Data Matakuliah');
        return response()->json(['success'=>"Berhasil Menghapus Data Matakuliah", 'tr'=>'tr_'.$request->id]);
  
    }

    public function getImportCsv() {

        $data['title'] = 'Import Csv Matakuliah';
        $data['result'] = [];
            
        return view('admin.import.matakuliah', $data);

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
