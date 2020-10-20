<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;
use File;

class MentorController extends Controller
{
    public function index()
    {
        $mentor = Mentor::orderBy('id', 'ASC')->paginate(10);

        return view('backend.mentor.index', compact('mentor', $mentor));
        // return response()->json($mentor);
    }

    public function create()
    {
        return view('backend.mentor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pekerjaan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if (! $request->foto == 0) {
            $imageName = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('image/mentor'), $imageName);

            $mentor = Mentor::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'pekerjaan' => $request->pekerjaan,
                'foto' => $imageName
            ]);

            return redirect('mentor/create')->with('sukses', 'Data Berhasil Ditambah');

        } else {
             return redirect('mentor/create')->with('gagal', 'Data Berhasil Gagal Ditambah');
        }
        
    }

    public function show($id)
    {
        $mentor = Mentor::find($id);

        return view('backend.mentor.show', compact('mentor', $mentor));

    }

    public function edit($id)
    {
        $mentor = Mentor::find($id);

        // return $mentor;
        return view('backend.mentor.edit', compact('mentor'));
    }

    public function update(Request $request, $id)
    {
        $mentor = Mentor::find($id);

        

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pekerjaan' => 'required',
        ]);

        // Jika user gambar maka ini dijalankan
        if ($request->file != null) {
            // Deklarasi folder public
            $path = public_path() . '/image/mentor/';

            
            if ($mentor->foto != '' && $mentor->foto != null) {
                // menggambil file lama pada folder public dan dari DB
                $file_old = public_path($mentor->foto);

                // mencari file lama jika ada pada public 
                if (File::exists($file_old)) {
                    
                    unlink($file_old); // jika ada file pada folder public/mentor, maka akan di hapus
                }
                
            }


            $file = $request->file; // get foto dari $request
            $filename = $file->getClientOriginalName(); // mengambil nama asli dari file yang di upload
            $file->move($path, $filename); //memindah file dari request ke folder public dengan nama asli
            $savePath = "/image/mentor/" . $filename; //Menyimpan file dengan nama file asli kedalam folder /image/mentor/ 
            
            $request->merge(['foto'=> $savePath]); //menggabungkan dan meyimpan di public dan di DB
             
        }

        $mentor->update($request->except('_token', '_method')); //Update dari $request kecuali '_token', '_method' *untuk yang tidak menggunakan fillable
        // $mentor->update($request->all());

        return redirect('mentor')->with('update', 'Berhasil  Update');

    }

    public function destroy($id)
    {
        $mentor = Mentor::where('id', $id)->first();

        File::delete('image/mentor/'. $mentor->foto);
        Mentor::where('id', $id)->delete();

        return redirect()->back()->with('hapus','Data Berhasil Dihapus');
    }
}
