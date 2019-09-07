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

                        <form action="{{ route('admin.matakuliah.save') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group hidden" hidden>
                                    <label><strong>ID</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan ID" name="id" id="id" value="{{ $result->id }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Kode</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Kode" name="kode" id="kode" value="{{ $result->kode }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Nama</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Nama" name="nama" id="nama" value="{{ $result->nama }}" required> 
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
                                    <label><strong>SKS</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan SKS" name="sks" id="sks" value="{{ $result->sks }}" required> 
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('admin.matakuliah.index') }}" class="btn btn-inverse">Cancel</a>
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
