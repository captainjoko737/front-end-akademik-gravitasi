<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MPengaturan;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class Pengaturan extends Controller
{

    public function index() {

        $data['title'] = 'Data Pengaturan';

        $result = MPengaturan::orderBy('created_at', 'DESC')->get();

        $data['result'] = $result;

        return view('admin.data_pengaturan.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data pengaturan';

        return view('admin.data_pengaturan.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MPengaturan::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data pengaturan');
            return redirect()->route('admin.pengaturan.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.pengaturan.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data pengaturan';

        $result = MPengaturan::where('id', $id)->first();

        $data['result'] = $result;

        return view('admin.data_pengaturan.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $user = session('user');

        $params['updated_by'] = $user['username'];

        $save = MPengaturan::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data pengaturan');
            return redirect()->route('admin.pengaturan.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.pengaturan.index');
        }
    }

    public function drop(request $request) {

        $result = MPengaturan::find($request->id);
        $result->delete();

        session()->flash('status', 'Berhasil Menghapus Data pengaturan');
        return response()->json(['success'=>"Berhasil Menghapus Data pengaturan", 'tr'=>'tr_'.$request->id]);
  
    }

    
}
