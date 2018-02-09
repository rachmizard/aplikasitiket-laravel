<!-- Modal SHOW -->
@foreach ($customer as $in)    
    <div class="modal fade" id="yourModal{{$in->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
          </div>
          <div class="modal-body">
          <table class="table table-striped">
                <thead>
                    <tr>
                        <td><b>#</b></td>
                        <td><b>Nama Customer</b></td>
                        <td><b>Alamat</b></td>
                        <td><b>No-Telp</b></td>
                        <td><b>JK</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $in->id }}</td>
                        <td>{{ $in->name }}</td>
                        <td>{{ $in->addres }}</td>
                        <td>{{ $in->phone }}</td>
                        <td>{{ $in->gender }}</td>
                    </tr>
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