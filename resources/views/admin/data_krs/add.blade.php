@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="row">
            <div class="col-lg-6">
                <div class="card ">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">{{ $title }}</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.krs.create') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group">
                                    <label><strong>Program Studi</strong></span></label>
                                    <select class="select2 form-control custom-select" name="program_studi" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($program_studi as $key => $value)
                                            <option value="{{ $value->nama }}">{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Matakuliah</strong></span></label>
                                    <select class="select2 form-control custom-select" name="kode_matakuliah" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($matakuliah as $key => $value)
                                            <option value="{{ $value->kode }}">{{ $value->kode }} - {{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Semester</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Semester" name="semester" id="semester" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Angkatan</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan angkatan" name="angkatan" id="angkatan" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Tahun Akademik</strong></span></label>
                                    <select class="select2 form-control custom-select" name="tahun_akademik" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($tahun_akademik as $key => $value)
                                            <option value="{{ $value->name }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Dosen</strong></span></label>
                                    <select class="select2 form-control custom-select" name="dosen" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($dosen as $key => $value)
                                            <option value="{{ $value->kode }}">{{ $value->kode }} - {{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Waktu</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Waktu" name="waktu" id="waktu" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Hari</strong></span></label>
                                    <select class="select2 form-control custom-select" name="hari" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($hari as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Pertemuan</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Pertemuan" name="pertemuan" id="pertemuan" value="" required> 
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('admin.krs.index') }}" class="btn btn-inverse">Cancel</a>
                                <hr>
                                
                            </div>
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

</script>
@endsection
