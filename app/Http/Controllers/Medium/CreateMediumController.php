<?php

namespace App\Http\Controllers\Medium;

use App\Http\Controllers\Controller;
use App\Http\Model\CreateMediumViewModel;
use App\Models\Medium;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use Media\Domain\DomainService\MediumDomainService;
use Media\UseCase\CreateMediumUseCase\CreateMediumRequest;
use Media\UseCase\CreateMediumUseCase\CreateMediumUseCaseInterface;


/**
 * --------------------------------------------------------------------------
 * Controller
 * --------------------------------------------------------------------------
 * 
 * 
 * --- Responsibility ---
 * The responsibility of this class is to change data to give the data to UseCase.
 */
class CreateMediumController extends Controller
{
    public function index()
    {
        return view('media.create');
    }

    public function handle(CreateMediumUseCaseInterface $interactor, Request $request)
    {
        $validate = $request->validate([
            'medium_name' => ['required', 'string', 'min:1', 'max:30'],
        ]);

        $name = $validate['medium_name'];

        $request_ds = new CreateMediumRequest($name);

        $response_ds = $interactor->createResponse($request_ds);

        $view_model = new CreateMediumViewModel($response_ds->getMediumId(), $response_ds->getMediumName());

        return view('media.created-completed', compact('view_model'));
    }
}
