<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $users
    ) {}

    public function index()
    {
        return UserResource::collection(
            $this->users->all()
        );
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->users->create($request->validated());

        return new UserResource($user);
    }

    public function show(int $id)
    {
        return new UserResource(
            $this->users->find($id)
        );
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $user = $this->users->update($id, $request->validated());

        return new UserResource($user);
    }

    public function destroy(int $id)
    {
        $this->users->delete($id);

        return response()->noContent();
    }
}
