<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Model\Url\Create\CreateUrlHandleViewModel;
use App\Http\Model\Url\Create\CreateUrlIndexViewModel;
use Illuminate\Http\Request;
use Url\UseCase\CreateUrlUseCase\CreateUrlUseCaseInterface;
use Url\UseCase\CreateUrlUseCase\Request\CreateUrlHandleRequest;

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

    public function handle(Request $request, CreateUrlUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'url_name' => ['required', 'string', 'min:1', 'max:50'],
            'medium_id' => ['required', 'string', 'size:36'],
            'medium_dtl_id' => ['required', 'string', 'size:36'],
            'lp_id' => ['required', 'string', 'size:36'],
            'form_id' => ['required', 'string', 'size:36'],
        ]);

        $request_data_structure = new CreateUrlHandleRequest(
            $validate['url_name'],
            $validate['medium_id'],
            $validate['medium_dtl_id'],
            $validate['lp_id'],
            $validate['form_id'],
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new CreateUrlHandleViewModel(
            $response_data_structure->getUrlId(),
            $response_data_structure->getUrlName(),
            $response_data_structure->getMediumName(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getLpName(),
            $response_data_structure->getFormName()
        );

        return view('Url.create-completed', compact('view_model'));
    }
}
