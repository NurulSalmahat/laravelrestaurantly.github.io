<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Http\UploadedFile;

class chefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris=5;
        if(strlen($katakunci)){
            $data=chef::where('id_chef','like',"%$katakunci%")
            ->orwhere('name','like',"%$katakunci%")
            ->orwhere('posisi','like',"%$katakunci%")
            ->orwhere('email','like',"%$katakunci%")
            ->orwhere('image','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data=chef::orderBy('id_chef','desc')->paginate($jumlahbaris);
        }
        return view('dashboard.chef.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_chef' => 'required|numeric|unique:chef,id_chef',
            'name' => 'required',
            'posisi' => 'required',
            'email' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:6048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'id_chef.required' => 'ID Chef harus diisi',
            'id_chef.numeric' => 'ID Chef harus dalam angka',
            'id_chef.unique' => 'ID Chef sudah ada',
            'name.required' => 'Nama Chef harus diisi',
            'posisi.required' => 'Posisi harus diisi',
            'email.required' => 'email harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);
    
        // Menyimpan data ke dalam array
        $data = [
            'id_chef' => $request->id_chef,
            'name' => $request->name,
            'posisi' => $request->posisi,
            'email' => $request->email,
            'image' => $request->image,
        ];
    
        
        $imageName = $request->file('image')->hashName();
        $data['image'] = $imageName;
        $chefDirectory = public_path() . '/chef-images';
        $request->file('image')->move($chefDirectory, $imageName);
    
        chef::create($data);
        return redirect()->to('chef')->with('success', 'data berhasil diinput');
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
        $data = chef::findOrFail($id);
        return view('dashboard.chef.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validate= $request->validate([
            'name' => 'required',
            'posisi' => 'required',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048', // Sesuaikan dengan kebutuhan Anda
        ], [
            'name.required' => 'Nama harus diisi',
            'posisi.required' => 'Posisi harus diisi',
            'email.required' => 'email harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        $chef = chef::find($id);

        if ($request->hasFile('image')){
            $imageName = $request->file('image')->hashName();
            $validate['image'] = $imageName;
            $chefDirectory = public_path() . '/chef-images';
            $request->file('image')->move($chefDirectory, $imageName);
        }
        $chef->update($validate);
        return redirect()->route('chef.index')->with('success', 'daata berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        chef::where('id', $id)->delete();
        return redirect()->to('chef')->with('success','Data berhasil dihapus!');
    }
}
