<?php

namespace App\Http\Controllers\MediaDtl;

use App\Http\Controllers\Controller;
use App\Http\Model\MediaDtl\Delete\DeleteMediumDtlHandleViewModel;
use App\Http\Model\MediaDtl\Delete\DeleteMediumDtlViewModel;
use LengthException;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlRequest\DeleteMediumDtlHandleRequest;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlRequest\DeleteMediumDtlIndexRequest;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlUseCaseInterface;

class DeleteMediumDtlController extends Controller
{

    private const LENGTH = 36;

    public function index(string $medium_dtl_id, DeleteMediumDtlUseCaseInterface $interactor)
    {
        if (mb_strlen($medium_dtl_id) !== self::LENGTH) {
            throw new LengthException();
        }

        $request_data_structure = new DeleteMediumDtlIndexRequest(
            $medium_dtl_id
        );

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new DeleteMediumDtlViewModel(
            $response_data_structure->getMediumDtlId(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getMediumName()
        );

        return view('MediaDtl.delete-comfilm', compact('view_model'));
    }

    public function handle(string $medium_dtl_id, DeleteMediumDtlUseCaseInterface $interactor)
    {
        if (mb_strlen($medium_dtl_id) !== self::LENGTH) {
            throw new LengthException();
        }

        $request_data_structure = new DeleteMediumDtlHandleRequest($medium_dtl_id);

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new DeleteMediumDtlHandleViewModel(
            $response_data_structure->getMediumDtlId(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getMediumName()
        );

        return view('MediaDtl.delete-completed', compact('view_model'));
    }
}
