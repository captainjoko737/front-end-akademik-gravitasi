@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="row">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>

                @endif
                <div class="card ">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">{{ $title }}</h4>
                    </div>
                    <div class="card-body">

                        <!-- <form action="{{ route('mahasiswa.update.photo.save') }}" method="POST" class="form-material"> -->
        
                            {!! Form::open(array('route' => 'admin.import.krs.save', 'files'=>true)) !!}
                            {!! csrf_field() !!}
                                <div class="form-body">

                                    </br>
                                    <div class="form-group">
                                        <label>Pilih file csv krs</label>
                                        <input type="file" class="form-control" id="file" name="file" aria-describedby="fileHelp">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    <a type="button" href="{{ route('admin.krs.index') }}" class="btn btn-inverse">Cancel</a>
                                    <hr>
                                    
                                </div>
                            <!-- </form> -->
                            {!! Form::close() !!}
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
