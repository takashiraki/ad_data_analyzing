<?php

namespace App\Http\Controllers\MediaDtl;

use App\Http\Controllers\Controller;
use App\Http\Model\MediaDtl\Edit\EditMediumDtlSaveViewModel;
use App\Http\Model\MediaDtl\EditMediumDtlViewModel;
use App\Models\MediaDtl;
use Illuminate\Http\Request;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlSaveRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlViewRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlUseCaseInterface;

class EditMediumDtlController extends Controller
{
    private const LENGTH = 36;

    public function edit(string $medium_dtl_id, EditMediumDtlUseCaseInterface $interactor)
    {
        if (mb_strlen($medium_dtl_id) !== self::LENGTH) {
            //
        }

        $request_data_structure = new EditMediumDtlViewRequest($medium_dtl_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new EditMediumDtlViewModel(
            $response_data_structure->getMediumDtlId(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getMediumId(),
            $response_data_structure->getMediumRecords()
        );

        return view('MediaDtl.edit', compact('view_model'));
    }

    public function update(
        Request $request,
        string $medium_dtl_id,
        EditMediumDtlUseCaseInterface $interactor
    ) {

        $validate = $request->validate([
            'medium_dtl_name' => ['required', 'min:1', 'max:50'],
            'medium_id' => ['required', 'min:35', 'max:36']
        ]);

        if (mb_strlen($medium_dtl_id) !== self::LENGTH) {
            //
        }

        if (mb_strlen($validate['medium_id']) !== self::LENGTH) {
            //
        }

        $request_data_structure = new EditMediumDtlSaveRequest(
            $medium_dtl_id,
            $validate['medium_dtl_name'],
            $validate['medium_id']
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new EditMediumDtlSaveViewModel(
            $response_data_structure->getMediumDtlId(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getMediumName()
        );

        return view('MediaDtl.edit-completed', compact('view_model'));
    }
}
