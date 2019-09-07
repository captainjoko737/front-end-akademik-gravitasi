<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\MTahunAkademikBerjalan;
use App\Models\MTahunAkademik;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class TahunAkademikBerjalan extends Controller
{

    public function index() {

        $data['title'] = 'Data Tahun Akademik Yang Sedang Berjalan';

        $result = MTahunAkademikBerjalan::all();

        $data['result'] = $result;

        return view('admin.data_tahun_akademik_berjalan.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data Tahun Akademik';

        $data['tahun_akademik'] = MTahunAkademik::all();

        return view('admin.data_tahun_akademik.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MTahunAkademik::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data Tahun Akademik');
            return redirect()->route('admin.tahun_akademik.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.tahun_akademik.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Tahun Akademik';

        $result = MTahunAkademikBerjalan::where('id', $id)->first();

        $data['tahun_akademik'] = MTahunAkademik::all();

        $data['result'] = $result;

        return view('admin.data_tahun_akademik_berjalan.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');

        $params['updated_by'] = $user['username'];

        $save = MTahunAkademikBerjalan::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Tahun Akademik Berjalan');
            return redirect()->route('admin.tahun_akademik_berjalan.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.tahun_akademik_berjalan.index');
        }
    }

    
}
