<!-- modal tambah reservasi -->

        <div class="modal fade" id="confirm-add" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Tambah data Reservasi
                </div>
                <div class="modal-body">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/storeReservation">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('reservation_code') ? ' has-error' : '' }}">
                            <label for="reservation_code" class="col-md-4 control-label">Kode Reservasi</label>

                            <div class="col-md-6">
                                <input id="reservation_code" type="text" class="form-control" name="reservation_code" value="{{ rand() }}" autofocus>

                                @if ($errors->has('reservation_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reservation_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('reservation_at') ? ' has-error' : '' }}">
                            <label for="reservation_at" class="col-md-4 control-label">Reservasi Di</label>

                            <div class="col-md-6">
                                <input id="reservation_at" type="text" class="form-control" name="reservation_at" value="{{ old('reservation_at') }}" required>

                                @if ($errors->has('reservation_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reservation_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('reservation_date') ? ' has-error' : '' }}">
                            <label for="reservation_date" class="col-md-4 control-label">Tanggal Reservasi</label>

                            <div class="col-md-6">
                                <input id="reservation_date" type="date" class="form-control" name="reservation_date" required>

                                @if ($errors->has('reservation_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reservation_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="customer_id" class="col-md-4 control-label">Customer</label>

                            <div class="col-md-6">
                                {!! Form::text('customer_id', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text')) !!}

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('seat_code') ? ' has-error' : '' }}">
                            <label for="seat_code" class="col-md-4 control-label">Kode tempat duduk</label>

                            <div class="col-md-6">
                                <input id="seat_code" type="text" class="form-control" name="seat_code" required>

                                @if ($errors->has('seat_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seat_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rute_id') ? ' has-error' : '' }}">
                            <label for="rute_id" class="col-md-4 control-label">Rute</label>

                            <div class="col-md-6">
                                <select id="rute_id" class="form-control" name="rute_id" required>
                                    <option disabled selected>--Route--</option>
                                    @foreach($rute as $o)
                                        <option value="{{ $o->id }}">{{ $o->rute_from }} ke <?php echo $o->rute_to; ?> </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('rute_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rute_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('depart_at') ? ' has-error' : '' }}">
                            <label for="depart_at" class="col-md-4 control-label">Berangkat pada</label>

                            <div class="col-md-6">
                                <input id="depart_at" type="text" class="form-control" name="depart_at" required>

                                @if ($errors->has('depart_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('depart_at') }}</strong>
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

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Pengguna</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control" name="user_id" required>

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
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

