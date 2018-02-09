<!-- modal tambah rute -->

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

    <!-- end tambah route -->