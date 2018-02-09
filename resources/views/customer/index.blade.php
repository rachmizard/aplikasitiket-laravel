@extends('..master')

@section('content') 

@include('customer.modals.create')
@include('customer.modals.show')
@include('customer.modals.edit-customer')


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
        <small>Customer Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
      </ol>
    </section>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Table Customer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <button class="btn btn-md btn-success" href="#" data-href="/addCustomer" data-toggle="modal" data-target="#confirm-add" data-confirm="Are you sure you want to delete?" > <i class="fa fa-pencil"></i></button>
                    @foreach($customer as $got)
                            <form action="customer/delete/{{ $got->id }}">
                    @endforeach                        
                    <button type="submit" class="btn btn-cs btn-danger">Hapus yang di pilih.</button>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>No-Telp</td>
                                    <td>Jenis Kelamin</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer as $in)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]"></td>
                                    <td>{{ $in->name }}</td>
                                    <td>{{ $in->addres }}</td>
                                    <td>{{ $in->phone }}</td>
                                    <td>{{ $in->gender }}</td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#yourModal{{$in->id}}" class="btn btn-xs btn-info">Show</a>
                                    <a class="btn btn-xs btn-warning" href="#" data-toggle="modal" data-target="#confirm-edit{{$in->id}}" href="#">Edit</a>
                                   <!-- Button trigger modal -->
                                    <a class="btn btn-xs btn-danger" href="#" data-href="customer/deletemanual/{{ $in->id }}" data-toggle="modal" data-target="#confirm-delete" data-confirm="Are you sure you want to delete?">
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
