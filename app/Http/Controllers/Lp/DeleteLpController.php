<?php

namespace App\Http\Controllers\Lp;

use App\Http\Controllers\Controller;
use App\Http\Model\Lp\Delete\DeleteLpHandleViewModel;
use App\Http\Model\Lp\Delete\DeleteLpIndexViewModel;
use Illuminate\Http\Request;
use Lp\UseCase\DeleteLp\DeleteLpUseCaseInterface;
use Lp\UseCase\DeleteLp\Request\DeleteLpHandleRequest;
use Lp\UseCase\DeleteLp\Request\DeleteLpIndexRequest;
use UnexpectedValueException;

class DeleteLpController extends Controller
{
    private const LENGTH = 36;

    public function index(string $id, DeleteLpUseCaseInterface $interactor)
    {
        if (mb_strlen($id) !== self::LENGTH) {
            throw new UnexpectedValueException("Bad lp id");
        }

        $request_data_structure = new DeleteLpIndexRequest($id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new DeleteLpIndexViewModel(
            $response_data_structure->getLpId(),
            $response_data_structure->getLpName(),
            $response_data_structure->getLpDirectory(),
            $response_data_structure->getLpMemo()
        );

        return view('Lp.delete-comfilm', compact('view_model'));
    }

    public function handle(Request $request, DeleteLpUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'lp_id' => ['required', 'string'],
        ]);

        if (mb_strlen($validate['lp_id']) !== self::LENGTH) {
            throw new UnexpectedValueException("Bad lp id");
        }

        $request_data_structure = new DeleteLpHandleRequest($validate['lp_id']);

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new DeleteLpHandleViewModel(
            $response_data_structure->getLpId(),
            $response_data_structure->getLpName(),
            $response_data_structure->getLpDirectory(),
            $response_data_structure->getLpMemo()
        );

        return view('Lp.delete-completed', compact('view_model'));
    }
}
