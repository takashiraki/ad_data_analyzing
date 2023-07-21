<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Model\Form\Search\SearchFormIndexViewModel;
use Form\UseCase\SearchForm\Request\SearchFormIndexRequest;
use Form\UseCase\SearchForm\SearchFormUseCaseInterface;
use Illuminate\Http\Request;

class SearchFormController extends Controller
{
    public function index(Request $request, SearchFormUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'form_name' => ['max:50'],
            'form_directory' => ['max:10'],
        ]);

        $request_data_structure = new SearchFormIndexRequest(
            empty($validate['form_name']) ? null : $validate['form_name'],
            empty($validate['form_directory']) ? null : $validate['form_directory'],
        );

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new SearchFormIndexViewModel($response_data_structure->getRecords());

        return view('Form.search', compact('view_model'));
    }
}
