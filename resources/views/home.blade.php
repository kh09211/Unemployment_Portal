@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end">
        <a class="text-white h4 mr-3" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <strong>{{ __('Logout') }}</strong>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header red_card">Unemployment Status</div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="mx-3"><strong>Status: </strong></div>
                    <div>First, fill and save 'Your Information' below</div>
                    <div><button class="btn btn-success ml-2" disabled>Appeal</button></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header red_card">Your Information</div>
                <div class="card-body align-items-center justify-content-center">
                    <div class="row d-flex justify-content-between mb-4">
                        <div class="col-md-6">
                            <div class="text-center"><strong>SSN: {{ $user->dashes() }}</strong></div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center"><strong>Name: {{ $user->name }}</strong></div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row d-flex"> 
                            <div class="col-md-6">
                                <label for="email" class="col col-form-label">{{ __('SSN') }}</label><br>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The SSN must be a 9 digit number.</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="col col-form-label">{{ __('SSN') }}</label><br>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The SSN must be a 9 digit number.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex"> 
                            <div class="col-md-6">
                                <label for="email" class="col col-form-label">{{ __('SSN') }}</label><br>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The SSN must be a 9 digit number.</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nickname" class="col col-form-label">{{ __('Nickname') }}</label><br>
                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="" required autocomplete="nickname">

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </form>
                    <div class="text-right"><button class="btn btn-success">Save</button></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header red_card">Appeals Scoreboard</div>

                <div class="card-body text-center">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Rank</th>
                          <th scope="col">Nickname</th>
                          <th scope="col">Appeals</th>
                          <th scope="col">Time as #1</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
