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

                        <form action="{{ route('dosen.update.profile.save') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group">
                                    <label><strong>Nidn</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="nidn" id="nidn" value="{{ session('user')['nidn'] }}" readonly> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Kode</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="kode" id="kode" value="{{ session('user')['kode'] }}" readonly> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Nama</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="nama" id="nama" value="{{ session('user')['nama'] }}"> 
                                </div>

                                <div class="form-group">
                                    <label><strong>E-mail</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="email" id="email" value="{{ session('user')['email'] }}"> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Alamat</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="alamat" id="alamat" value="{{ session('user')['alamat'] }}"> 
                                </div>

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
