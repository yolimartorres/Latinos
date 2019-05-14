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
                                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('administration.clients.index') }}">{{ __('messages.clients') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.new') }} {{ __('messages.client') }}</li>
                                </ol>
                                <!-- End Breadcrumb -->

                                <!-- Title -->
                                <h1 class="header-title">
                                    {{ __('messages.new') }} {{ __('messages.client') }} 
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
                <form class="mb-4" method="post" action="{{ route('administration.clients.store') }}" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="form-group">
                        <label>
                            {{__('messages.photo')}}
                        </label>
                        <div class="row mb-4 d-none" id="photo_preview_wrapper">
                            <div class="col"></div>
                            <div col-auto><img id="photo_preview" class="" /></div>
                            <div class="col"></div>
                        </div>
                        <div class="custom-file">
                            <input type="file" id="photo" class="custom-file-input" name="photo" onchange="previewPhoto(this, 'photo_preview')" required accept="image/*">
                            <label class="custom-file-label" for="photo">{{ __('messages.choose_file') }}</label>
                        </div>
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
                                    {{__('messages.birthdate')}}
                                </label>
                                <input type="text" class="form-control" name="birthdate" placeholder="{{__('messages.birthdate')}}" required value="{{ old('birthdate') }}" data-toggle="flatpickr">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        {{__('messages.ocupation')}}
                                    </label>
                                    <input type="text" class="form-control" name="ocupation" placeholder="{{__('messages.ocupation')}}" required value="{{ old('ocupation') }}">
                                </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="mt-5 mb-5">

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-block btn-primary">
                        {{ __('messages.create') }}
                    </button>
                    <a href="{{ route('administration.clients.index') }}" class="btn btn-block btn-link text-muted">
                        {{ __('messages.cancel') }}
                    </a>

                </form>

            </div>
        </div> <!-- / .row -->
    </div>
@endsection


@push('scripts')
    <script>

        function previewPhoto(input, preview_id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#" + preview_id).attr('src', e.target.result);
                    $("#" + preview_id).css('height', '300px');
                    $("#" + preview_id).parent().parent().removeClass('d-none');    
                }
                $("label[for='" + $(input).attr('id') + "']").text(input.files[0].name);
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endpush