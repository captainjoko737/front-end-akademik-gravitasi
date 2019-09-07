<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\MTahunAkademik;
use App\Models\MDosen;
use App\Models\MMatakuliah;
use App\Models\MProgramStudi;
use App\Models\MMahasiswa;
use App\Models\MKRS;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class KRS extends Controller
{

    public function index() {

        $data['title'] = 'Data Rencana Studi';

        $result = MKRS::orderBy('created_at', 'DESC')->get();

        $data['result'] = $result;

        return view('admin.data_krs.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data Rencana Studi';

        $data['tahun_akademik'] = MTahunAkademik::all();
        $data['program_studi'] = MProgramStudi::all();
        $data['matakuliah'] = MMatakuliah::all();
        $data['dosen'] = MDosen::all();
        $data['hari'] = $this->getDay();

        return view('admin.data_krs.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MKRS::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data Rencana Studi');
            return redirect()->route('admin.krs.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.krs.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Rencana Studi';

        $result = MKRS::where('id', $id)->first();

        $data['tahun_akademik'] = MTahunAkademik::all();
        $data['program_studi'] = MProgramStudi::all();
        $data['matakuliah'] = MMatakuliah::all();
        $data['dosen'] = MDosen::all();
        $data['hari'] = $this->getDay();

        $data['result'] = $result;

        return view('admin.data_krs.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');

        $params['updated_by'] = $user['username'];

        $save = MKRS::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Rencana Studi');
            return redirect()->route('admin.krs.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.krs.index');
        }
    }

    public function drop(request $request) {

        $result = MKRS::find($request->id);
        $result->delete();

        session()->flash('status', 'Berhasil Menghapus Data Rencana Studi');
        return response()->json(['success'=>"Berhasil Menghapus Data Rencana Studi", 'tr'=>'tr_'.$request->id]);
  
    }

    private function getDay() {
        $dayName = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return $dayName;
    }

    public function getImportCsv() {

        $data['title'] = 'Import Csv Rencana Studi';
        $data['result'] = [];
            
        return view('admin.import.krs', $data);

    }

    public function saveImportCsv(request $request) {

        if (isset($request->file)) {

            $csv = $request->file;
            $fileName = time().'.'.$request->file->getClientOriginalExtension();

            try {
                $client = $this->client(''.config('fkip.URL_SERVER').'/api/akademik/krs/admin');
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

                return redirect()->route('admin.import.krs');

            } catch (\Exception $e) {
                session()->flash('error', 'Maaf, terjadi kesalahan !');
                return redirect()->route('admin.import.krs');
            }
        }else{
            $data['title'] = 'Import Csv Rencana Studi';
            return view('admin.import.krs', $data);
        }

    }

    
}
