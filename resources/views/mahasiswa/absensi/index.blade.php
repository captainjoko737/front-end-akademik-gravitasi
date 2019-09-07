@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Absensi Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" class="form-horizontal">
                            <div class="form-body">
                                <h3 class="box-title">Data Mahasiswa</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">NIM</label>
                                            <div class="col-md-9">
                                                <label class="control-label text-right"> {{ session('user')['nim'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">NAMA</label>
                                            <div class="col-md-9">
                                                <label class="control-label text-right"> {{ session('user')['nama'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">PROGRAM STUDI</label>
                                            <div class="col-md-9">
                                                <label class="control-label text-right"> {{ session('user')['program_studi'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">SEMESTER </label>
                                            <div class="col-md-9">
                                                <label class="control-label text-right"> 1</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                
                                <h3 class="box-title">Absensi</h3>
                                <hr class="m-t-0 m-b-40">
                                <!--/row-->
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>KODE MATAKULIAH</th>
                                                <th>NAMA MATAKULIAH</th>
                                                <th class="text-center">SKS</th>
                                                <th>DOSEN</th>
                                                <th>HADIR</th>
                                                <th>TIDAK HADIR</th>
                                                <th>KETERANGAN</th>
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
                                                    <td> {{ $value['absensi']['absen_hadir'] }}</td>
                                                    <td> {{ $value['absensi']['absen_tidak_hadir'] }}</td>
                                                    <td> 
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success active progress-bar-striped" style="width: {{ $value['absensi']['total_absen'] / $value['pertemuan'] * 100 }}%; height:10px;" role="progressbar"> <span class="sr-only"></span> </div>
                                                        </div>
                                                        <p class="text-center"> {{ $value['absensi']['total_absen'] }} / {{ $value['pertemuan'] }} </p>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <!-- <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-printer"></i> Cetak</button> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
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
