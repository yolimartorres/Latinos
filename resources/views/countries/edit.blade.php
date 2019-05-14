@extends('layouts.app2')

@section('title', 'Country')

@section('content')


<div class= "container">
<form class="form-group"  method='POST' action="/countries/{{$country->id}}" enctype="multipart/form-data"> 

@method('PUT')

@csrf


  <div class="form-group">
    <label for="">iso</label>
    <input name="iso" type="text" value="{{ $country->iso}}" class="form-control">
  </div>

  <div class="form-group">
    <label for="">name</label>
    <input name="name" type="text"  value="{{ $country->name}}" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">ACTUALIZAR</button>



</form>
</div>
@endsection