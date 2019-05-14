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
                  {{ __('messages.clients') }}
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button -->
                <a href="{{ route('administration.clients.create') }}" class="btn btn-primary">
                  {{ __('messages.new') }} {{ __('messages.client') }} 

                </a>
                
              </div>
            </div> <!-- / .row -->
    
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
             
            </div> <!-- / .row -->
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-nowrap card-table">
              <thead>
                <tr>
                  <th class="d-none">
                    <div class="custom-control custom-checkbox table-checkbox">
                      <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                      <label class="custom-control-label" for="ordersSelectAll">
                        &nbsp;
                      </label>
                    </div>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.name') }}
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.surname') }}
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.lastname') }}
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.phone') }}
                    </a>
                  </th>
                  <th>
                      <a href="#" class="text-muted sort">
                        {{ __('messages.full_address') }}
                      </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.email') }}
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.nid') }}
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.birthdate') }}
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort">
                      {{ __('messages.ocupation') }}
                    </a>
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($clients as $client)
                  @php
                    $row_data = 'data-href="' . route('administration.clients.edit', $client->id) . '" onclick=travelTo(this) style=cursor:pointer;"' ;
                  @endphp
                  <tr  {!!$row_data!!}>
                    <td class="d-none">
                      <div class="custom-control custom-checkbox table-checkbox">
                        <input type="checkbox" class="custom-control-input" name="ordersSelect" id="rate-{{ $client->id }}">
                        <label class="custom-control-label" for="rate-{{ $client->id }}">
                          &nbsp;
                        </label>
                      </div>
                    </td>
                    <td>
                      {{ $client->name }}
                    </td>
                    <td>
                      {{ $client->surname }}
                    </td>
                    <td>
                      {{ $client->lastname }}
                    </td>
                    <td>
                      {{ $client->phone }}
                    </td>
                    <td>
                      {{ $client->full_address }}
                    </td>
                    <td>
                      {{ $client->email }}
                    </td>
                    <td>
                      {{ $client->nid_type }} - {{ $client->nid }}
                    </td>
                    <td>
                      {{ $client->birthdate }}
                    </td>
                    <td>
                      {{ $client->ocupation }}
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('administration.clients.destroy', $client->id)}}" method="post"  onsubmit="return confirm('Are you sure?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0 m-0 btn-icon btn-soft-danger text-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                  </tr>    
                @endforeach
              
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div> <!-- / .row -->
  </div>

@endsection