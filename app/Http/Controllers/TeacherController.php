<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::teachers()->get();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'title' => 'nullable|min:3',
            'address' => 'nullable|min:6',
            'phone' => 'nullable|size:10'
        ];

        $messages = [
            'name.required' => 'El nombre del Docente es obligatorio',
            'name.min' => 'El nombre del docente debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no tiene un formato válido',
            'email.unique' => 'El correo electrónico ya ha sido registrado anteriormente, intente con otro',
            'phone.size' => 'El Número telefónico no tiene un formato válido',
            'address.min' => 'La dirección debe tener más de 6 caracteres',
            'title.min' => 'La especialidad debe tener más de 3 caracteres'
        ];
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name','email','title','address', 'phone') + [
                'role' => 'docente',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El docente se ha registado exitósamente';
        return redirect('/docentes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
