<?php

namespace Lp\MockInteractor\Delete;

use Lp\Domain\DomainService\LpDomainService;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpRepositoryInterface;
use Lp\UseCase\DeleteLp\DeleteLpUseCaseInterface;
use Lp\UseCase\DeleteLp\Request\DeleteLpIndexRequest;
use Lp\UseCase\DeleteLp\Response\DeleteLpIndexResponse;
use UnexpectedValueException;

class MockDeleteLpInteractor implements DeleteLpUseCaseInterface
{

    private $lp_domain_service;
    private $lp_repository;

    public function __construct(
        LpDomainService $domain_service,
        LpRepositoryInterface $repository
    ) {
        $this->lp_domain_service = $domain_service;
        $this->lp_repository = $repository;
    }

    public function index(DeleteLpIndexRequest $request): DeleteLpIndexResponse
    {
        $lp_id = new LpId($request->getLpId());

        $exist_lp_id = $this->lp_domain_service->existById($lp_id);

        if ($this->isNotExist($exist_lp_id)) {
            throw new UnexpectedValueException("This lp dose not exist");
        }

        $lp = $this->lp_repository->findById($lp_id);

        return new DeleteLpIndexResponse(
            $lp->getLpId()->getValue(),
            $lp->getLpName()->getValue(),
            $lp->getLpDir()->getValue(),
            $lp->getLpMemo()->getLpMemo()
        );
    }

    private function isNotExist(bool $value): bool
    {
        return $value === false ? true : false;
    }
}
