<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Model\Url\Create\CreateUrlIndexViewModel;
use Illuminate\Http\Request;
use Url\UseCase\CreateUrlUseCase\CreateUrlUseCaseInterface;

class CreateUrlController extends Controller
{
    public function index(CreateUrlUseCaseInterface $interactor)
    {
        $response_data_structure = $interactor->index();

        $view_model = new CreateUrlIndexViewModel(
            $response_data_structure->getMedia(),
            $response_data_structure->getMediaDtls(),
            $response_data_structure->getLps(),
            $response_data_structure->getForms(),
        );

        return view('Url.create', compact('view_model'));
    }
}
