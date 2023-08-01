<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Model\Url\Delete\DeleteUrlIndexViewModel;
use Illuminate\Http\Request;
use Url\UseCase\DeleteUrlUseCase\DeleteUrlUseCaseInterface;
use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlHandleRequest;
use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlIndexRequest;

class DeleteUrlController extends Controller
{
    private const LENGTH = 36;

    public function index(string $url_id, DeleteUrlUseCaseInterface $interacrtor)
    {
        if (mb_strlen($url_id) !== self::LENGTH) {
            $errors['id'] = '不正なURLを受け付けました';

            return redirect()->back()->withErrors($errors);
        }

        $request_data_structure = new DeleteUrlIndexRequest($url_id);

        $response_data_structure = $interacrtor->index($request_data_structure);

        if ($response_data_structure->getResult()->isError()) {
            $errors['id'] = '該当するURLデータが存在しません';

            return redirect()->back()->withErrors($errors);
        }

        $view_model = new DeleteUrlIndexViewModel(
            $response_data_structure->getUrlId(),
            $response_data_structure->getUrlName(),
            $response_data_structure->getMediumName(),
            $response_data_structure->getMediumDtlName(),
            $response_data_structure->getLpName(),
            $response_data_structure->getFormName()
        );

        return view('Url.delete', compact('view_model'));
    }

    public function handle(Request $request, string $url_id, DeleteUrlUseCaseInterface $interactor)
    {

        $validate = $request->validate([
            'url_id' => ['required', 'string', 'size:36'],
        ]);

        if (mb_strlen($url_id) !== self::LENGTH || $validate['url_id'] !== $url_id) {
            $errors['id'] = '不正なURLを受け付けました';

            return redirect()->back()->withErrors($errors);
        }

        $request_data_structure = new DeleteUrlHandleRequest($validate['url_id']);

        $response_data_structure = $interactor->handle($request_data_structure);

        if ($response_data_structure->getResult()->isError()) {
            $errors['id'] = '該当するURLデータが存在しません';

            return redirect()->back()->withErrors($errors);
        }

        return view('Url.delete-completed');
    }
}