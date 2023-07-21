<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Model\Form\Edit\EditFormHandleViewModel;
use App\Http\Model\Form\Edit\EditFormIndexViewModel;
use Form\UseCase\EditForm\EditFormUseCaseInterface;
use Form\UseCase\EditForm\Request\EditFormHandleRequest;
use Form\UseCase\EditForm\Request\EditFormIndexRequest;
use Illuminate\Http\Request;
use LengthException;
use UnexpectedValueException;

class EditFormController extends Controller
{
    private const LENGTH = 36;

    public function index(string $form_id, EditFormUseCaseInterface $interactor)
    {
        if (mb_strlen($form_id) !== self::LENGTH) {
            throw new LengthException("Bad form id");
        }

        $request_data_structure = new EditFormIndexRequest($form_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new EditFormIndexViewModel(
            $response_data_structure->getFormId(),
            $response_data_structure->getFormName(),
            $response_data_structure->getFormDirectory(),
            $response_data_structure->getFormMemo() !== null ?
                $response_data_structure->getFormMemo() : null
        );

        return view('Form.edit', compact("view_model"));
    }

    public function handle(string $form_id, Request $request, EditFormUseCaseInterface $interactor)
    {
        if (mb_strlen($form_id) !== self::LENGTH) {
            throw new LengthException("Bad form id");
        }

        $validate = $request->validate([
            "form_id" => ['required', 'string', 'max:36'],
            "form_name" => ['required', 'string', 'min:1', 'max:36'],
            "form_directory" => ['required', 'string', 'min:1', 'max:10'],
            "form_memo" => ['max:50'],
        ]);

        if ($validate["form_id"] !== $form_id) {
            throw new UnexpectedValueException("Form ID value did not match");
        }

        $request_data_structure = new EditFormHandleRequest(
            $validate['form_id'],
            $validate['form_name'],
            $validate['form_directory'],
            $validate['form_memo'],
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new EditFormHandleViewModel(
            $response_data_structure->getFormId(),
            $response_data_structure->getFormName(),
            $response_data_structure->getFormDirectory(),
            $response_data_structure->getFormMemo(),
        );

        return view('Form.edit-completed', compact('view_model'));
    }
}
