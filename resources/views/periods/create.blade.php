@extends('layouts.app')
@section('content')


<style media="screen">
  .pa{
    padding-top: 35px;
  }
</style>

@include('alerts.dataTable')

<div class="row">
  @include('alerts.alerts')
</div>

{{--<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('years.index') }}">Años escolares</a></li>
       <li class="breadcrumb-item"><a href="{{ route('teacher-grade',$year_grade->id) }}">Año escolar activo</a></li>


        <li class="breadcrumb-item active" aria-current="page">Editar grado: {{Help::ordinal($degreeSelected->degree)}} {{$degreeSelected->section}} - {{Help::turn($degreeSelected->turn)}}</li>
      </ol>
    </nav>
  </div>
</div> --}}



<form method="POST" action="{{route('periods-store',$year->id)}}" enctype="multipart/form-data">

  @csrf
<div class="row">
  <div class="col-lg-12">
                    <div class="card">
                          <div class="card-header"><strong>Crear Periodo Escolar Año xx</strong></div>

                          <div class="card-body card-block">

                                <div class="form-group">
                                <label  class=" form-control-label">Numero de Periodo Escolar</label>
                                <select name="nperiodo" class="form-control" >
                                    <option value="1" selected>Periodo 1</option>
                                    <option value="2">Periodo 2</option>
                                    <option value="3">Periodo 3</option>
                                </select>
                                </div>

                                <div class="form-group">
                                  <label  class=" form-control-label">Fecha  Inicio</label>
                                  <br>
                                  <small>*requerido</small>
                                  <input type="date" name="startdate" required  class="form-control" >
                               </div>
                                <div class="form-group">
                                    <label  class=" form-control-label">Fecha  Fin</label>
                                    <br>
                                    <small>*requerido</small>
                                    <input type="date" name="enddate" required  class="form-control" >
                                 </div>


                                  <div class="row form-group">
                                    <div class="col-6 col-md-6 col-sx-12">
                                      <div class="">
                                        <button type="submit" class="btn btn-warning mb-1" name="button">Guardar   <i class="fa fa-edit" aria-hidden="true"></i></button>
                                      </div>
                                    </div>
                                </div>
                        </div>
                  </div>
      </div>
</div>
</form>



@endsection
