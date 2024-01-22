<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')
  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo Docente</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/docentes')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar
                </a>
            </div>
          </div>
        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach ($errors->all() as $error )
                    <div class="alert alert-danger" role = "alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por favor!!</strong> {{$error}}
                    </div>
                @endforeach
            @endif
            <form action="{{url('/docentes')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del docente</label>
                    <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="description">Correo electrónico</label>
                    <input type="text" name="email" class="form-control" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="title">Especialidad</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" class="form-control" value="{{old('password',Str::random(8))}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear Docente</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

