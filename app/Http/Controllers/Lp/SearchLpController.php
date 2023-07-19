<?php

namespace App\Http\Controllers\Lp;

use App\Http\Controllers\Controller;
use App\Http\Model\Lp\Search\SearchLpIndexViewModel;
use Illuminate\Http\Request;
use Lp\UseCase\SearchLp\Request\SearchLpIndexRequest;
use Lp\UseCase\SearchLp\SearchLpUseCaseInterface;

class SearchLpController extends Controller
{
    public function index(Request $request, SearchLpUseCaseInterface $interactor)
    {
        $request_data_structure = new SearchLpIndexRequest(
            $request->query('lp_name'),
            $request->query('lp_directory')
        );

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new SearchLpIndexViewModel(
            $request->query('lp_name'),
            $request->query('lp_directory'),
            $response_data_structure->getLpRecords()
        );

        return view('Lp.search', compact('view_model'));
    }
}
