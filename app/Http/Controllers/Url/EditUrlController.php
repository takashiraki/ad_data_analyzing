<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Model\Url\Edit\EditUrlIndexViewModel;
use Illuminate\Http\Request;
use LengthException;
use PhpParser\Node\Stmt\Return_;
use Url\UseCase\EditUrlUseCase\EditUrlUseCaseInterface;
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
}
