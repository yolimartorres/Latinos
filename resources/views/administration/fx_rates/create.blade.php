@extends('layouts.app2')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <!-- Header -->
                <div class="header mt-md-5">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Breadcrumb -->
                                <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('administration.fx_rates.index') }}">{{ __('messages.fx_rates') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.new') }} {{ __('messages.fx_rate') }}</li>
                                </ol>
                                <!-- End Breadcrumb -->

                                <!-- Title -->
                                <h1 class="header-title">
                                    {{ __('messages.new') }} {{ __('messages.fx_rate') }} 
                                </h1>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>


            </div>
        </div> <!-- / .row -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <!-- Form -->
                <form class="mb-4" method="post" action="{{ route('administration.fx_rates.store') }}">
                    
                    @csrf

                    <div class="form-group">
                        <label>
                            {{__('messages.currency_code')}}
                        </label>
                        <select class="form-control" data-toggle="select" name="currency_code" required>
                            <option></option>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency['code'] }}" {{ old('currency_code') == $currency['code'] ? 'selected' : '' }}>({{ $currency['code'] }}) {{ $currency['name'] }}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>
                            {{ __('messages.fx_rate') }}
                        </label>
                        <input type="number" class="form-control" name="fx_rate" required  step="any" value="{{ old('fx_rate') }}">
                    </div>

                    <!-- Divider -->
                    <hr class="mt-5 mb-5">

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ __('messages.create') }}
                    </button>
                    <a href="{{ route('administration.fx_rates.index') }}" class="btn btn-block btn-link text-muted">
                        {{ __('messages.cancel') }}
                    </a>

                </form>

            </div>
        </div> <!-- / .row -->
    </div>
@endsection