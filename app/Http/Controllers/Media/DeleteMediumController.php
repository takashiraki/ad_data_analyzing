<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Model\DeleteMediumViewModel;
use App\Models\Medium;
use Illuminate\Http\Request;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumRequest;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumUseCaseInterface;

class DeleteMediumController extends Controller
{
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
