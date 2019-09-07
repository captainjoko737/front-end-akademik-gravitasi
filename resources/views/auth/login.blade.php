@extends('layouts.app')
<style type="text/css">

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

.rounded {
    border-radius:4px;
}
</style>

@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url({{ url('/public/assets/images/background/background_akbid.jpg') }});">
        <div class="login-box card rounded">
            <div class="card-body">
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <img class="center" src="{{ asset('/public/assets/images/logo_akbid.png') }}" width="80vw">
                    <h3 class="box-title m-b-20 text-center font-weight-bold">Sistem Informasi Akademik</h3>
                    
                    <div class="form-group{{ $errors->has('nomor_induk') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" id="nomor_induk" type="text" class="form-control" name="nomor_induk" placeholder="Nomor Induk"> 
                            
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" type="password" class="form-control" name="password" placeholder="Password">
                           
                        </div>
                    </div>
                    @if (session('error'))
                        <center>
                            <span class="help-block">
                                <strong style="color:red;">{{ session('error') }}</strong>
                            </span>
                        </center>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-info pull-left p-t-0">
                                
                            </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class=""></i> </a> </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-outline-success btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>

@endsection
