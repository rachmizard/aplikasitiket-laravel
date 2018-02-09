<!-- Modal SHOW -->
@foreach ($reserva as $in)    
    <div class="modal fade bd-example-modal-lg" id="yourModal{{$in->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
          </div>
          <div class="modal-body">
                    <table class="table table-bordered table-hover">
                       <thead>
                        <tr>
                         <th>Kode Reservasi</th>
                         <td>{{ $in->reservation_code }}</td>
                        </tr>
                        <tr>
                         <th>Reservasi Ke</th>
                         <td>{{ $in->reservation_at }}</td>
                        </tr>
                        <tr>
                         <th>Tanggal Reservasi</th>
                         <td>{{ $in->reservation_date }}</td>
                        </tr>
                        <tr>
                         <th>Customer</th>
                         <td>{{ $in->customer['name']  }}</td>
                        </tr>
                        <tr>
                         <th>Kode Tempat Duduk</th>
                         <td>{{ $in->seat_code  }}</td>
                        </tr>
                        <tr>
                         <th>Rute</th>
                         <td>{{ $in->rute['rute_from'] }} ke {{ $in->rute['rute_to']  }}</td>
                        </tr>
                        <tr>
                         <th>Berangkat Pada</th>
                         <td>{{ $in->depart_at  }}</td>
                        </tr>
                        <tr>
                         <th>Harga</th>
                         <td>{{ $in->price   }}</td>
                        </tr>
                        <tr>
                         <th>Pengguna</th>
                         <td>{{ $in->user_id  }}</td>
                        </tr>
                       </thead>
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


<!-- start data of customer -->
    @foreach($reserva as $a)
        <div class="modal fade" id="confirm-customer{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Detail data Customer
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                       <thead>
                        <tr>
                         <th>Nama Customer</th>
                         <td>{{ $a->customer['name'] }}</td>
                        </tr>
                        <tr>
                         <th>Alamat</th>
                         <td>{{ $a->customer['addres'] }}</td>
                        </tr>
                        <tr>
                         <th>Nomor Telepon</th>
                         <td>{{ $a->customer['phone'] }}</td>
                        </tr>
                        <tr>
                         <th>Jenis Kelamin</th>
                         <td>{{ $a->customer['gender'] }}</td>
                        </tr>
                       </thead>
                      </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- end modal confirm customer -->

    <!-- start data of rute information -->
    @foreach($reserva as $b)
        <div class="modal fade" id="confirm-rute{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Detail data Rute
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                       <thead>
                        <tr>
                         <th>Berangkat Pada</th>
                         <td>{{ $b->rute['depart_at'] }}</td>
                        </tr>
                        <tr>
                         <th>Rute Dari</th>
                         <td>{{ $b->rute['rute_from'] }}</td>
                        </tr>
                        <tr>
                         <th>Rute Ke</th>
                         <td>{{ $b->rute['rute_to'] }}</td>
                        </tr>
                        <tr>
                         <th>Harga</th>
                         <td>{{ $b->rute['price'] }}</td>
                        </tr>
                       </thead>
                      </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- end modal rute data information -->
