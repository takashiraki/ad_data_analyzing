<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\User\Delete\DeleteUserHandleViewModel;
use App\Http\Model\User\Delete\DeleteUserIndexViewModel;
use Illuminate\Http\Request;
use LengthException;
use UnexpectedValueException;
use User\UseCase\DeleteUseCase\DeleteUserUseCaseInterface;
use User\UseCase\DeleteUseCase\Request\DeleteUserHandleRequest;
use User\UseCase\DeleteUseCase\Request\DeleteUserIndexRequest;

class DeleteUserController extends Controller
{
    private const LENGTH = 36;
    public function index(string $user_id, DeleteUserUseCaseInterface $interactor)
    {
        if (mb_strlen($user_id) !== self::LENGTH) {
            throw new LengthException("Bad User Id");
        }

        $request_data_structure = new DeleteUserIndexRequest($user_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new DeleteUserIndexViewModel(
            $response_data_structure->getUserId(),
            $response_data_structure->getUserName(),
            $response_data_structure->getEmail(),
            $response_data_structure->getPrivilege()
        );

        return view('User.delete', compact('view_model'));
    }

    public function handle(Request $request, string $user_id, DeleteUserUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'user_id' => ['required', 'string', 'size:36'],
        ]);

        if ($user_id !== $validate['user_id']) {
            throw new UnexpectedValueException("User ID value did not match");
        }

        $request_data_structure = new DeleteUserHandleRequest($validate['user_id']);

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new DeleteUserHandleViewModel(
            $response_data_structure->getUserId(),
            $response_data_structure->getUserName(),
            $response_data_structure->getEmail(),
            $response_data_structure->getPrivilege(),
        );

        return view('User.delete-completed', compact('view_model'));
    }
}
