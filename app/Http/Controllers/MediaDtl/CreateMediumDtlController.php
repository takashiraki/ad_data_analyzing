<?php

namespace App\Http\Controllers\MediaDtl;

use App\Http\Controllers\Controller;
use App\Http\Model\MediaDtl\CreateMediumDtlViewModel;
use Illuminate\Http\Request;
use MediaDtl\UseCase\CreateMediaDtlUseCase\CreateMediumDtlRequest;
use MediaDtl\UseCase\CreateMediaDtlUseCase\CreateMediumDtlUseCaseInterface;

class CreateMediumDtlController extends Controller
{
    public function index(CreateMediumDtlUseCaseInterface $interactor)
    {
        $response_data_structure = $interactor->index();

        $view_model = new CreateMediumDtlViewModel(
            $response_data_structure->getMediumDtlId(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getMediumId(),
            $response_data_structure->getMediumName(),
            $response_data_structure->getMediumRecords()
        );

        return view('MediaDtl.create', compact('view_model'));
    }

    public function handle(Request $request, CreateMediumDtlUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'medium_dtl_name' => ['required', 'string', 'min:1', 'max:30'],
            'medium_id' => ['required', 'string', 'min:1', 'max:37'],
        ]);

        $request_data_structure = new CreateMediumDtlRequest(
            $validate['medium_dtl_name'],
            $validate['medium_id']
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new CreateMediumDtlViewModel(
            $response_data_structure->getMediumDtlId(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getMediumId(),
            $response_data_structure->getMediumName(),
            $response_data_structure->getMediumRecords()
        );

        return view('MediaDtl.created-completed', compact('view_model'));
    }
}
