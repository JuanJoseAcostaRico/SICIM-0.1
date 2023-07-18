<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        //$users = User::all();
        $heads = [
            'ID',
            'Nombre',
            'Email',
            'Teléfono',
            'Rol',
            'Acciones',

        ];
        // Retornamos la vista con las 2 variables creadas anteriormente
        return View::make('panel.usuarios.listaUsu', compact('users', 'heads'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return View::make('panel.usuarios.registroUsu', compact('roles'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users',
            'password' => 'required',
            'user_phone' => 'nullable',
            'user_address' => 'required',
        ]);

        $user = new User();
        $user->user_name = $validatedData['user_name'];
        $user->user_email = $validatedData['user_email'];
        $user->password = bcrypt($validatedData['password']);
        $user->user_phone = $validatedData['user_phone'];
        $user->user_address = $validatedData['user_address'];
        $user->save();

        $user->assignRole($request->role);

        // Redireccionar a la página deseada después de guardar el usuario
        return redirect()->route('usuarios.lista');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Función para mostrar en el CRUD

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Función para actualizar en el CRUD
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_phone = $request->user_phone;
        $user->user_address = $request->user_address;

        // Actualizar el rol del usuario
        $role = $request->role;
        $user->syncRoles($role);

        // Verificar si se proporcionó una nueva contraseña
        if ($request->filled('new_password')) {
            $user->password = bcrypt($request->new_password);
        }

        $user->save();

        return redirect()->route('usuarios.lista');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        //$user = User::findOrFail($id);
        return view('panel.usuarios.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('panel.usuarios.edit', compact('user', 'roles'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.lista');
    }
}
