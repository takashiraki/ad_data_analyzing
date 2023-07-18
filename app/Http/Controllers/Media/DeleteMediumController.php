<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Model\DeleteMediumViewModel;
use Illuminate\Http\Request;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumRequest;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumUseCaseInterface;

/**
 * --------------------------------------------------------------------------
 * # Controller
 * --------------------------------------------------------------------------
 *
 *
 * ## Responsibility
 * The responsibility this class has is to exchange data to give the data to UseCase.
 */
class DeleteMediumController extends Controller
{
    /**
     * # Index
     * The intention of this method is to exchange data.
     *
     * @param string                       $medium_id
     * @param DeleteMediumUseCaseInterface $interactor
     *
     * @return void
     */
    public function index(string $medium_id, DeleteMediumUseCaseInterface $interactor)
    {
        $request_data_structure = new DeleteMediumRequest($medium_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new DeleteMediumViewModel(
            $response_data_structure->getMediumId(),
            $response_data_structure->getMediumName()
        );

        return view('media.delete-confilm', compact('view_model'));
    }

    /**
     * # Handle
     * The intention of this method is to exchange data.
     *
     * @param Request                      $request
     * @param DeleteMediumUseCaseInterface $interactor
     *
     * @return void
     */
    public function destroy(Request $request, DeleteMediumUseCaseInterface $interactor)
    {
        $request_data_structure = new DeleteMediumRequest($request->input('medium_id'));

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new DeleteMediumViewModel(
            $response_data_structure->getMediumId(),
            $response_data_structure->getMediumName()
        );

        return view('media.delete-completed', compact('view_model'));
    }
}
