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
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('administration.recipients.index') }}">{{ __('messages.recipients') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.new') }} {{ __('messages.recipient') }}</li>
                                </ol>
                                <!-- End Breadcrumb -->

                                <!-- Title -->
                                <h1 class="header-title">
                                    {{ __('messages.new') }} {{ __('messages.recipient') }} 
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
                <form class="mb-4" method="post" action="{{ route('administration.recipients.store') }}">
                    
                    @csrf
                    
                    <div class="form-group">
                        <label>
                            {{__('messages.client')}}
                        </label>
                        <select class="form-control" data-toggle="select" name="client_id" placeholder="" required>
                            <option></option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>    
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    {{__('messages.name')}}
                                </label>
                                <input type="text" class="form-control" name="name" placeholder="{{__('messages.name')}}" required value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    {{__('messages.surname')}}
                                </label>
                                <input type="text" class="form-control" name="surname" placeholder="{{__('messages.surname')}}" required value="{{ old('surname') }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    {{__('messages.lastname')}}
                                </label>
                                <input type="text" class="form-control" name="lastname" placeholder="{{__('messages.lastname')}}" required value="{{ old('lastname') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    {{__('messages.phone')}}
                                </label>
                                <input type="text" class="form-control" name="phone" placeholder="{{__('messages.phone')}}" required value="{{ old('phone') }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>
                            {{__('messages.full_address')}}
                        </label>
                        <textarea name="full_address"  placeholder="{{__('messages.full_address')}}"  rows="2" class="form-control" required>{{ old('full_address') }}</textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    {{__('messages.email')}}
                                </label>
                                <input type="email" class="form-control" placeholder="{{__('messages.email')}}" name="email" required value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>
                                    {{__('messages.nid')}}
                                </label>
                                <div class="row">
                                    <div class="col">
                                            <input type="text" placeholder="{{__('messages.nid_type')}}" class="form-control" name="nid_type" required value="{{ old('nid_type') }}">
                                    </div>
                                    <div class="col-auto">
                                            <input type="text" class="form-control" placeholder="{{__('messages.nid')}}" name="nid" required value="{{ old('nid') }}">
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    {{__('messages.bank_name')}}
                                </label>
                                <input type="text" class="form-control" name="bank_name" placeholder="{{__('messages.bank_name')}}" required value="{{ old('bank_name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{__('messages.account_number')}}
                                    </label>
                                    <input type="text" class="form-control" name="account_number" placeholder="{{__('messages.account_number')}}" required value="{{ old('account_number') }}">
                                </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="mt-5 mb-5">

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ __('messages.create') }}
                    </button>
                    <a href="{{ route('administration.recipients.index') }}" class="btn btn-block btn-link text-muted">
                        {{ __('messages.cancel') }}
                    </a>

                </form>

            </div>
        </div> <!-- / .row -->
    </div>
@endsection
