<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit(User $user)
    {
        // Pasamos el usuario a la vista
        return view('admin.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user', // Validación para el rol
        ]);

        // Actualización de los campos del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Si el campo de la contraseña no está vacío, actualizarla (solo si el usuario la cambia)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Guardar los cambios
        $user->save();

        // Redirigir al administrador con un mensaje de éxito
        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        // Eliminar el usuario
        $user->delete();

        // Redirigir a la lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
    }
}
