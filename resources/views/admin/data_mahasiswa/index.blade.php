@extends('layouts.app')

@section('content')
    <section id="main-wrapper">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <div class="button pull-right">
                        <a type="button" class="btn btn-info btn-sm" href="{{ route('admin.mahasiswa.add') }}"><i class="fa fa-plus"></i> Add </a>
                        <a type="button" class="btn btn-info btn-sm" href="{{ route('admin.import.mahasiswa') }}"><i class="fa fa-plus"></i> Import </a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success col-8">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example-dosen" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Email</th>

                                    <th>Nomor Hp</th>
                                    <th>TTL</th>
                                    <th>Program Studi</th>
                                    <th>Semester</th>
                                    <th>Angkatan</th>
                                    <th>Tahun Akademik</th>
                                    <th>Kelas</th>
                                    <th>Status Pembayaran</th>

                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Status Login</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Hp</th>
                                    <th>TTL</th>
                                    <th>Program Studi</th>
                                    <th>Semester</th>
                                    <th>Angkatan</th>
                                    <th>Tahun Akademik</th>
                                    <th>Kelas</th>
                                    <th>Status Pembayaran</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Status Login</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach ($result as $key => $value)
                                    <tr>
                                        <td>{{ $value->nim }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->email }}</td>
                                        <th>{{ $value->nomor_hp }}</th>
                                        <th>{{ $value->tempat_lahir }}, {{ \Carbon\Carbon::parse($value->tanggal_lahir)->format('d M Y') }}</th>
                                        <th>{{ $value->program_studi }}</th>
                                        <th>{{ $value->semester }}</th>
                                        <th>{{ $value->angkatan }}</th>
                                        <th>{{ $value->tahun_akademik }}</th>
                                        <th>{{ $value->kelas }}</th>
                                        <th>{{ $value->status_pembayaran == 1 ? 'LUNAS' : 'BELUM LUNAS' }}</th>
                                        <td>{{ $value->alamat }}</td>
                                        <td>{{ $value->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                        <td>{{ $value->status_login == 1 ? 'Login' : 'Tidak Login' }}</td>
                                        <td>{{ $value->created_by }}</td>
                                        <td>{{ $value->updated_by }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>

                                        <td>
                                            <a href="{{ route('admin.mahasiswa.changePassword', ['id' => $value->id ]) }}" data-toggle="tooltip" data-original-title="Ganti Password" > <i class="fa fa-lock text-inverse m-r-10"></i> </a>
                                            <a href="{{ route('admin.mahasiswa.edit', ['id' => $value->id ]) }}" data-toggle="tooltip" data-original-title="Edit" > <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            <a onclick="drop({{$value->id}})" data-toggle="tooltip" data-original-title="Delete" > <i class="fa fa-trash-o text-danger m-r-10"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

<script type="text/javascript">
    
    function drop(id) {
        
        var data = {
                "id" : id};

        $(document).ready(function () {
            swal({   
                title: "Are you sure?",   
                text: "You will delete this data",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it !",   
                cancelButtonText: "No, cancel !",   
                closeOnConfirm: false,   
                closeOnCancel: false 
            }, function(isConfirm){   
                if (isConfirm) {    
                    
                    var href = $(this).attr('href');

                    $.ajax({

                        url: '{{ route("admin.mahasiswa.delete")}}',
                        data: data,
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        success: function (data) {
                            location.reload();
                        }, error: function (data) {
                            alert(data.responseText);
                        }

                    });
                } else {     
                    swal("Cancelled", "Your data is safe :)", "error");   
                } 
            });
        
        });
    }

</script>

@endsection
