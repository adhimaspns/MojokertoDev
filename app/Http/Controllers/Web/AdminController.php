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
        $admins = User::where('role','admin', 'superadmin')->paginate(10);

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

            $imageName = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('image'), $imageName);

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

            // return $admin;
            return redirect('admin/create')->with('sukses', 'Data Berhasil Di Tambahkan');

        }

        
        
        else {
            return redirect('superadmin/data-admin/create')->with('gagal', 'Masukkan Foto');
            // return "tidak ada";
        }

    }

    public function detail($id) {

        $admin = User::find($id);

        return view('backend.superadmin.detail', compact('admin'));
    }

    public function destroy($id)
    {
        $admin = User::where('id', $id)->first();
        // Menghapus file pada directory
        File::delete('image/'.$admin->foto);

        // Hapus User
        User::where('id', $id)->delete();
        
        
        return redirect()->back()->with('hapus','Data Berhasil Dihapus');
        // return redirect('admin')->with('hapus','Data Berhasil Dihapus');

    }
}
