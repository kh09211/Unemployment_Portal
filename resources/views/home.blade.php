@extends('layouts.app')

@section('content')

{{-- This alerts the user of the status sent to the view from the controller--}}
@if (session('status'))
        <script>
            alert('{{ session('status') }}');
        </script>
@endif

<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-9 text-right">
            <a class="text-white h5" href="{{ route('about') }}">
                <strong>{{ __('About') }}</strong>
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
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header red_card">Unemployment Status</h5>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="mx-3"><strong>Status: </strong></div>
                    <div>{{ $status['message'] }}</div>
                    <div>
                        <form method="POST" action="/profile/{{ $user->id }}">
                        @csrf
                        @method('PUT') 
                            <button class="btn btn-success ml-2" type="submit" name="appeal" value="appealed" {{ $status['disabled'] }}>Appeal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header red_card">Your Information</h5>
                <div class="card-body align-items-center justify-content-center">
                    <div class="row d-flex justify-content-between mb-4 mt-2">
                        <div class="col-md-6">
                            <div class="text-center"><strong>SSN: {{ $user->dashes() }}</strong></div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center"><strong>Name: {{ $user->name }}</strong></div>
                        </div>
                    </div>
                    <form method="POST" action="/profile/{{ $user->id }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row d-flex align-items-end"> 
                            <div class="col-md-6">
                                <label for="work" class="col col-form-label">{{ __('Are you currently looking for work?') }}</label><br>
                                <select id="work" class="form-control @error('work') is-invalid @enderror" name="work" required>
                                    <option value="" @if (old('work') == null) selected="selected" @endif>Select an answer</option>
                                    <option value="yes" @if ($user->profile->work == 'yes' || old('work') == 'yes') selected="selected" @endif>Yes</option>
                                    <option value="no" @if ($user->profile->work == 'no' || old('work') == 'no') selected="selected" @endif>No</option>
                                    <option value="maybe" @if ($user->profile->work == 'maybe' || old('work') == 'maybe') selected="selected" @endif>Maybe</option>
                                </select>

                                @error('work')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="job_date" class="col col-form-label">{{ __('Your last date of employment?') }}</label><br>
                                <input id="job_date" type="date" class="form-control @error('job_date') is-invalid @enderror" name="job_date" value="{{ $user->profile->job_date ?: old('job_date') }}" required autocomplete="job_date">

                                @error('job_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-end"> 
                            <div class="col-md-6">
                                <label for="job_title" class="col col-form-label">{{ __('Your previous job title') }}</label><br>
                                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" placeholder="Enter job title" value="{{ $user->profile->job_title ?: old('job_title') }}" required autocomplete="job_title">

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nickname" class="col col-form-label">{{ __('Nickname for scoreboard') }}</label><br>
                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" placeholder="Enter nickname" value="{{ $user->profile->nickname ?: old('nickname') }}" required autocomplete="nickname">

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-success" type="submit" 
                                @if ($status['disabled'] != 'disabled')
                                        disabled
                                @endif
                            >Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header red_card">Appeals Scoreboard</h5>

                <div class="card-body text-center">
                    <table class="table mt-1">
                      <thead>
                        <tr>
                          <th scope="col">Rank</th>
                          <th scope="col">Nickname</th>
                          <th scope="col">Past Job</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($ranks as $rank)
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $rank->nickname }}</td>
                          <td>{{ $rank->job_title }}</td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
