<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Model\EditMediumViewModel;
use Illuminate\Http\Request;
use Media\UseCase\EditMediumUseCase\EditMediumRequest;
use Media\UseCase\EditMediumUseCase\EditMediumUseCaseInterface;

/**
 * --------------------------------------------------------------------------
 * # Controller
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * 
 * The responsibility this class has is to exchange data to give the data  to  UseCase.
 */
class EditMediumController extends Controller
{
    /**
     * # Index of Media
     *
     * @param string $medium_id
     * @param EditMediumUseCaseInterface $interactor
     * @return void
     */
    public function index(string $medium_id, EditMediumUseCaseInterface $interactor)
    {
        $request_data_structure = new EditMediumRequest($medium_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new EditMediumViewModel(
            $response_data_structure->getMediumId(),
            $response_data_structure->getMediumName()
        );

        return view('Media.edit', compact('view_model'));
    }


    /**
     * # Exchange data structure
     *
     * @param Request $request
     * @param EditMediumUseCaseInterface $interactor
     * @return void
     */
    public function handle(Request $request, EditMediumUseCaseInterface $interactor)
    {
        $medium_id = $request->input('medium_id');
        $validate = $request->validate([
            'medium_name' => ['required', 'string', 'min:1', 'max:30'],
        ]);

        $request_data_structure = new EditMediumRequest($medium_id, $validate['medium_name']);

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new EditMediumViewModel($response_data_structure->getMediumId(), $response_data_structure->getMediumName());

        return view('media.edit-completed', compact('view_model'));
    }
}
