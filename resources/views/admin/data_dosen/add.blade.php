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

                        <form action="{{ route('admin.dosen.create') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group">
                                    <label><strong>Nidn</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan NIDN" name="nidn" id="nidn" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Password</strong></span></label>
                                    <input type="password" class="form-control form-control-line" placeholder="Masukan Password" name="password" id="password" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Kode</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Kode" name="kode" id="kode" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Nama</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Nama" name="nama" id="nama" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Email</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Email address" name="email" id="email" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Alamat</strong></span></label>
                                    <textarea type="text" class="form-control form-control-line" placeholder="Masukan Alamat" value="" name="alamat" id="alamat"></textarea>
                                </div>

                                <div class="form-group">
                                    <label><strong>Status</strong></span></label>
                                    <select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;" >
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('admin.dosen.index') }}" class="btn btn-inverse">Cancel</a>
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
