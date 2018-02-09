@extends('layouts.app')                
@section('content')
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/updateCustomer/{{ $edit->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Customer</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $edit->name }}" required autofocus>

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
                                <input id="addres" type="text" class="form-control" name="addres" value="{{ $edit->addres }}" required>

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
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ $edit->phone }}" required>

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
                                    <option {{ $edit->gender }}@if($edit->gender == 'Laki-laki') selected  @endif>Laki-laki</option>
	                                <option @if($edit->gender == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @endsection