
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