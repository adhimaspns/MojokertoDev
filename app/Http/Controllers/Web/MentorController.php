<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $mentor = Mentor::find($id);

        return view('backend.mentor.show', compact('mentor', $mentor));

        // return response()->json($mentor);
    }
}
