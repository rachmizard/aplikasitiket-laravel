@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover">
                       <thead>
                        <tr>
                         <th>Nama Customer</th>
                         <td>{{ $show->name }}</td>
                        </tr>
                        <tr>
                         <th>Alamat</th>
                         <td>{{ $show->addres }}</td>
                        </tr>
                        <tr>
                         <th>Nomor Telepon</th>
                         <td>{{ $show->phone }}</td>
                        </tr>
                        <tr>
                         <th>Jenis Kelamin</th>
                         <td>{{ $show->gender }}</td>
                        </tr>
                       </thead>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
