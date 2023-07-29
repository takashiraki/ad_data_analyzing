<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Model\Url\Edit\EditUrlHandleViewModel;
use App\Http\Model\Url\Edit\EditUrlIndexViewModel;
use Illuminate\Http\Request;
use LengthException;
use PhpParser\Node\Stmt\Return_;
use UnexpectedValueException;
use Url\UseCase\EditUrlUseCase\EditUrlUseCaseInterface;
use Url\UseCase\EditUrlUseCase\Request\EditUrlHandleRequest;
use Url\UseCase\EditUrlUseCase\Request\EditUrlIndexRequest;

class EditUrlController extends Controller
{
    private const LENGTH = 36;

    public function index(string $url_id, EditUrlUseCaseInterface $interactor)
    {
        if (mb_strlen($url_id) !== self::LENGTH) {
            throw new LengthException("Bad url id");
        }

        $request_data_structure = new EditUrlIndexRequest($url_id);

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new EditUrlIndexViewModel(
            $response_data_structure->getUrlId(),
            $response_data_structure->getUrlName(),
            $response_data_structure->getMediumName(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getLpName(),
            $response_data_structure->getFormName()
        );

        return view('Url.edit', compact('view_model'));
    }

    public function handle(string $url_id, Request $request, EditUrlUseCaseInterface $interactor)
    {
        $validate = $request->validate([
            'url_id' => ['required', 'string', 'size:36'],
            'url_name' => ['required', 'string', 'min:1', 'max:50'],
            'medium_id' => ['required', 'string', 'size:36'],
            'medium_dtl_id' => ['required', 'string', 'size:36'],
            'lp_id' => ['required', 'string', 'size:36'],
            'form_id' => ['required', 'string', 'size:36'],
        ]);

        if ($url_id !== $validate['url_id']) {
            throw new UnexpectedValueException("Bad url id");
        }

        $request_data_structure = new EditUrlHandleRequest(
            $validate['url_id'],
            $validate['url_name'],
            $validate['medium_id'],
            $validate['medium_dtl_id'],
            $validate['lp_id'],
            $validate['form_id']
        );

        $response_data_structure = $interactor->handle($request_data_structure);

        $view_model = new EditUrlHandleViewModel(
            $response_data_structure->getUrlName(),
            $response_data_structure->getMediumName(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getLpName(),
            $response_data_structure->getFormName()
        );

        return view('Url.edit-completed', compact('view_model'));
    }
}
