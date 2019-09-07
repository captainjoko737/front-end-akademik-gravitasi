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

                        <form action="{{ route('admin.mahasiswa.save') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group hidden" hidden>
                                    <label><strong>ID</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan ID" name="id" id="id" value="{{ $result->id }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>NIM</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan NIM" name="nim" id="nim" value="{{ $result->nim }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Nama</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Nama" name="nama" id="nama" value="{{ $result->nama }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Email</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Email address" name="email" id="email" value="{{ $result->email }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Alamat</strong></span></label>
                                    <textarea type="text" class="form-control form-control-line" placeholder="Masukan Alamat" value="" name="alamat" id="alamat">{{ $result->alamat }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label><strong>Nomor Hp</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Nomor Hp" name="nomor_hp" id="nomor_hp" value="{{ $result->nomor_hp }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Tempat Lahir</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Tempat Lahir" name="tempat_lahir" id="tempat_lahir" value="{{ $result->tempat_lahir }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Tanggal Lahir</strong></span></label>
                                    <input type="date" class="form-control form-control-line" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir" value="{{ $result->tanggal_lahir }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Program Studi</strong></span></label>
                                    <select class="select2 form-control custom-select" name="program_studi" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($program_studi as $key => $value)
                                            <option value="{{ $value->nama }}" {{ $result->program_studi == $value->nama ? 'selected' : '' }} >{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Semester</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Semester" name="semester" id="semester" value="{{ $result->semester }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Angkatan</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Angkatan" name="angkatan" id="angkatan" value="{{ $result->angkatan }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Tahun Akademik</strong></span></label>
                                    <select class="select2 form-control custom-select" name="tahun_akademik" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($tahun_akademik as $key => $value)
                                            <option value="{{ $value->name }}" {{ $result->tahun_akademik == $value->name ? 'selected' : '' }} >{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Kelas</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Kelas" name="kelas" id="kelas" value="{{ $result->kelas }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Status</strong></span></label>
                                    <select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;" >
                                        <option value="1" {{ $result->status == 1 ? 'selected' : '' }} >Aktif</option>
                                        <option value="0" {{ $result->status == 0 ? 'selected' : '' }} >Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Status Pembayaran</strong></span></label>
                                    <select class="select2 form-control custom-select" name="status_pembayaran" style="width: 100%; height:36px;" >
                                        <option value="1" {{ $result->status_pembayaran == 1 ? 'selected' : '' }}>Lunas</option>
                                        <option value="0" {{ $result->status_pembayaran == 0 ? 'selected' : '' }}>Belum Lunas</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('admin.mahasiswa.index') }}" class="btn btn-inverse">Cancel</a>
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
