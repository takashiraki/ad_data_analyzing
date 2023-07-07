<?php

namespace App\Http\Controllers\Lp;

use App\Http\Controllers\Controller;
use App\Http\Model\Lp\Create\CreateLpViewModel;
use Illuminate\Http\Request;
use Lp\UseCase\CreateLp\CreateLpUseCaseInterface;
use Lp\UseCase\CreateLp\Request\CreateLpHandleRequest;

class CreateLpController extends Controller
{
    public function index()
    {
        return view('Lp.create');
    }

    public function handle(Request $request, CreateLpUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'lp_name' => ['required', 'string', 'min:1', 'max:50'],
            'lp_directory' => ['required', 'string', 'min:1', 'max:10'],
            'lp_memo' => ['max:50']
        ]);

        $request_data_structure = new CreateLpHandleRequest(
            $validate['lp_name'],
            $validate['lp_directory'],
            $validate['lp_memo']
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new CreateLpViewModel(
            $response_data_structure->getLpId(),
            $response_data_structure->getLpName(),
            $response_data_structure->getLpDirectory(),
            $response_data_structure->getLpMemo()
        );

        return view('Lp.created-completed', compact('view_model'));
    }
}
