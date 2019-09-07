@extends('layouts.app')

@section('content')
    <section id="main-wrapper">
        
        <div class="container-fluid">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="{{ session('photo_profile') != null ? session('photo_profile') : '../public/assets/images/users/default_avatar.png' }}" class="img-circle" width="150" height="150" />
                                <h4 class="card-title m-t-10">{{ session('user')['nama'] }}</h4>
                                <h6 class="card-subtitle">{{ session('user')['nidn'] }}</h6>
                                
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> 
                            <small class="text-muted">KODE</small>
                            <h6>{{ session('user')['kode'] }}</h6> 
                            <small class="text-muted p-t-30 db">EMAIL</small>
                            <h6>{{ session('user')['email'] }}</h6> 
                            <small class="text-muted p-t-30 db">ALAMAT</small>
                            <h6>{{ session('user')['alamat'] }}</h6>
                            
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item bold"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><strong>PENGUMUMAN DOSEN</strong></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <div class="profiletimeline">
                                        
                                        @forelse ($result as $key => $value)
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../public/assets/images/logo_fkip_small.png" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="#" class="link">Administrator</a>
                                                        <p class="m-t-10 text-justify"> {{ $value['nama'] }} </p>
                                                    </div>
                                                    <span class="sl-date"> {{ Carbon\Carbon::parse($value['created_at'])->format('d F Y H:i:s') }}</span>
                                                </div>
                                            </div>
                                            <hr>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
    </section>
@endsection

@section('js')

@endsection
