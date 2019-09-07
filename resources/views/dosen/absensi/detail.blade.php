@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="col-12">
            <a type="button" href="{{ route('dosen.absensi', ['state' => 'absensi']) }}" class="btn btn-sm btn-inverse"><i class="mdi mdi-keyboard-backspace"></i> Kembali</a>
            <hr>
            <div class="card-outline-info">

                <div class="card-header">
                    <h4 class="m-b-0 text-white">Absensi Mahasiswa</h4>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <label>Pilih Pertemuan</label>
                            <form method="GET" action="{{ route('dosen.absensi.detail.semester') }}">
                                <div class="input-group">
                                    <input type="text" class="hidden" hidden value="{{ $id_krs }}" name="id_krs">
                                    <input type="text" class="hidden" hidden value="{{ $param_pertemuan }}" name="pertemuan">
                                    <select class="select2 form-control custom-select" name="pertemuanSelected" style="width: 100%; height:36px;" >
                                        @foreach ($total_pertemuan as $key => $value)
                                            <option value="{{ $value }}" {{ isset($pertemuanSelected) ? $pertemuanSelected == $value ? 'selected' : '' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-info" type="submit">Pencarian</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        
                    </div>

                    @if (isset($result))

                        <hr>

                        <div class="table-responsive">
                            <form method="POST" action="{{ route('save.dosen.absensi') }}">
                                {{ csrf_field() }}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>NAMA</th>
                                        <th>KETERANGAN</th>
                                        <th>ABSENSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($result as $key => $value)
                                        <tr>
                                            <td width="2%"> {{ $key + 1 }}</td>
                                            <td>{{ $value['nim'] }} <input name="nim[]" type="text" value="{{ $value['nim'] }}" class="hidden" hidden> <input name="id_krs[]" type="text" value="{{ $value['id'] }}" class="hidden" hidden></td>
                                            <td>{{ $value['nama'] }} <input name="nama[]" type="text" value="{{ $value['nama'] }}" class="hidden" hidden> <input name="pertemuan[]" type="text" value="{{ $pertemuanSelected }}" class="hidden" hidden> <input name="nidn[]" type="text" value="{{ session('user')['nidn'] }}" class="hidden" hidden> </td>
                                            @if ($value['absensi']['status'] == 1)
                                                <td><span class="label label-success">Hadir</span> </td>
                                            @elseif ($value['absensi']['status'] == 0)
                                                <td><span class="label label-danger">Tidak Hadir</span> </td>
                                            @elseif ($value['absensi']['status'] == -1)
                                                <td><span class="label label-warning">Belum Absensi</span> </td>
                                            @endif 
                                            <td width="10%">
                                                <div class="demo-radio-button">
                                                    <input name="arr[{{ $key }}]" type="radio" id="radio_{{ $key }}_1" class="radio-col-blue" value="1" {{ $value['absensi']['status'] == 1 ? 'checked' : 'checked' }} />
                                                    <label for="radio_{{ $key }}_1">Hadir</label>

                                                    <input name="arr[{{ $key }}]" type="radio" id="radio_{{ $key }}_2" class="radio-col-red" value="0" {{ $value['absensi']['status'] == 0 ? 'checked' : '' }} />
                                                    <label for="radio_{{ $key }}_2">Tidak Hadir</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                                <button class="btn btn-sm btn-info pull-right" type="submit"><i class="mdi mdi-content-save-all"></i> Simpan Absensi</button>
                            </form>
                        </div>
                    @else

                    @endif
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
