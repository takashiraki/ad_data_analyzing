<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Model\SearchMediumViewModel;
use Illuminate\Http\Request;
use Media\UseCase\SearchMediumUseCase\SearchMediumRequest;
use Media\UseCase\SearchMediumUseCase\SearchMediumUseCaseInterface;

/**
 * --------------------------------------------------------------------------
 * # Controller
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * The responsibikity this class has is to exchange data to give the data to UseCase.
 */
class SearchMediumController extends Controller
{

    /**
     * # Index
     * The intention of this method is to exchange data.
     *
     * @param Request $request
     * @param SearchMediumUseCaseInterface $interactor
     * @return void
     */
    public function index(Request $request, SearchMediumUseCaseInterface $interactor)
    {
        $medium_id_parameter = $request->input('medium_id');
        $medium_name_parameter = $request->input('medium_name');

        $request_data_structure = new SearchMediumRequest($medium_id_parameter, $medium_name_parameter);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new SearchMediumViewModel($response_data_structure->getMediumRecords());

        return view('media.search', compact('view_model'));
    }
}
