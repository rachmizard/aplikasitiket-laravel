@extends('master')

@section('content')
                

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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
            <a class="btn btn-default" href="/customer">Customer Page</a>
            <a class="btn btn-default" href="/reservation">Reservation Page</a>
            <a class="btn btn-default" href="/route">Rute Page</a>
            <a class="btn btn-default" href="/transport">Transportation Page</a>
    </section>

    
  </div>
@endsection
