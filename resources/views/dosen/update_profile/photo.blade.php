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

        
                            {!! Form::open(array('route' => 'dosen.update.photo.save', 'files'=>true)) !!}
                            {!! csrf_field() !!}
                                <div class="form-body">

                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="{{ session('photo_profile') ? session('photo_profile') : '../public/assets/images/users/default_avatar.png' }}" width="150px" height="150px" alt="user"></div>
                                    </div>

                                    </br>
                                    <div class="form-group">
                                        <label>Pilih photo profile</label>
                                        <input type="file" class="form-control" id="photo" name="photo" aria-describedby="fileHelp">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                  
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
