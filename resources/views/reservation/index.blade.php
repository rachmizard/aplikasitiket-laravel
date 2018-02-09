@extends('..master')

@section('content') 

@include('reservation.modals.create')
@include('reservation.modals.show')
@include('reservation.modals.edit-reservation')


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
        <small>Reservation Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reservation</li>
      </ol>
    </section>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Table Reservation</h3>
              {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Enter name'])}}
            </div>
            <!-- /.box-header -->
            <div class="box-body"><button class="btn btn-default" href="#" data-href="/addReservation" data-toggle="modal" data-target="#confirm-add">Tambah Reservasi</button>
                @foreach($reserva as $got)
                    <form action="reservation/delete/{{ $got->id }}">
                @endforeach                        
                     <button type="submit" class="btn btn-primary"> Hapus yang di pilih</button>
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <td><b>#</b></td>
                                    <td><b>Kode Reservasi</b></td>
                                    <td><b>Reservasi Ke</b></td>
                                    <td><b>Customer</b></td>
                                    <td><b>Kode tempat duduk</b></td>
                                    <td><b>Rute</b></td>
                                    <td><b>Pengguna</b></td>
                                    <td><b>Aksi</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reserva as $in)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]"></td>
                                    <td>{{ $in->reservation_code }}</td>
                                    <td>{{ $in->reservation_at }}</td>
                                    <td><a class="btn btn-xs btn-warning" href="#" data-toggle="modal" data-target="#confirm-customer{{$in->id}}" href="#">{{ $in->customer->name }}</a></td>
                                    <td>{{ $in->seat_code }}</td>
                                    <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#confirm-rute{{$in->id}}" href="#">{{ $in->rute['rute_from'] }} ke {{ $in->rute['rute_to'] }}</a></td>
                                    <td>{{ $in->user_id }}</td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#yourModal{{$in->id}}" class="btn btn-xs btn-info">Detail</a>
                                    <a class="btn btn-xs btn-warning" href="#" data-toggle="modal" data-target="#confirm-edit{{$in->id}}" href="#">Edit</a>
                                   <!-- Button trigger modal -->
                                    <a class="btn btn-xs btn-danger" href="#" data-href="reservation/deletemanual/{{ $in->id }}" data-toggle="modal" data-target="#confirm-delete">
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
