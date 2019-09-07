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

                        <form action="{{ route('admin.pengumuman.create') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group">
                                    <label><strong>Pengumuman Kepada</strong></span></label>
                                    <select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;" required>
                                        <option value="">- Pilih -</option>
                                        <option value="1">Dosen</option>
                                        <option value="2">Mahasiswa</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Pengumuman</strong></span></label>
                                    <textarea rows="7" cols="50" type="text" class="form-control" placeholder="Masukan Pengumuman" name="nama" id="nama" value="" required></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('admin.pengumuman.index') }}" class="btn btn-inverse">Cancel</a>
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
