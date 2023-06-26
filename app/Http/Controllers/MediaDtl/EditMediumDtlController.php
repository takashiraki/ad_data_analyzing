<?php

namespace App\Http\Controllers\MediaDtl;

use App\Http\Controllers\Controller;
use App\Http\Model\MediaDtl\EditMediumDtlViewModel;
use App\Models\MediaDtl;
use Illuminate\Http\Request;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlUseCaseInterface;

class EditMediumDtlController extends Controller
{
    private const LENGTH = 36;

    public function edit(string $medium_dtl_id, EditMediumDtlUseCaseInterface $interactor)
    {
        if (mb_strlen($medium_dtl_id) !== self::LENGTH) {
            //
        }

        $request_data_structure = new EditMediumDtlRequest($medium_dtl_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new EditMediumDtlViewModel(
            $response_data_structure->getMediumDtlId(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getMediumId(),
            $response_data_structure->getMediumRecords()
        );

        return view('MediaDtl.edit', compact('view_model'));
    }

    public function update(Request $request, string $medium_dtl_id)
    {
        $medium_dtl_id_from_request = $request->input('medium_dtl_id');

        $medium_id = $request->input('medium_id');

        $validate = $request->validate([
            'medium_dtl_name' => ['required', 'string', 'min:1', 'max:32'],
        ]);

        if ($medium_dtl_id_from_request !== $medium_dtl_id) {
            //例外
        }

        $exiting_medium_dtl_record = MediaDtl::find($medium_dtl_id);

        if (!empty($medium_dtl_record)) {
            //例外
        }

        $exiting_medium_dtl_record->medium_dtl_name = $validate['medium_dtl_name'];

        $exiting_medium_dtl_record->medium_id = $medium_id;

        $new_medium_dtl_record = $exiting_medium_dtl_record;

        $new_medium_dtl_record->save();

        return redirect()->intended('/medium-dtls');
    }
}
