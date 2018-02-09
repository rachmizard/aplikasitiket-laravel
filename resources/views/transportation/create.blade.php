@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Customer</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/storeCustomer">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Customer</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('addres') ? ' has-error' : '' }}">
                            <label for="addres" class="col-md-4 control-label">Alamat Customr</label>

                            <div class="col-md-6">
                                <input id="addres" type="text" class="form-control" name="addres" value="{{ old('addres') }}" required>

                                @if ($errors->has('addres'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('addres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Nomor Telephone</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender" required>
	                                <option>Laki-laki</option>
	                                <option>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
