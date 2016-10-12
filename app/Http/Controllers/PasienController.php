<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pasien;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Session;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all pasiens
        $pasiens = Pasien::all();


        //load the view
        return view('pasien.index')->with('pasiens', $pasiens);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //load add pasien form view
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'nama'    => 'required',
            'alamat'  => 'required',
            'telp'    => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
              return Redirect::to('pasiens/create')
                  ->withErrors($validator)
                  ->withInput(Input::except('password'));
        } else {
            // store
            $pasien = new Pasien;
            $pasien->nama = Input::get('nama');
            $pasien->alamat = Input::get('alamat');
            $pasien->telp = Input::get('telp');
            $pasien->save();

            // redirect
            Session::flash('message', 'Pasien berhasil ditambahkan!');
            return Redirect::to('pasiens');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the nerd
        $pasien = Pasien::find($id);

        // show the view and pass the nerd to it
        return view('pasien.show')
            ->with('pasiens', $pasien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
        $pasien = Pasien::find($id);

        // show the edit form and pass the nerd
        return view('pasien.edit')->with('pasiens', $pasien);
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
        // validate
        $rules = array(
            'nama'    => 'required',
            'alamat'  => 'required',
            'telp'    => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
              return Redirect::to('pasiens/'.$id.'/edit')
                  ->withErrors($validator)
                  ->withInput(Input::except('password'));
        } else {
            // store
            $pasien = Pasien::find($id);
            $pasien->nama = Input::get('nama');
            $pasien->alamat = Input::get('alamat');
            $pasien->telp = Input::get('telp');
            $pasien->save();

            // redirect
            Session::flash('message', 'Pasien berhasil diubah!');
            return Redirect::to('pasiens');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $pasien = Pasien::find($id);
        $pasien->delete();

        // redirect
        Session::flash('message', 'Data pasien berhasil dihapus!');
        return Redirect::to('pasiens');
    }
}
