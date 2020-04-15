@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md px-0">
            <div class="">
                <div class="bar_top_white rounded-top"></div>
                <div class="bar_top_red">
                    <strong>Unemployment Insurance Claim</strong>
                </div>

                <div class="white_body p-5">
                    <div id="copy">
                        <H4 class="text-center">What is Unemployment Portal?</H4>

                        <p align="left">Unemployment Portal (UP) is a satirical game and not a real version of any state's covid-19 unemployment website. The way the game works is: </p>

                        <p align="left">Use a non-real SSN (without dashes or slashes) to begin the Unemployment Portal game.</p>

                        <p align="left">Users must fight eachother for unemployment payment by being the latest person to make an appeal. Appeals may be submitted once per day.</p>

                        <p align="left">Users are ranked by order of latest appeal made. The player who holds the #1 spot the longest is the winner and is awarded the UI Check</p>

                        <H4 class="pt-2 text-center">What is Unemployment Insurance?</H4>

                        <p align="left">Unemployment insurance (UI) provides temporary financial
                            assistance to workers unemployed through no fault of their own while
                            seeking a new job. Unemployment benefits help bridge the gap between
                            jobs by replacing part of the worker's lost income.</p>

                        <p align="left">UI is funded entirely by
                            employer contributions. In State, no withholdings are made from
                            workers' pay for these benefits.</p>

                        <p align="left">As of July 1, 2012, the UI rate
                            in use at the time a claim is filed determines the maximum number of
                            potential weeks of UI eligibility to be between fourteen (14) and
                            twenty (20) weeks. The UI Benefit Determination
                            will provide the unemployment rate for your claim-filing period.</p>

                        <p align="left">The Internet claim filing system is designed to
                            enable you to file a claim for unemployment benefits. You will not be
                            charged a fee for using this service.</p>

                        <H4>
                            <H4 class="text-center">Who can file a State claim?</H4>
                        </H4>
                        <p align="left">Individuals who worked or earned wages in the state
                            in the past 2 years can file a State claim; and</p>

                        <p align="left">If you reside in State, you must also register for
                            employment services immediately upon filing your
                            claim to avoid delay or denial of benefits; or</p>

                        <p align="left">If you reside outside the state and have
                            earned State wages in the past two years, contact the State Workforce
                            Agency in your state of residence to register for employment services
                            in the state of residence.</p>

                        <p align="left">Before submiting any information, you must confirm that:</p>

                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <p align="left" class="ml-3">
                            
                                <input type="checkbox" required class="mr-1 mt-2"><span class="text-danger">*</span> By checking this box, I certify that I understand that it is very, very, very, unlikely that I will recieve any payments of any kind through this app. I understand that this website is a game and not a real unemployment website.
                            </p>

                    </div>
                    

                        <div class="form-group row pt-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('SSN') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{-- $message --}}SSN Found, but your password is incorrect.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
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
