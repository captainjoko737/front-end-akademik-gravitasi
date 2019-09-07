@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Repositori Skripsi Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" class="form-horizontal">
                            <div class="form-body">
                                <form class="form">
                                    
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Mahasiswa</label>
                                        <div class="col-10">
                                            <select class="select2 form-control custom-select" name="semesterSelected" style="width: 100%; height:36px;" >
                                       
                                                <option value="">Pilih Mahasiswa</option>
                                            
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Judul Skripsi</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">File Skripsi</label>
                                        <div class="col-10">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                  
                                </form>
                                
                                <hr>
                                <!--/row-->
                                <div class="table-responsive">
                                    
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>NAMA</th>
                                                <th>JUDUL SKRIPSI</th>
                                                <th>URL</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($result as $key => $value)
                                                <tr>
                                                    <td width="2%"> {{ $key + 1 }}</td>
                                                    <td> {{ $value['kode_matakuliah'] }} </td>
                                                    <td> {{ $value['nama_matakuliah'] }}</td>
                                                    <td class="text-center"> {{ $value['sks'] }} </td>
                                                    <td> {{ $value['dosen'] }} </td>
                                                    <td> 
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success active progress-bar-striped" style="width: 30%; height:10px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                                        </div>
                                                        <p class="text-center">{{ $value['absen'] }} </p>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!--/row-->
                            </div>
                            <hr>
                            <div class="form-actions">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script type="text/javascript">
    
    function drop(id) {
        
        
    }

</script>
@endsection
