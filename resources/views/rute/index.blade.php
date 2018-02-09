
@extends('..master')

@section('content') 

@include('rute.modals.create')
@include('rute.modals.show')
@include('rute.modals.edit-rute')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <section class="content-header">
      <h1>
        Customer
        <small>Route Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Route</li>
      </ol>
    </section>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Table Route</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <button class="btn btn-default" href="#" data-href="/addReservation" data-toggle="modal" data-target="#confirm-add">Tambah Rute</button>
                    @foreach($rute as $got)
                    <form action="reservation/delete/{{ $got->id }}">
                    @endforeach                        
                     <button type="submit" class="btn btn-primary">
                                  Hapus yang di pilih
                    </button>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td><b>#</b></td>
                                    <td><b>Berangkat Ke</b></td>
                                    <td><b>Rute Dari</b></td>
                                    <td><b>Rute Ke</b></td>
                                    <td><b>Harga</b></td>
                                    <td><b>Jenis Transportasi</b></td>
                                    <td><b>Aksi</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rute as $in)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]"></td>
                                    <td>{{ $in->depart_at }}</td>
                                    <td>{{ $in->rute_from }}</td>
                                    <td>{{ $in->rute_to }}</td>
                                    <td>{{ $in->price }}</td>
                                    <td>{{ $in->transportation_id }}</td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#yourModal{{$in->id}}" class="btn btn-xs btn-info">Detail</a>
                                    <a class="btn btn-xs btn-warning" href="#" data-toggle="modal" data-target="#confirm-edit{{$in->id}}" href="#">Edit</a>
                                   <!-- Button trigger modal -->
                                    <a class="btn btn-xs btn-danger" href="#" data-href="route/deletemanual/{{ $in->id }}" data-toggle="modal" data-target="#confirm-delete">
                                      Delete
                                    </a>
                                    </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- ./col -->
      </div>
    </div>


<!-- modal confirm delete -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Hapus data Customer
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

<!-- end modal confirm delete -->

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @if(session()->has('hapus'))
                        <div class="alert alert-success">
                            {{ session()->get('hapus') }}
                        </div>
                    @endif

                     @if(session()->has('hapuspilihnotif'))
                        <div class="alert alert-success">
                            {{ session()->get('hapuspilihnotif') }}
                        </div>
                    @endif

                     @if(session()->has('messagehapus'))
                        <div class="alert alert-success">
                            {{ session()->get('messagehapus') }}
                        </div>
                    @endif

                     @if(session()->has('edited'))
                        <div class="alert alert-success">
                            {{ session()->get('edited') }}
                        </div>
                    @endif 
                    
                </div>
        
@endsection


