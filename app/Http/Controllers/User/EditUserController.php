<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\User\Edit\EditUserHandleViewModel;
use App\Http\Model\User\Edit\EditUserIndexViewModel;
use Illuminate\Http\Request;
use LengthException;
use UnexpectedValueException;
use User\UseCase\EditUserUseCase\EditUserUseCaseInterface;
use User\UseCase\EditUserUseCase\Request\EditUserHandleRequest;
use User\UseCase\EditUserUseCase\Request\EditUserIndexRequest;

class EditUserController extends Controller
{
    private const LENGTH = 36;

    public function index(string $user_id, EditUserUseCaseInterface $interactor)
    {
        if (mb_strlen($user_id) !== self::LENGTH) {
            throw new LengthException("Bad User id");
        }

        $request_data_structure = new EditUserIndexRequest($user_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new EditUserIndexViewModel(
            $response_data_structure->getUserId(),
            $response_data_structure->getUserName(),
            $response_data_structure->getEmail(),
            $response_data_structure->getPrivilege()
        );

        return view('User.edit', compact('view_model'));
    }

    public function handle(Request $request, string $user_id, EditUserUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'user_id' => ['required', 'string', 'size:36'],
            'user_name' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'email:filter,dns', 'min:1', 'max:256'],
            'privilege' => ['required', 'string', 'max:10'],
        ]);

        if (mb_strlen($user_id) !== self::LENGTH) {
            throw new LengthException("Bad user id");
        }

        if ($user_id !== $validate['user_id']) {
            throw new UnexpectedValueException("Form ID value did not match");
        }

        $request_data_structure = new EditUserHandleRequest(
            $validate['user_id'],
            $validate['user_name'],
            $validate['email'],
            $validate['privilege'],
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new EditUserHandleViewModel(
            $response_data_structure->getUserId(),
            $response_data_structure->getUserName(),
            $response_data_structure->getEmail(),
            $response_data_structure->getPrivilege()
        );

        return view('User.edit-completed', compact('view_model'));
    }
}
