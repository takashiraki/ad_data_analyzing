<?php

namespace App\Http\Controllers\Url;

use App\Http\Controllers\Controller;
use App\Http\Model\Url\Search\SearchUrlIndexViewModel;
use Illuminate\Http\Request;
use Url\UseCase\SearchUrlUseCase\SearchUrlIndexRequest;
use Url\UseCase\SearchUrlUseCase\SearchUrlUseCaseInterface;

class SearchUrlController extends Controller
{
    const MAX_LENGTH = 50;


    public function index(Request $request, SearchUrlUseCaseInterface $interactor)
    {

        if (!empty($this->check_validation($request))) {
            return redirect()->back()->withErrors($this->check_validation($request));
        }

        $request_data_structure = new SearchUrlIndexRequest(
            $request->query('url_name'),
            $request->query('medium_name'),
            $request->query('medium_dtl_name'),
            $request->query('lp_name'),
            $request->query('form_name'),
        );

        $response_data_structure = $interactor->index($request_data_structure);

        $view_model = new SearchUrlIndexViewModel(
            $response_data_structure->getRecords()
        );

        return view('Url.search', compact('view_model'));
    }

    private function check_validation(Request $request)
    {
        $error_message = [];
        if (self::MAX_LENGTH < mb_strlen($request->query('url_name'))) {
            $error_message['url_name'] = 'URL名は50文字以内で検索してください。';
        }

        if (self::MAX_LENGTH < mb_strlen($request->query('medium_name'))) {
            $error_message['medium_name'] = '媒体名は50文字以内で検索してください。';
        }

        if (self::MAX_LENGTH < mb_strlen($request->query('medium_dtl_name'))) {
            $error_message['medium_dtl_name'] = '媒体詳細名は50文字以内で検索してください。';
        }

        if (self::MAX_LENGTH < mb_strlen($request->query('lp_name'))) {
            $error_message['lp_name'] = 'LP名は50文字以内で検索してください。';
        }

        if (self::MAX_LENGTH < mb_strlen($request->query('form_name'))) {
            $error_message['form_name'] = 'FORM名は50文字以内で検索してください。';
        }

        return $error_message;
    }
}
