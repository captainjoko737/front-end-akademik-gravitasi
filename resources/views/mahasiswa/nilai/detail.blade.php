@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="col-12">
            <a type="button" href="{{ route('dosen.nilai', ['state' => 'nilai']) }}" class="btn btn-sm btn-inverse"><i class="mdi mdi-keyboard-backspace"></i> Kembali</a>
            <hr>
            <div class="card-outline-info">

                <div class="card-header">
                    <h4 class="m-b-0 text-white pull-right" width="50%"><strong>{{ $matakuliah }}</strong></h4>
                    <h5 class="m-b-0 text-white" width="50%"> <strong>Nilai Mahasiswa</strong> </h5>
                </div>
                
                <div class="card-body">
            
                        <hr>

                        <div class="table-responsive">
                            <form method="POST" action="{{ route('save.dosen.nilai') }}">
                                {{ csrf_field() }}
                                <table id="example23" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>NIM</th>
                                            <th>NAMA</th>
                                            <th class="text-center">SKS</th>
                                            <th>Nilai Tugas</th>
                                            <th>Nilai UTS</th>
                                            <th>Nilai UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($result as $key => $value)

                                            <tr>
                                                <td> {{ $key + 1}} </td>
                                                <td> {{ $value['nim'] }}<input name="nim[]" class="form-control hidden" hidden type="text" value="{{ $value['nim'] }}" id="example-text-input"><input name="nidn[]" class="form-control hidden" hidden type="text" value="{{ session('user')['nidn'] }}" id="example-text-input"></td>
                                                <td> {{ $value['nama'] }}<input name="nama[]" class="form-control hidden" hidden type="text" value="{{ $value['nama'] }}" id="example-text-input"><input name="id_krs[]" class="form-control hidden" hidden type="text" value="{{ $value['id'] }}" id="example-text-input"></td>
                                                <td class="text-center"> {{ $value['sks'] }}</td>
                                                <td width="15%"> <input name="tugas[]" class="form-control" type="text" value="{{ $value['kartu_hasil_studi']['tugas'] ? $value['kartu_hasil_studi']['tugas'] : 0 }}" id="example-text-input"> <p class="hidden" hidden>{{ $value['kartu_hasil_studi']['tugas'] }}</p></td>
                                                <td width="15%"> <input name="uts[]" class="form-control" type="text" value="{{ $value['kartu_hasil_studi']['uts'] ? $value['kartu_hasil_studi']['uts'] : 0 }}" id="example-text-input"><p class="hidden" hidden>{{ $value['kartu_hasil_studi']['uts'] }}</p></td>
                                                <td width="15%"> <input name="uas[]" class="form-control" type="text" value="{{ $value['kartu_hasil_studi']['uas'] ? $value['kartu_hasil_studi']['uas'] : 0 }}" id="example-text-input"><p class="hidden" hidden>{{ $value['kartu_hasil_studi']['uas'] }}</p></td>
                                            </tr>
                                            
                                        @endforeach

                                    </tbody>
                                </table>
                                <br><br>
                                    <button class="btn btn-sm btn-info pull-right" type="submit"><i class="mdi mdi-content-save-all"></i> <strong>Simpan Nilai</strong></button>
                            </div>
                            
                        </form>
    
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
