<?php

namespace Lp\MockInteractor\Create;

use Lp\Domain\DomainService\LpDomainService;
use Lp\Domain\Lp\Lp;
use Lp\Domain\Lp\LpDirectory;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpMemo;
use Lp\Domain\Lp\LpName;
use Lp\Domain\Lp\LpRepositoryInterface;
use Lp\UseCase\CreateLp\CreateLpUseCaseInterface;
use Lp\UseCase\CreateLp\Request\CreateLpHandleRequest;
use Lp\UseCase\CreateLp\Response\CreateLpHandleResponse;
use illuminate\Support\Str;
use UnexpectedValueException;

class MockCreateLpInteractor implements CreateLpUseCaseInterface
{

    private $lp_domain_service;
    private $repository;

    public function __construct(
        LpDomainService $domain_service,
        LpRepositoryInterface $repository,
    ) {
        $this->lp_domain_service = $domain_service;
        $this->repository = $repository;
    }

    public function handle(CreateLpHandleRequest $request): CreateLpHandleResponse
    {
        $lp_name = $request->getLpName();

        $lp_directory = $request->getLpDirectory();

        $exist_lp_name = $this->lp_domain_service->existByName(new LpName($lp_name));

        if ($this->isExist($exist_lp_name)) {
            throw new UnexpectedValueException("This name of lp is alrady exist");
        }

        $exist_lp_directory = $this->lp_domain_service->existByDirectory(new LpDirectory($lp_directory));

        if ($this->isExist($exist_lp_directory)) {
            throw new UnexpectedValueException("This directory of lp is already exist");
        }

        $lp_instance = new Lp(
            new LpId((string)Str::uuid()),
            new LpName($lp_name),
            new LpDirectory($lp_directory),
            $request->getLpMemo() === null ? null : new LpMemo($request->getLpMemo())
        );

        $this->repository->save($lp_instance);

        return new CreateLpHandleResponse(
            $lp_instance->getLpId()->getValue(),
            $lp_instance->getLpName()->getValue(),
            $lp_instance->getLpDir()->getValue(),
            $request->getLpMemo() === null ? null : $lp_instance->getLpMemo()->getLpMemo()
        );
    }

    private function isExist($value): bool
    {
        return $value;
    }
}
