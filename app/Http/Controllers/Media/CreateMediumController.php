<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Model\CreateMediumViewModel;
use Illuminate\Http\Request;
use Media\UseCase\CreateMediumUseCase\CreateMediumRequest;
use Media\UseCase\CreateMediumUseCase\CreateMediumUseCaseInterface;


/**
 * --------------------------------------------------------------------------
 * # Controller
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * The responsibility this class has is to exchange data to give the data to UseCase.
 */
class CreateMediumController extends Controller
{

    /**
     * # index
     *
     * @return void
     */
    public function index()
    {
        return view('media.create');
    }


    /**
     * # Exchange data structure
     *
     * @param CreateMediumUseCaseInterface $interactor
     * @param Request $request
     * @return void
     */
    public function handle(CreateMediumUseCaseInterface $interactor, Request $request)
    {
        $validate = $request->validate([
            'medium_name' => ['required', 'string', 'min:1', 'max:30'],
        ]);

        $request_data_structure = new CreateMediumRequest($validate['medium_name']);

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new CreateMediumViewModel($response_data_structure->getMediumId(), $response_data_structure->getMediumName());

        return view('media.created-completed', compact('view_model'));
    }
}
