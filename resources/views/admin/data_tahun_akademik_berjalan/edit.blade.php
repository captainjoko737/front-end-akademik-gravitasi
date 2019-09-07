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

                        <form action="{{ route('admin.tahun_akademik_berjalan.save') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group hidden" hidden>
                                    <label><strong>ID</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan ID" name="id" id="id" value="{{ $result->id }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Tahun Akademik</strong></span></label>
                                    <select class="select2 form-control custom-select" name="name" style="width: 100%; height:36px;" required>
                                        <option value="">-</option>
                                        @foreach ($tahun_akademik as $key => $value)
                                            <option value="{{ $value->name }}" {{ $result->name == $value->name ? 'selected' : '' }} >{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('admin.tahun_akademik_berjalan.index') }}" class="btn btn-inverse">Cancel</a>
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
