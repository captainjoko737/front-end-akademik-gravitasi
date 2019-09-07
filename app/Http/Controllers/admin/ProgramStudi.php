<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\MProgramStudi;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class ProgramStudi extends Controller
{

    public function index() {

        $data['title'] = 'Data Program Studi';

        $result = MProgramStudi::orderBy('created_at', 'DESC')->get();

        $data['result'] = $result;

        return view('admin.data_program_studi.index', $data);

    }

    public function add(request $request) {
        
        $data['title'] = 'Tambah Data Program Studi';

        $data['program_studi'] = MProgramStudi::all();

        return view('admin.data_program_studi.add', $data);
    }

    public function create(request $request) {

        $param = $request->all();

        unset($param['_token']);

        $user = session('user');

        $param['created_by'] = $user['username'];

        $save = MProgramStudi::create($param);

        if ($save) {
            session()->flash('status', 'Berhasil Menambahkan Data Program Studi');
            return redirect()->route('admin.program_studi.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.program_studi.index');
        }
    }

    public function edit($id) {
        
        $data['title'] = 'Edit Data Program Studi';

        $result = MProgramStudi::where('id', $id)->first();

        $data['program_studi'] = MProgramStudi::all();

        $data['result'] = $result;

        return view('admin.data_program_studi.edit', $data);
    }

    public function save(request $request) {

        $params = $request->all();

        unset($params['_token']);

        $save = MProgramStudi::where('id', $request->id)->update($params);

        if ($save) {
            session()->flash('status', 'Berhasil Mengubah Data Program Studi');
            return redirect()->route('admin.program_studi.index');
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.program_studi.index');
        }
    }

    public function drop(request $request) {

        $result = MProgramStudi::find($request->id);
        $result->delete();

        session()->flash('status', 'Berhasil Menghapus Data Program Studi');
        return response()->json(['success'=>"Berhasil Menghapus Data Program Studi", 'tr'=>'tr_'.$request->id]);
  
    }

    
}
