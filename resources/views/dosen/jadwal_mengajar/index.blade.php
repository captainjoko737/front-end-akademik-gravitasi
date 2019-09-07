@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="col-12">
            @if (session('message'))
                <div class="alert alert-success col-6">{{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger col-6">{{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            @endif

            <div class="card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Jadwal Mengajar</h4>
                </div>
                
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>PROGRAM STUDI</th>
                                    <th>KODE MATAKULIAH</th>
                                    <th>NAMA MATAKULIAH</th>
                                    <th>SKS</th>
                                    <th>SEMESTER</th>
                                    <th>ANGKATAN</th>
                                    <th>HARI / WAKTU</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>PROGRAM STUDI</th>
                                    <th>KODE MATAKULIAH</th>
                                    <th>NAMA MATAKULIAH</th>
                                    <th>SKS</th>
                                    <th>SEMESTER</th>
                                    <th>ANGKATAN</th>
                                    <th>HARI / WAKTU</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($result as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value['program_studi'] }}</td>
                                        <td>{{ $value['kode_matakuliah'] }}</td>
                                        <td>{{ $value['nama'] }}</td>
                                        <td>{{ $value['sks'] }}</td>
                                        <td>{{ $value['semester'] }}</td>
                                        <td>{{ $value['angkatan'] }}</td>
                                        <td>{{ $value['hari'] }}, {{ $value['waktu'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
