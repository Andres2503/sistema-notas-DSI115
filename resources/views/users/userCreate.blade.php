@extends('layouts.app')
@section('content')


<div class="row">
  @include('alerts.alerts')
</div>
<style media="screen">
  .pa{
    padding-top: 35px;
  }
</style>
<form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
@csrf
<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Crear una nuevo usuario </strong></div>
        <div class="card-body card-block">

           <div class="form-group">
            <label  class=" form-control-label">Nombre</label>
              <input type="text" name="name" value="{{old('name')}}" required  class="form-control">
           </div>

           <div class="form-group">
                <label  class=" form-control-label">Correo </label>
                <input type="email" name="email" value="{{old('email')}}" required  class="form-control">             
           </div>

           <div class="row">
             <div class="col-md-6">
               <div class="form-group">
                 <label  class=" form-control-label">Contraseña </label>
                 <input type="password" name="password" value="{{old('password')}}" required  class="form-control">             
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                  <label  class=" form-control-label">Roles</label>
                  <select class="form-control" name="role">
                  @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                 </select>          
               </div>
             </div>
           </div>

           <div class="form-group">
             <label for="file-multiple-input" class=" form-control-label">Foto de perfil</label>
             <input required type="file" id="file-multiple-input" accept="image/*" name="photo"  class="form-control-file">
           </div>

            <div class="row form-group">
               <div class="col-12 col-md-12 col-sx-12">
                 <div class="">
                 <button type="submit" class="btn btn-info mb-1" name="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
               </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
</form>



@endsection
