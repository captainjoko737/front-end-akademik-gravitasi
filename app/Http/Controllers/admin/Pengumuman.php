<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\MPengumuman;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class Pengumuman extends Controller
{

    public function index() {

        $data['title'] = 'Data Pengumuman';

        $result = MPengumuman::orderBy('created_at', 'DESC')->get();

        $data['result'] = $result;

        return view('admin.data_pengumuman.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data Pengumuman';

        return view('admin.data_pengumuman.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MPengumuman::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data Pengumuman');
            return redirect()->route('admin.pengumuman.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.pengumuman.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Pengumuman';

        $result = MPengumuman::where('id', $id)->first();

        $data['result'] = $result;

        return view('admin.data_pengumuman.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');

        $params['updated_by'] = $user['username'];

        $save = MPengumuman::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Pengumuman');
            return redirect()->route('admin.pengumuman.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.pengumuman.index');
        }
    }

    public function drop(request $request) {

        $result = MPengumuman::find($request->id);
        $result->delete();

        session()->flash('status', 'Berhasil Menghapus Data Pengumuman');
        return response()->json(['success'=>"Berhasil Menghapus Data Pengumuman", 'tr'=>'tr_'.$request->id]);
  
    }

    
}
