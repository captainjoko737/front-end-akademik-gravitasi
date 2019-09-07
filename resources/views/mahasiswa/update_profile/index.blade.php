@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">{{ $title }}</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('mahasiswa.update.profile.save') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group">
                                    <label><strong>Nim</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="nim" id="nim" value="{{ session('user')['nim'] }}" readonly> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Nama</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="nama" id="nama" value="{{ session('user')['nama'] }}" readonly> 
                                </div>

                                <div class="form-group">
                                    <label><strong>E-mail</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="email" id="email" value="{{ session('user')['email'] }}"> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Alamat</strong></span></label>
                                    <textarea type="text" class="form-control form-control-line" name="alamat" id="alamat" value="">{{ session('user')['alamat'] }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label><strong>Nomor Handphone / Whatsapp</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="nomor_hp" id="nomor_hp" value="{{ session('user')['nomor_hp'] }}"> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Tempat Lahir</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="tempat_lahir" id="tempat_lahir" value="{{ session('user')['tempat_lahir'] }}"> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Tanggal Lahir</strong></span></label>
                                    <input type="date" class="form-control form-control-line" name="tanggal_lahir" id="tanggal_lahir" value="{{ Carbon\Carbon::parse( session('user')['tanggal_lahir'])->format('Y-m-d') }}"> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Provinsi</strong></span></label>
                                    <div class="col-12">
                                    <select class="select2 form-control custom-select" name="provinsi" style="width: 100%; height:46px;" >
                                        <option value="">Pilih Provinsi</option>
                                        @foreach($result['provinsi'] as $key => $value)
                                            <option value="{{ $value['id'] }}" {{ session('user')['provinsi'] == $value['id'] ? 'selected' : '' }}>{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label><strong>Kota</strong></span></label>
                                    <div class="col-12">
                                        <select class="select2 form-control custom-select" name="kota" style="width: 100%; height:46px;" >
                                            <option value="">Pilih Kota</option>
                                            @foreach($result['kota'] as $key => $value)
                                                <option value="{{ $value['id'] }}" {{ session('user')['kota'] == $value['id'] ? 'selected' : '' }} >{{ $value['name'] }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label><strong>Kecamatan</strong></span></label>
                                    <div class="col-12">
                                        <select class="select2 form-control custom-select" name="kecamatan" style="width: 100%; height:46px;" >
                                            <option value="">Pilih Kecamatan</option>
                                            @foreach($result['kecamatan'] as $key => $value)
                                                <option value="{{ $value['id'] }}" {{ session('user')['kecamatan'] == $value['id'] ? 'selected' : '' }} >{{ $value['name'] }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                
                                <hr>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                              
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
    
    function drop(id) {
        
        
    }

</script>
@endsection
