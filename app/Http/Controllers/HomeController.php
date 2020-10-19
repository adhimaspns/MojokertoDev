<?php

namespace App\Http\Controllers;

use App\Event;
use App\Models\Mentor;
use App\Models\Show;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user  = User::where('role','admin')->count();
        $event = Event::all()->count();
        $show  = Show::all()->count();
        $mentors = Mentor::all()->count();




        return view('backend.dashboard', compact('user' , 'event' , 'show', 'mentors'));
    }
}
