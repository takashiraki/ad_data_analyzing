<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Model\Form\Delete\DeleteFormHandleViewModel;
use App\Http\Model\Lp\Delete\DeleteLpIndexViewModel;
use Form\UseCase\DeleteForm\DeleteFormUseCaseInterface;
use Form\UseCase\DeleteForm\Request\DeleteFormHandleRequest;
use Form\UseCase\DeleteForm\Request\DeleteFormIndexRequest;
use Illuminate\Http\Request;
use LengthException;
use UnexpectedValueException;

class DeleteFormController extends Controller
{
    private const LENGTH = 36;

    public function index(string $form_id, DeleteFormUseCaseInterface $interactor)
    {
        if (mb_strlen($form_id) !== self::LENGTH) {
            throw new LengthException("Bad form id");
        }

        $request_data_structure = new DeleteFormIndexRequest($form_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new DeleteLpIndexViewModel(
            $response_data_structure->getFormId(),
            $response_data_structure->getFormName(),
            $response_data_structure->getFormDirectory(),
            $response_data_structure->getFormMemo()
        );

        return view('Form.delete', compact('view_model'));
    }

    public function handle(Request $request, string $form_id, DeleteFormUseCaseInterface $interactor)
    {

        if (mb_strlen($form_id) !== self::LENGTH) {
            throw new LengthException("Bad form id");
        }

        $validate = $request->validate([
            'form_id' => ["required", 'string', 'max:36'],
        ]);

        if ($validate['form_id'] !== $form_id) {
            throw new UnexpectedValueException("Form ID value did not match");
        }

        $request_data_structure = new DeleteFormHandleRequest($form_id);

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new DeleteFormHandleViewModel(
            $response_data_structure->getFormId(),
            $response_data_structure->getFormName(),
            $response_data_structure->getFormDirectory(),
            $response_data_structure->getFormMemo()
        );

        return view('Form.delete-completed', compact('view_model'));
    }
}
