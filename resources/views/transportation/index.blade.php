@extends('layouts.app')

@section('content') 
<div class="container">

<!-- Modal SHOW -->
@foreach ($rute as $in)    
    <div class="modal fade bd-example-modal-lg" id="yourModal{{$in->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Route Detail</h4>
          </div>
          <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td><b>#</b></td>
                                    <td><b>Berangkat Ke</b></td>
                                    <td><b>Rute Dari</b></td>
                                    <td><b>Rute Ke</b></td>
                                    <td><b>Harga</b></td>
                                    <td><b>Jenis Transportasi</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]"></td>
                                    <td>{{ $in->depart_at }}</td>
                                    <td>{{ $in->rute_from }}</td>
                                    <td>{{ $in->rute_to }}</td>
                                    <td>{{ $in->price }}</td>
                                    <td>{{ $in->transportation_id }}</td>
                            </tbody>
                        </table>
          </div>
          <div class="modal-footer">
               <a class="btn btn-xs btn-warning" href="#" data-dismiss="modal" data-toggle="modal" data-target="#confirm-edit{{$in->id}}">Edit</a>
                                   <!-- Button trigger modal -->
                <a class="btn btn-xs btn-danger" href="#" data-href="customer/deletemanual/{{ $in->id }}" data-toggle="modal" data-target="#confirm-delete" data-confirm="Are you sure you want to delete?">Delete</a>
            <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endforeach

<!-- end modal SHOW -->
<!-- modal tambah reservasi -->

        <div class="modal fade" id="confirm-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Tambah data Rute
                </div>
                <div class="modal-body">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/storeRoute">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('depart_at') ? ' has-error' : '' }}">
                            <label for="depart_at" class="col-md-4 control-label">Berangkat Pada</label>

                            <div class="col-md-6">
                                <input id="depart_at" type="text" class="form-control" name="depart_at" value="{{ old('depart_at') }}" autofocus>

                                @if ($errors->has('depart_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('depart_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rute_from') ? ' has-error' : '' }}">
                            <label for="reservation_at" class="col-md-4 control-label">Rute Dari</label>

                            <div class="col-md-6">
                                <input id="rute_from" type="text" class="form-control" name="rute_from" value="{{ old('rute_from') }}" required>

                                @if ($errors->has('rute_from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rute_from') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rute_to') ? ' has-error' : '' }}">
                            <label for="rute_to" class="col-md-4 control-label">Rute Ke</label>

                            <div class="col-md-6">
                                <input id="rute_to" type="text" class="form-control" name="rute_to" required>

                                @if ($errors->has('rute_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rute_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Harga</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="transportation_id" class="col-md-4 control-label">Jenis Transportasi</label>

                            <div class="col-md-6">
                                <select id="transportation_id" class="form-control" name="transportation_id" required>
                                    <option value="">--Transportation Type--</option>
                                    <option>Kereta</option>
                                    <option>Pesawat</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                                <button type="reset" data-dismiss="modal" class="btn btn-warning">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end tambah reservation -->
    <!-- modal edit reservasi -->
@foreach($rute as $got)
        <div class="modal fade" id="confirm-edit{{ $got->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    Edit data Rute
                </div>
                <div class="modal-body">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/updateRoute/{{ $got->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('depart_at') ? ' has-error' : '' }}">
                            <label for="depart_at" class="col-md-4 control-label">Berangkat Pada</label>

                            <div class="col-md-6">
                                <input id="depart_at" type="text" class="form-control" name="depart_at" value="{{ $got->depart_at }}" autofocus>

                                @if ($errors->has('depart_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('depart_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rute_from') ? ' has-error' : '' }}">
                            <label for="reservation_at" class="col-md-4 control-label">Rute Dari</label>

                            <div class="col-md-6">
                                <input id="rute_from" type="text" class="form-control" name="rute_from" value="{{ $got->rute_from }}" required>

                                @if ($errors->has('rute_from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rute_from') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rute_to') ? ' has-error' : '' }}">
                            <label for="rute_to" class="col-md-4 control-label">Rute Ke</label>

                            <div class="col-md-6">
                                <input id="rute_to" type="text" class="form-control" value="{{ $got->rute_to }}" name="rute_to" required>

                                @if ($errors->has('rute_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rute_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Harga</label>

                            <div class="col-md-6">
                                <input id="price" type="text" value="{{ $got->price }}" class="form-control" name="price" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="transportation_id" class="col-md-4 control-label">Jenis Transportasi</label>

                            <div class="col-md-6">
                                <select id="transportation_id" class="form-control" name="transportation_id" required>
                                    <option value="" disabled>--Transportation Type--</option>
                                    <option value="{{ $got->transportation_id }}">{{ $got->transportation_id }}</option>
                                    <option value="Kereta">Kereta</option>
                                    <option value="Pesawat">Pesawat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                                <button type="reset" data-dismiss="modal" class="btn btn-warning">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <!-- end edit rute -->
    <!-- start modal confirm delet -->
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


    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="home">Home Page</a></div>

                <div class="panel-body">
                <!-- Alert notification -->
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

                    <!-- end alert notifiation -->

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
            </div>
        </div>
    </div>
</div>
@endsection
