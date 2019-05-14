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
                  {{ __('messages.fx_rates') }}
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button -->
                <a href="{{ route('administration.fx_rates.create') }}" class="btn btn-primary">
                  {{ __('messages.new') }} {{ __('messages.fx_rate') }} 

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
                    <a href="#" class="text-muted sort" data-sort="orders-order">
                      {{ __('messages.currency_code') }}
                    </a>
                  </th>
                  <th>
                    <a href="#" class="text-muted sort" data-sort="orders-order">
                      {{ __('messages.fx_rate') }}
                    </a>
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($fx_rates as $fx_rate)
                  @php
                    $row_data = 'data-href="' . route('administration.fx_rates.edit', $fx_rate->id) . '" onclick=travelTo(this) style=cursor:pointer;"' ;
                  @endphp
                  <tr  {!!$row_data!!}>
                    <td class="d-none">
                      <div class="custom-control custom-checkbox table-checkbox">
                        <input type="checkbox" class="custom-control-input" name="ordersSelect" id="rate-{{ $fx_rate->id }}">
                        <label class="custom-control-label" for="rate-{{ $fx_rate->id }}">
                          &nbsp;
                        </label>
                      </div>
                    </td>
                    <td>
                      {{ $fx_rate->currency_code }}
                    </td>
                    <td>
                      {{ $fx_rate->fx_rate }}
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('administration.fx_rates.destroy', $fx_rate->id)}}" method="post"  onsubmit="return confirm('Are you sure?');">
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