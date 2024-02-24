<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facedes\File;

class menuControler extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris=5;

        if(strlen($katakunci)){
            $data=menu::where('id_menu','like',"%$katakunci%")
            ->orwhere('menu','like',"%$katakunci%")
            ->orwhere('deskripsi','like',"%$katakunci%")
            ->orwhere('harga','like',"%$katakunci%")
            ->orwhere('image','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data=menu::orderBy('id_menu','desc')->paginate($jumlahbaris);
        }

        return view('dashboard.menu.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_menu' => 'required|numeric|unique:menu,id_menu',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:6048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'id_menu.required' => 'ID Menu harus diisi',
            'id_menu.numeric' => 'ID Menu harus dalam angka',
            'id_menu.unique' => 'ID Menu sudah ada',
            'menu.required' => 'Nama Menu harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus dalam angka',
            'image.required' => 'Gambar harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);
    
        // Menyimpan data ke dalam array
        $data = [
            'id_menu' => $request->id_menu,
            'menu' => $request->menu,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'image' => $request->image,
        ];

        
        $imageName = $request->file('image')->hashName();
        $data['image'] = $imageName;
        $menuDirectory = public_path() . '/menu-images';
        $request->file('image')->move($menuDirectory, $imageName);
    
        menu::create($data);
        return redirect()->route('menu.index')->with('success', 'data berhasil diinput');
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
    public function edit(string $id_menu)
    {
        $data = menu::findOrFail($id_menu);
        return view('dashboard.menu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_menu)
    {
        // Validasi input
        $validate= $request->validate([
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'menu.required' => 'Nama Menu harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus dalam angka',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        $menu = menu::find($id_menu);

        if ($request->hasFile('image')){
            $imageName = $request->file('image')->hashName();
            $validate['image'] = $imageName;
            $menuDirectory = public_path() . '/menu-images';
            $request->file('image')->move($menuDirectory, $imageName);
        }
        $menu->update($validate);
        return redirect()->route('menu.index')->with('success', 'daata berhasil dirubah');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_menu)
    {
        menu::where('id_menu', $id_menu)->delete();
        return redirect()->to('menu')->with('success','Data berhasil dihapus!');
    }
}
