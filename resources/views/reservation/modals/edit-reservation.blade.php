<!-- modal edit reservasi -->
@foreach($reserva as $got)
        <div class="modal fade" id="confirm-edit{{ $got->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    Edit data Reservasi
                </div>
                <div class="modal-body">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/updateReservation/{{ $got->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('reservation_code') ? ' has-error' : '' }}">
                            <label for="reservation_code" class="col-md-4 control-label">Kode Reservasi</label>

                            <div class="col-md-6">
                                <input id="reservation_code" type="text" class="form-control" name="reservation_code" value="{{ $got->reservation_code }}" autofocus>

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
                                <input id="reservation_at" type="text" class="form-control" name="reservation_at" value="{{ $got->reservation_at }}" required>

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
                                <input id="reservation_date" type="date" class="form-control" name="reservation_date" value="{{ $got->reservation_date }}" required>

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
                                <select id="users" class="form-control" name="customer_id" required>
                                    
                                    @foreach($customer as $in)
                                    <option value="{{ $in->id }}" @if(($got->customer_id) == ($in->id)) selected @endif>{{ $in->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('seat_code') ? ' has-error' : '' }}">
                            <label for="seat_code" class="col-md-4 control-label">Kode tempat duduk</label>

                            <div class="col-md-6">
                                <input id="seat_code" type="text" class="form-control" value="{{ $got->seat_code }}" name="seat_code" required>

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
                                    @foreach($rute as $in)
                                    <option value="{{ $in->id }}" @if(($got->rute_id) == ($in->id)) selected @endif> {{ $in->rute_from }} ke {{ $in->rute_to }}</option>
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
                                <input id="depart_at" type="text" class="form-control" value="{{ $got->depart_at }}" name="depart_at" required>

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
                                <input id="price" type="text" class="form-control" name="price" value="{{ $got->price }}" required>

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
                                <input id="user_id" type="text" class="form-control" value="{{ $got->user_id }}" name="user_id" required>

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
    <!-- end tambah reservation -->
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