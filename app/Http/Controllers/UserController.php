<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Listar todos os usuários
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    // Exibir um usuário específico
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Formulário para editar um usuário
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Atualizar dados do usuário
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required', 
                'email', 
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('users.show', $user)->with('success', 'Usuário atualizado com sucesso!');
    }

    // Excluir usuário
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }
}
