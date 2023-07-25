<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use User\UseCase\SearchUserUseCase\Request\SearchUserIndexRequest;
use User\UseCase\SearchUserUseCase\SearchUserUseCaseInterface;

class SearchUserController extends Controller
{
    public function index(Request $request, SearchUserUseCaseInterface $interactor)
    {
        $request_data_structure = new SearchUserIndexRequest(
            $request->query('user_name'),
            $request->query('email'),
            $request->query('privilege'),
        );

        $response_data_structure = $interactor->index($request_data_structure);
    }
}
