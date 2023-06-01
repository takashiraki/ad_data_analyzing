<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Media\UseCase\SearchMediumUseCase\SearchMediumRequest;
use Media\UseCase\SearchMediumUseCase\SearchMediumUseCaseInterface;

class SearchMediumController extends Controller
{
    public function index(Request $request, SearchMediumUseCaseInterface $interactor)
    {
        $medium_id_parameter = $request->input('medium_id');
        $medium_name_parameter = $request->input('medium_name');

        $request_data_structure = new SearchMediumRequest($medium_id_parameter, $medium_name_parameter);

        $response_data_structure = $interactor->index($request_data_structure);
    }
}