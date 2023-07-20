<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Model\Form\Edit\EditFormIndexViewModel;
use Form\UseCase\EditForm\EditFormUseCaseInterface;
use Form\UseCase\EditForm\Request\EditFormIndexRequest;
use Illuminate\Http\Request;
use LengthException;

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
}
