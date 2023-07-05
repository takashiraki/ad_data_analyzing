<?php

namespace App\Http\Controllers\MediaDtl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\MediaDtl\Search\SearchMediumDtlViewModel;
use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlRequest\SearchMediumDtlRequest;
use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlUseCaseInterface;

class SearchMediumDtlController extends Controller
{
    public function index(Request $request,  SearchMediumDtlUseCaseInterface $interactor)
    {

        $medium_name = $request->query('medium_name');

        $medium_dtl_name = $request->query('medium_dtl_name');

        $medium_dtl_id = $request->query('medium_dtl_id');

        $request_data_structure = new SearchMediumDtlRequest($medium_dtl_id, $medium_dtl_name, $medium_name);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new SearchMediumDtlViewModel(
            $medium_dtl_id,
            $medium_dtl_name,
            $medium_name,
            $response_data_structure->getMediumDtlSummary()
        );

        return view('MediaDtl.Search', compact('view_model'));
    }
}
