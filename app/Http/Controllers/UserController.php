<?php
namespace App\Http\Controllers;


use App\Http\Requests\UpdateUserFormRequest;
use App\Http\Requests\Users\ChangePasswordRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(UpdateUserFormRequest $request, User $user) {
        $user->fill($request->all());
        $user->save();
        return $this->responseAsJson(new UserResource($user));
    }

    public function show(User $user) {
        return $this->responseAsJson(new UserResource($user));
    }

    public function changePassword(ChangePasswordRequest $request, User $user) {
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return $this->responseAsJson([], "Senha actualizada com sucesso!");
    }
}
