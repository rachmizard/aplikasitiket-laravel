<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Reservation;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderBy('id', 'DESC')->get();
        return view('customer.index')->with('customer', $customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('customer.create');
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

            'name' => 'required',
            'addres' => 'required',
            'phone' => 'required',
            'gender' => 'required',

        ]);

        $storage = new Customer();
        $storage->name = $request->name;
        $storage->addres = $request->addres;
        $storage->phone = $request->phone;
        $storage->gender = $request->gender;
        $storage->save();

        return redirect('customer')->with('message', 'Data berhasil di tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $show = Customer::find($id);
        return view('customer.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Customer::find($id);
        return view('customer.edit-customer', compact('edit'));
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

            'name' => 'required',
            'addres' => 'required',
            'phone' => 'required',
            'gender' => 'required',

        ]);

        $storage = Customer::find($id);
        $storage->name = $request->name;
        $storage->addres = $request->addres;
        $storage->phone = $request->phone;
        $storage->gender = $request->gender;
        $storage->save();

        return redirect('customer')->with('edited', 'Data berhasil di edit');
        
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
          return redirect('customer')->with('hapuspilihnotif', 'Anda belum menceklis beberapa data untuk di hapus!');        
        }else{
          Customer::whereIn("id",$checked)->delete();
          return redirect('customer')->with('messagehapus', 'Data berhasil di hapus!');        
        }
    }

    public function destroymanual($id)
    {
        $delete = Customer::find($id);
        $delete->delete();

        return redirect('customer')->with('hapus', 'Data berhasil di hapus');
    }
}
