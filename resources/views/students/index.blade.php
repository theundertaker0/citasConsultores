@extends('layouts.panel')

@section('content')
  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Alumnos</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/alumnos/create')}}" class="btn btn-sm btn-primary">Nuevo Alumno</a>
            </div>
          </div>
        </div>
        <div class="card-body">
            @if(session('notification'))
                <div class="alert alert-success" role="alert">
                    {{session('notification')}}
                </div>
            @endif
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <th scope="row">
                            {{$student->name}}
                        </th>
                        <td>
                            {{$student->email}}
                        </td>
                        <td>
                            {{$student->title}}
                        </td>
                        <td>
                        <form action="{{url('/docentes/'.$student->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/docentes/'.$student->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
