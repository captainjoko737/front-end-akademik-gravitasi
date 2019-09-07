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
                        <a type="button" class="btn btn-info btn-sm" href="{{ route('admin.krs.add') }}"><i class="fa fa-plus"></i> Add </a>
                        <a type="button" class="btn btn-info btn-sm" href="{{ route('admin.import.krs') }}"><i class="fa fa-plus"></i> Import </a>
                        <br><br>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success col-8">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example-krs" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Program Studi</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Semester</th>
                                    <th>Angkatan</th>
                                    <th>Tahun Akademik</th>
                                    <th>Kode Dosen</th>
                                    <th>Waktu</th>
                                    <th>Hari</th>
                                    <th>Pertemuan</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Program Studi</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Semester</th>
                                    <th>Angkatan</th>
                                    <th>Tahun Akademik</th>
                                    <th>Kode Dosen</th>
                                    <th>Waktu</th>
                                    <th>Hari</th>
                                    <th>Pertemuan</th>
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
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->program_studi }}</td>
                                        <td>{{ $value->kode_matakuliah }}</td>
                                        <th>{{ $value->semester }}</th>
                                        <th>{{ $value->angkatan }}</th>
                                        <th>{{ $value->tahun_akademik }}</th>
                                        <th>{{ $value->dosen }}</th>
                                        <td>{{ $value->waktu }}</td>
                                        <td>{{ $value->hari }}</td>
                                        <td>{{ $value->pertemuan }}</td>
                                        <td>{{ $value->created_by }}</td>
                                        <td>{{ $value->updated_by }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>

                                        <td>
                                            <a href="{{ route('admin.krs.edit', ['id' => $value->id ]) }}" data-toggle="tooltip" data-original-title="Edit" > <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
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

                        url: '{{ route("admin.krs.delete")}}',
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
