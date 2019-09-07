@extends('layouts.app')

@section('content')
    <section id="main-wrapper">

        <div class="col-12">

            @if (session('message'))
                <div class="alert alert-success col-6">{{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>

            @endif

            <div class="card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Daftar Matakuliah</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        
                        @foreach ($result as $key => $value)
                            <!-- Column -->
                            <div class="col-md-6 col-lg-4 col-xlg-3">
                                <a href="{{ route('dosen.absensi.detail', ['id_krs' => $value['id'], 'total_pertemuan' => $value['pertemuan']]) }}">
                                <div class="card">
                                    <div class="box bg-dark text-center">
                                        <h2 class="font-light text-white">{{ $value['nama'] }}</h2>
                                        <h4 class="font-light text-white">{{ $value['kode_matakuliah'] }}</h4>
                                        <h5 class="font-light text-white">{{ $value['program_studi'] }}</h5>
                                        <h6 class="font-light text-white">SEMESTER : {{ $value['semester'] }}</h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script type="text/javascript">
    
    console.log('SESSION : ', )

</script>
@endsection
