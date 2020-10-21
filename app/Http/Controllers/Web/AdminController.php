<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $admins = User::where('role','admin')->paginate(10);

        return view('backend.superadmin.index', compact('admins'));
    }

    public function create() {
        return view('backend.superadmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'      => 'required',
            'back_name' => 'required',
            'address'   => 'required',
            'city'      => 'required',
            'region'    => 'required',
            'phone'     => 'required|min:11|max:12',
            'age'       => 'required|max:2',
            'username'  => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if (!$request->foto == 0) {

            $imageName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('image/user'), $imageName);

            $admin = User::create(
                [
                    // DB
                    'name' => $request->name,
                    'back_name' => $request->back_name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'region' => $request->region,
                    'phone' => $request->phone,
                    'age' => $request->age,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'token' => Str::random(40),
                    'foto' =>  $imageName,
                    'role' => 'admin',
                    'remember_token' => Str::random(60),
                ]    
            );

            return redirect('admin/create')->with('sukses', 'Data Berhasil Di Tambahkan');

        }else {

            return redirect('superadmin/data-admin/create')->with('gagal', 'Masukkan Foto');
        }

    }

    public function detail($id) {

        $admin = User::find($id);

        return view('backend.superadmin.detail', compact('admin'));
    }

    public function edit($id)
    {
        $admin = User::find($id);

        return view('backend.superadmin.edit', compact('admin', $admin));
    }

    public function update(Request $request, $id)
    {
        $admin = User::find($id);

        $request->validate([

            'name'      => 'required',
            'back_name' => 'required',
            'address'   => 'required',
            'city'      => 'required',
            'region'    => 'required',
            'phone'     => 'required|min:11|max:12',
            'age'       => 'required|max:2',
            'username'  => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);

         // Jika user gambar maka ini dijalankan
         if ($request->file != null) {
            // Deklarasi folder public
            $path = public_path() . '/image/user/';

            if ($admin->foto != '' && $admin->foto != null) {
                // menggambil file lama pada folder public dan dari DB
                $file_old = public_path('/image/user/' . $admin->foto);

                // mencari file lama jika ada pada public 
                if (File::exists($file_old)) {
                    
                    unlink($file_old); // jika ada file pada folder public/mentor, maka akan di hapus
                }
                
            }

            $file = $request->file; // get foto dari $request
            $filename = $file->getClientOriginalName(); // mengambil nama asli dari file yang di upload
            $file->move($path, $filename); //memindah file dari request ke folder public dengan nama asli
            $savePath = "/image/user/" . $filename; //Menyimpan file dengan nama file asli kedalam folder /image/mentor/ 
            
            // jika menggunakan ini akan di simpan dengan nama asli file yang di upload
            $request->merge(['foto'=> $filename]); //menggabungkan dan meyimpan di public dan di DB
        }

        $admin->update($request->except('_token', '_method'));

        return redirect('admin')->with('update', 'Berhasil  Update');
        
    }

    public function destroy($id)
    {
        $admin = User::where('id', $id)->first();
        // Menghapus file pada directory
        File::delete('image/user'.$admin->foto);

        // Hapus User
        User::where('id', $id)->delete();
        
        
        return redirect()->back()->with('hapus','Data Berhasil Dihapus');
        // return redirect('admin')->with('hapus','Data Berhasil Dihapus');

    }
}
