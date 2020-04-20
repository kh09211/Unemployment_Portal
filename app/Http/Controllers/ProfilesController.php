<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{

	/** ADD AUTH MIDLEWARE TO THE CONTROLLER
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    // construct the controller with auth middleware so that we can make sure the user is logged in
    {
        $this->middleware('auth');
    }


    public function update(Request $request) {
    	
    	// check to see which button sent the update request
    	if ($request['appeal']) {
    		$validated_data['appeal'] = now()->toDateTimeString();

    		$alert_message = 'Your appeal was successfully made!!! Check your status for result';

    	} else {
			// first validate data so we can be strict. protected $guarded in the model was set to []
			$validated_data = $request->validate([
				'nickname' => ['required', 'string', 'max:20'],
		        'job_title' => ['required', 'string', 'max:20'],
		        'job_date' => ['required', 'string'],
		        'work' => ['required', 'string'],
			]);

			$check_appeal = auth()->user();

			if (($check_appeal->profile->appeal) == null) {
				$alert_message = 'Your Information has been saved, but the automated system denied your claim. Please make an appeal.';
			} else {
				$alert_message = 'Your Information has been saved!';
			}
    	}

    	// update the information to the databse of the authorized user
    	$user = auth()->user();
    	$user->profile->update($validated_data);

    	// returns user to the view along with the status that will be a pop-up message
    	return redirect()->route("home")->with('status', $alert_message);
    }
}
