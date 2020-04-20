<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {   
        $user = $request->user();

        $status = $this->status($user);

        $ranks = $this->get_ranks();

        // return view('home', ['user' => $user, 'status' => $status, 'ranks' => $ranks]);
        return view('home', compact('user', 'status', 'ranks'));
    }

    public function status($user) {
        // elseif chain logic for the status card

        $no_1 = $this->is_number1();

        if ($user->profile->appeal == null && $user->profile->nickname == null) {
            
            return [
                'message' => "First, fill and save 'Your Information' below",
                'disabled' => 'disabled'
            ];

        } elseif ($user->profile->appeal == null && $user->profile->nickname !== null) {
            
            return [
            'message' => "Your initial clam has been denied. Please appeal now -->",
            'disabled' => ''
            ];

         } elseif ($user->id == $no_1) {
            
            return [
            'message' => "Congratulations! You're currently #1 in line!",
            'disabled' => 'disabled'
            ];

        } elseif ($user->id != $no_1 && $this->can_appeal($user->profile->appeal)) {
            
            return [
            'message' => "You are no longer first in line, appeal now to reclaim it!",
            'disabled' => ''
            ];

        } elseif ($user->id != $no_1 && ! $this->can_appeal($user->profile->appeal)) {
            
            return [
            'message' => "You lost the #1 spot and may only appeal once per hour",
            'disabled' => 'disabled'
            ];

        } else {
            
            return [
            'message' => "error, please report to admin",
            'disabled' => 'disabled'
            ];
        }
    }
    public function can_appeal($date) {
        // the logic to deterine how soon a user can re appeal
        $date_appeal = strtotime($date);
        $date_now = strtotime(now()->toDateTimeString());
        $time_since = $date_now - $date_appeal; // gives us the time difference in seconds
        
        //dd($time_since);
        return ($time_since >= 3600);
    }

    public function is_number1() {
        // $latest = $this->get_ranks()->first()->user_id;

        $latest = $this->get_ranks()->first();
        if (isset($latest->user_id)) {
            return $latest->user_id;
        }
    }

    public function get_ranks() {
        // gets the profiles ordered by appeal date newest first
        $ranks = \App\Profile::whereNotNull('appeal')->latest('appeal')->paginate(10);
        
        return $ranks;
    }
}
