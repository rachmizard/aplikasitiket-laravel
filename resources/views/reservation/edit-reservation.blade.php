<button class="btn btn-default" href="#" data-href="/addReservation" data-toggle="modal" data-target="#confirm-add">Tambah Reservasi</button>
                    @foreach($reserva as $got)
                    <form action="reservation/delete/{{ $got->id }}">
                    @endforeach                        
                     <button type="submit" class="btn btn-primary">
                                  Hapus yang di pilih
                    </button>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td><b>#</b></td>
                                    <td><b>Kode Reservasi</b></td>
                                    <td><b>Reservasi Ke</b></td>
                                    <td><b>Customer</b></td>
                                    <td><b>Kode tempat duduk</b></td>
                                    <td><b>Rute</b></td>
                                    <td><b>Pengguna</b></td>
                                    <td><b>Aksi</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reserva as $in)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]"></td>
                                    <td>{{ $in->reservation_code }}</td>
                                    <td>{{ $in->reservation_at }}</td>
                                    <td><a class="btn btn-xs btn-warning" href="#" data-toggle="modal" data-target="#confirm-customer{{$in->id}}" href="#">{{ $in->customer->name }}</a></td>
                                    <td>{{ $in->seat_code }}</td>
                                    <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#confirm-rute{{$in->id}}" href="#">{{ $in->rute['rute_from'] }} ke {{ $in->rute['rute_to'] }}</a></td>
                                    <td>{{ $in->user_id }}</td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#yourModal{{$in->id}}" class="btn btn-xs btn-info">Detail</a>
                                    <a class="btn btn-xs btn-warning" href="#" data-toggle="modal" data-target="#confirm-edit{{$in->id}}" href="#">Edit</a>
                                   <!-- Button trigger modal -->
                                    <a class="btn btn-xs btn-danger" href="#" data-href="reservation/deletemanual/{{ $in->id }}" data-toggle="modal" data-target="#confirm-delete">
                                      Delete
                                    </a>
                                    </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </form>