<?php

namespace App\Http\Controllers\Lp;

use App\Http\Controllers\Controller;
use App\Http\Model\Lp\Edit\EditLpHandleViewModel;
use App\Http\Model\Lp\Edit\EditLpIndexViewModel;
use Illuminate\Http\Request;
use Lp\UseCase\EditLp\EditLpUseCaseInterface;
use Lp\UseCase\EditLp\Request\EditLpHandleRequest;
use Lp\UseCase\EditLp\Request\EditLpIndexRequest;
use UnexpectedValueException;

class EditLpController extends Controller
{
    private const LENGTH = 36;

    public function index(string $lp_id, EditLpUseCaseInterface $interactor)
    {
        if (mb_strlen($lp_id) !== self::LENGTH) {
            //
        }
        $request_data_structure = new EditLpIndexRequest($lp_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new EditLpIndexViewModel(
            $response_data_structure->getLpId(),
            $response_data_structure->getLpName(),
            $response_data_structure->getLpDirectory(),
            $response_data_structure->getLpMemo()
        );

        return view('Lp.edit', compact('view_model'));
    }

    public function handle(Request $request, string $lp_id, EditLpUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'lp_name' => ['required', 'string', 'min:1', 'max:50'],
            'lp_directory' => ['required', 'string', 'min:1', 'max:50'],
            'lp_memo' => ['max:50']
        ]);

        if (mb_strlen($lp_id) !== self::LENGTH) {
            throw new UnexpectedValueException("Bad lp id");
        }

        $request_data_structure = new EditLpHandleRequest(
            $lp_id,
            $validate['lp_name'],
            $validate['lp_directory'],
            $validate['lp_memo']
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new EditLpHandleViewModel(
            $response_data_structure->getLpId(),
            $response_data_structure->getLpName(),
            $response_data_structure->getLpDirectory(),
            $response_data_structure->getLpMemo()
        );

        return view('Lp.edit-completed', compact('view_model'));
    }
}
