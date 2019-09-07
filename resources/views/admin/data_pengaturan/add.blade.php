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

                        <form action="{{ route('admin.pengaturan.create') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <div class="form-group">
                                    <label><strong>Name</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Nama" name="name" id="name" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Value</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Value" name="value" id="value" value="" required> 
                                </div>
                                
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('admin.pengaturan.index') }}" class="btn btn-inverse">Cancel</a>
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
