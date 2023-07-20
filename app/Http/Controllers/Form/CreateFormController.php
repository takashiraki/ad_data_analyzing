<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Model\Form\Create\CreateFormHandleViewModel;
use Form\UseCase\CreateForm\CreateFormUseCaseInterface;
use Form\UseCase\CreateForm\Request\CreateFormHandleRequest;
use Illuminate\Http\Request;

class CreateFormController extends Controller
{
    public function index()
    {
        return view('Form.create');
    }

    public function handle(Request $request, CreateFormUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'form_name' => ['required', 'string', 'min:1', 'max:50'],
            'form_directory' => ['required', 'string', 'min:1', 'max:10'],
            'form_memo' => ['max:50'],
        ]);

        $request_data_structure = new CreateFormHandleRequest(
            $validate['form_name'],
            $validate['form_directory'],
            $validate['form_memo'],
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new CreateFormHandleViewModel(
            $response_data_structure->getFormName(),
            $response_data_structure->getFormDirectory(),
            $response_data_structure->getFormDirectory()
        );

        return view('Form.create-completed', compact('view_model'));
    }
}
