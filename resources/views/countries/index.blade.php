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
                
                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  {{ __('overview') }}
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  {{ __('messages.recipients') }}
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button -->
                <a href="{{ route('countries.create') }}" class="btn btn-primary">
                  {{ __('messages.new') }} {{ __('messages.recipient') }} 

                </a>
                
              </div>
            </div> 
    
          </div>
        </div>
        @include('flash::message')
        <!-- Card -->
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col">

                <!-- Search -->
                <form class="row align-items-center d-none">
                  <div class="col-auto pr-0">
                    <span class="fe fe-search text-muted"></span>
                  </div>
                  <div class="col">
                      <input type="search" class="form-control form-control-flush search" placeholder="Search">
                  </div>
                </form>
                
              </div>
             
            </div> 
          </div>
          <div class="table-responsive">
           
          <h1>Lista de paises</h1>

<table class="table ">
<thead>
<tr>
<th scope="col">iso</th>
<th scope="col">name</th>
</tr>
</thead>
<tbody>
@foreach ($countries as $country)
<tr>

<th scope="col">{{ $country->iso}}</th>
<th scope="col">{{$country->name}} </th>
<th scope="col"><a href="/countries/{{$country->id}}/edit " class="btn btn-primary btn-sm"> editar </a></th>
<th scope="col">

<form action="/countries/{{$country->id}}" method="POST">
@method('DELETE')
@csrf
<button type="submit" class="btn btn-primary btn-sm">Eliminar</button>
</form>


</form>

</th>

</tr>
@endforeach
</tbody>
</table>

        </div>

      </div>
    </div> 
  </div>

@endsection