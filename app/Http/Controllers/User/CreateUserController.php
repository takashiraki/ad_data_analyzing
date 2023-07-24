<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\User\Create\CreateUserHandleViewModel;
use Illuminate\Http\Request;
use User\UseCase\CreateUserUseCase\CreateUserUseCaseInterface;
use User\UseCase\CreateUserUseCase\Request\CreateUserHandleRequest;

class CreateUserController extends Controller
{
    public function index()
    {
        return view('User.create');
    }

    public function handle(Request $request, CreateUserUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'user_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email:filter,dns', 'string', 'max:256'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'privilege' => ['required', 'string', 'max:10'],
        ]);

        $request_data_structure = new CreateUserHandleRequest(
            $validate["user_name"],
            $validate['email'],
            $validate['password'],
            $validate['privilege']
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new CreateUserHandleViewModel(
            $response_data_structure->getUserId(),
            $response_data_structure->getUserName(),
            $response_data_structure->getEmail(),
            $response_data_structure->getPrivilege(),
        );

        return view('User.create-completed', compact('view_model'));
    }
}
