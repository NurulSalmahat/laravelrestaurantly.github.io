<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservasi;

class reservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $data = reservasi::all();
        $jumlahbaris=5;
        if(strlen($katakunci)){
            $data=reservasi::where('no_meja','like',"%$katakunci%")
            ->orwhere('name','like',"%$katakunci%")
            ->orwhere('email','like',"%$katakunci%")
            ->orwhere('date','like',"%$katakunci%")
            ->orwhere('no_tlp','like',"%$katakunci%")
            ->orwhere('people','like',"%$katakunci%")
            ->orwhere('message','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data=reservasi::orderBy('no_meja','desc')->paginate($jumlahbaris);
        }
        return view('dashboard.reservasi.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session()->flash('no_meja', $request->no_meja);
        Session()->flash('name', $request->name);
        Session()->flash('email', $request->email);
        Session()->flash('no_telp', $request->no_telp);
        Session()->flash('date', $request->date);
        Session()->flash('people', $request->people);
        Session()->flash('message', $request->message);

        $request->validate([
            'no_meja' => 'required|unique:reservasi,no_meja',
            'name' => 'required',
            'email' => 'required',
            'no_tlp' => 'required|nullable',
            'date' => 'required|date_format:Y-m-d|nullable',
            'people' => 'required',
            'message' => 'required',
        ]);
        $data =[
            'no_meja'=> $request->no_meja,
            'name'=> $request->name,
            'email'=> $request->email,
            'no_tlp'=> $request->no_tlp,
            'date'=> $request->date,
            'people'=> $request->people,
            'message'=> $request->message,
        ];
        reservasi::create($data);
        return redirect()->to('/user')->with('success', 'data berhasil diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = reservasi::findOrFail($id);
        return view('dashboard.reservasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $no_meja)
    {
        $data = $request->validate([
            'email' => 'sometimes',
            'name' => 'sometimes',
            'no_tlp' => 'sometimes',
            'date' => 'sometimes|date_format:Y-m-d|nullable',
            'people' => 'sometimes',
            'message' => 'sometimes',
        ]);
        $data = [
            'no_meja' => $request->no_meja,
            'email' => $request->email,
            'name' => $request->name,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'date' => $request->date,
            'people' => $request->people,
            'message' => $request->message,
        ];
        
        $cari = reservasi::find($no_meja);
        $cari->update($data);
        return redirect()->to('/reservasi')->with('success', 'daata berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        reservasi::where('id', $id)->delete();
        return redirect()->to('reservasi')->with('success','Data berhasil dihapus!');
    }
}
