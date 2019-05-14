@extends('layouts.app2')

@section('title', 'Country')

@section('content')
<div class= "container">
<form class="form-group"  method='POST' action="/countries" enctype="multipart/form-data"> 

@csrf
 
<h1 class="text-center" style="margin-top:50px;" >listado de paises</h1>

  <div class="form-group">
    <label for="">iso</label>
    <input name="iso" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label for="">name</label>
    <input name="name" type="text" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Save</button>


</form>
</div>
@endsection
