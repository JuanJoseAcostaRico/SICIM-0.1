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
        return View::make('panel.usuarios.listausu', compact('users', 'heads'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return View::make('panel.usuarios.registrousu', compact('roles'));
    }
    public function store(Request $request)
    {
        // Definir reglas de validación personalizadas
        $rules = [
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users',
            'password' => 'required',
            'user_phone' => 'nullable',
            'user_address' => 'nullable',
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'user_name.required' => 'El nombre del usuario es obligatorio.',
            'user_email.required' => 'El correo electrónico es obligatorio.',
            'user_email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'user_email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
        ];

        // Validar los datos del formulario usando las reglas y mensajes personalizados
        $validatedData = $request->validate($rules, $messages);

        // Crear un nuevo usuario y asignar los valores validados
        $user = new User();
        $user->user_name = $validatedData['user_name'];
        $user->user_email = $validatedData['user_email'];
        $user->password = bcrypt($validatedData['password']);
        $user->user_phone = $validatedData['user_phone'];
        $user->user_address = $validatedData['user_address'];
        $user->save();

        // Asignar un rol al usuario (reemplaza 'nombre_del_rol' por el nombre del rol deseado)
        $user->assignRole($request->role);

        // Redireccionar a la página deseada después de guardar el usuario
        return redirect()->route('usuarios.lista')->with('creacion', 'ok');
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
        // Definir reglas de validación personalizadas
        $rules = [
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,user_email,' . $id, // Agregar una excepción para el usuario actual
            'user_phone' => 'nullable|regex:/^[0-9]{11}$/',
            'user_address' => 'nullable',
            'new_password' => 'nullable|min:8', // Validar nueva contraseña si se proporciona
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'user_name.required' => 'El nombre del usuario es obligatorio.',
            'user_email.required' => 'El correo electrónico es obligatorio.',
            'user_email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'user_email.unique' => 'El correo electrónico ya está en uso por otro usuario.',
            'new_password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
        ];

        // Validar los datos del formulario usando las reglas y mensajes personalizados
        $validatedData = $request->validate($rules, $messages);

        $user = User::findOrFail($id);
        $user->user_name = $validatedData['user_name'];
        $user->user_email = $validatedData['user_email'];
        $user->user_phone = $validatedData['user_phone'];
        $user->user_address = $validatedData['user_address'];

        // Verificar si se proporcionó una nueva contraseña
        if ($request->filled('new_password')) {
            $user->password = bcrypt($validatedData['new_password']);
        }

        // Actualizar el rol del usuario
        $role = $request->role;
        $user->syncRoles($role);

        $user->save();

        return redirect()->route('usuarios.lista')->with('edicion', 'ok');
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
        return redirect()->route('usuarios.lista')->with('eliminar', 'ok');
    }
}
