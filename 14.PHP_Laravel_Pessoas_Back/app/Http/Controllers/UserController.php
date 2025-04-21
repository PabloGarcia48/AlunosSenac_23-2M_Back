<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'message' => 'Lista de usuários',
            'users' => $users
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ],
                [
                    'name.required' => 'O campo nome é obrigatório',
                    'email.required' => 'O campo email é obrigatório',
                    'password.required' => 'O campo senha é obrigatório',
                ]
            );

            $user = User::create($request->all());
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar usuário',
                'error' => $error->getMessage()
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Usuário cadastrado com sucesso',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuário não encontrado'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Usuário encontrado',
            'user' => $user
        ], 200);
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
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ],
                [
                    'name.required' => 'O campo nome é obrigatório',
                    'email.required' => 'O campo email é obrigatório',
                    'password.required' => 'O campo senha é obrigatório',
                ]
            );

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Usuário atualizado com sucesso',
                'user' => $user
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar usuário',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => "Usuário $user->name deletado com sucesso"
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao deletar usuário',
                'error' => $error->getMessage()
            ], 500);
        }
    }
}
