@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Leave Application') }}</div>

                <div class="card-body">
                        <form method="POST" action="/leave">

                    @csrf
                    @if (session('status'))

                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('Logein as Normal User!') }} -->
                    <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ $userinfo['name'] }}" required autocomplete="name" autofocus disabled><!--
                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                    <div class="row mb-3">
                            <label for="Reason" class="col-md-4 col-form-label text-md-end">{{ __('Reason') }}</label>

                            <div class="col-md-6">
                                <input id="reason" type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" value="{{ old('reason') }}" required autocomplete="reason" autofocus>
<!--
                                @error('fromdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="From Date" class="col-md-4 col-form-label text-md-end">{{ __('From Date') }}</label>

                            <div class="col-md-6">
                                <input id="fromdate" type="date" class="form-control @error('fromdate') is-invalid @enderror" name="fromdate" value="{{ old('fromdate') }}" required autocomplete="fromdate" autofocus>
<!--
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="To Date" class="col-md-4 col-form-label text-md-end">{{ __('To Date') }}</label>

                            <div class="col-md-6">
                                <input id="todate" type="date" class="form-control @error('todate') is-invalid @enderror" name="todate" value="{{ old('todate') }}" required autocomplete="todate" autofocus>
<!--
                                @error('todate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <input type='hidden' name='userid' id='userid' value="{{$userinfo['id']}}">
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
