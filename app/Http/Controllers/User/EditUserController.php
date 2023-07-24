<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\User\Edit\EditUserIndexViewModel;
use Illuminate\Http\Request;
use LengthException;
use User\UseCase\EditUserUseCase\EditUserUseCaseInterface;
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
}
