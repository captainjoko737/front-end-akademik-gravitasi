@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="col-12">
            
            <div class="card-outline-info">

                <div class="card-header">
                    <h5 class="m-b-0 text-white" width="50%"> <strong>Daftar Mahasiswa</strong> </h5>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <label>Pilih Semester</label>
                            <form method="GET" action="{{ route('dosen.daftar.mahasiswa.semester') }}">
                                <div class="input-group">
                                    
                                    <select class="select2 form-control custom-select" name="semesterSelected" style="width: 100%; height:36px;" >
                                        @foreach ($total_semester as $key => $value)
                                            <option value="{{ $value }}" {{ isset($semesterSelected) ? $semesterSelected == $value ? 'selected' : '' : '' }}>{{ $value }}</option>
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
                            
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>ALAMAT</th>
                                        <th>NOMOR HP</th>
                                        <th>TTL</th>
                                        <th>PRODI</th>
                                        <th>SMT</th>
                                        <th>ANGKATAN</th>
                                        <th>TAHUN AKADEMIK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($result as $key => $value)
                                        <tr>
                                            <td width="2%"> {{ $key + 1 }}</td>
                                            <th>{{ $value['nim'] }}</th>
                                            <th>{{ $value['nama'] }}</th>
                                            <th>{{ $value['email'] }}</th>
                                            <th>{{ $value['alamat'] }}</th>
                                            <th>{{ $value['nomor_hp'] }}</th>
                                            <th>{{ $value['tempat_lahir'] }}, {{ Carbon\Carbon::parse($value['tanggal_lahir'])->format('Y-m-d') }}</th>
                                            <th>{{ $value['program_studi'] }}</th>
                                            <th class="text-center">{{ $value['semester'] }}</th>
                                            <th class="text-center">{{ $value['angkatan'] }}</th>
                                            <th>{{ $value['tahun_akademik'] }}</th>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
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

</script>
@endsection
