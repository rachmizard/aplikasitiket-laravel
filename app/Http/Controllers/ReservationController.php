<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Customer;
use App\Rute;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        $rute = Rute::all();
        $reserva = Reservation::orderBy('id', 'DESC')->get();
        return view('reservation.index', compact('customer', 'reserva', 'rute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // still fixing!
    public function autoComplete(Request $request) {
           
            $term = Input::get('term');
            
            $results = array();
            
            $queries = DB::table('customer')
                ->where('id', 'LIKE', '%'.$term.'%')
                ->orWhere('name', 'LIKE', '%'.$term.'%')
                ->take(5)->get();
            
            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'value' => $query->id.' '.$query->name ];
            }
             return Response::json($results);

        }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'reservation_code' => 'required|numeric',
            'reservation_at' => 'required',
            'reservation_date' => 'required',
            'customer_id' => 'required',
            'seat_code' => 'required',
            'rute_id' => 'required',
            'depart_at' => 'required',
            'price' => 'required',
            'user_id' => 'required',

        ]);

        $storage = new Reservation();
        $storage->reservation_code = $request->reservation_code;
        $storage->reservation_at = $request->reservation_at;
        $storage->reservation_date = $request->reservation_date;
        $storage->customer_id = $request->customer_id;
        $storage->seat_code = $request->seat_code;
        $storage->rute_id = $request->rute_id;
        $storage->depart_at = $request->depart_at;
        $storage->price = $request->price;
        $storage->user_id = $request->user_id;
        $storage->save();

        return redirect('reservation')->with('message', 'Data berhasil di tambahan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [

            'reservation_code' => 'required|numeric',
            'reservation_at' => 'required',
            'reservation_date' => 'required',
            'customer_id' => 'required',
            'seat_code' => 'required',
            'rute_id' => 'required',
            'depart_at' => 'required',
            'price' => 'required',
            'user_id' => 'required',

        ]);

        $storage = Reservation::find($id);
        $storage->reservation_code = $request->reservation_code;
        $storage->reservation_at = $request->reservation_at;
        $storage->reservation_date = $request->reservation_date;
        $storage->customer_id = $request->customer_id;
        $storage->seat_code = $request->seat_code;
        $storage->rute_id = $request->rute_id;
        $storage->depart_at = $request->depart_at;
        $storage->price = $request->price;
        $storage->user_id = $request->user_id;
        $storage->save();

        return redirect('reservation')->with('message', 'Data berhasil di tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $checked = $request->input('checked',[]);
    
        if ($checked == null) {
          return redirect('reservation')->with('hapuspilihnotif', 'Anda belum menceklis beberapa data untuk di hapus!');        
        }else{
          Reservation::whereIn("id",$checked)->delete();
          return redirect('reservation')->with('messagehapus', 'Data berhasil di hapus!');        
        }
    }

    public function destroymanual($id)
    {
        $delete = Reservation::find($id);
        $delete->delete();

        return redirect('reservation')->with('hapus', 'Data berhasil di hapus');

    }

}
