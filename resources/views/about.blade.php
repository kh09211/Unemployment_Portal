@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-9 text-right">
            <a class="text-white h5" href="{{ route('home') }}">
                <strong>{{ __('Dashboard') }}</strong>
            </a>
            <a class="text-white h5 ml-3" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <strong>{{ __('Logout') }}</strong>
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-9 px-0">
            <div class="about">
                <div class="bar_top_white rounded-top"></div>
                <div class="bar_top_red">
                    <strong>About UI Portal</strong>
                </div>

                <div class="white_body pt-4 pb-2 px-3">
                    <p>Welcome to the Unemployment Portal. The place where we pay out to the applicant who can appeal with precision. In truth this website is just a satirical version of my own state's unemployment website. Being unemployed and stuck in the coronavirus quarantine, I was inspired by my state website's crashes and errors, to write my own functional version. In the process I was able to further develop my coding skillset while learning a new technology.</p>

                    <div class="px-3 pb-3">
                        <img src="{{ asset('photos/crash.jpg') }}" class="rounded img-fluid rounded" alt="Server crash">
                    </div>
               

                    <p>Since I didn't want to bore the 'applicants' with monotonous questions, the amount of input data and the overall scope of the site is much smaller than a real unemployment website. Though it could be scaled to support many users. Applicants arrive at the login page. If the SSN entered is known, the site routes the user to their dashboard page where information is shown and changed. If the SSN is unknown, the site redirects the user to registration. Once registered the user must fill out some information and make appeals within a particular sequence directed by the 'status' tab. Information is securely stored in the database, retrieved and shown in the browser, and available for updates any time.</p>

                    <p>Once appealing, the applicant is now in a version of king of the hill. Applicants must try to out-appeal eachother to stay in the #1 spot, presumably recieving the one and only hypothetical unemployment check. As other users make appeals, the applicant starts moving down the rank on the appeals scoreboard. Luckly appeals are timed so that the user can re-appeal once an hour has passed.</p>

                    <div class="row justify-content-center align-items-center d-flex mb-5 pt-2">
                        <div><img class="rounded-circle mr-1" src=" {{ asset('photos/kyle_square.jpg') }}" alt="kyle photo" style="height: 85px"></div>
                        <form action="http://kyleweb.dev/#contact"
                        <div><button class="btn btn-success ml-1" type="submit" style="font-size:16px;">Hire Kyle</button>
                        </form>

                    </div>


                </div>

                <div class="bar_bottom_red rounded-bottom">
                    <div class="row justify-content-center">
                        <a href="#" class="text-white" style="font-size: 14px;">dol.yourstate.gov | Diagnostics | Human Trafficking Notice</a>
                    </div>
                    <div class="row align-items-center ml-0">
                        <div class="dol ml-5" style="font-size: 40px;">DOL</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
