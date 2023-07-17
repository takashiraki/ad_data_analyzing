<?php

namespace Lp\MockInteractor\Edit;

use Lp\Application\Services\OldLp\OldLp;
use Lp\Domain\DomainService\LpDomainService;
use Lp\Domain\Lp\Lp;
use Lp\Domain\Lp\LpDirectory;
use Lp\Domain\Lp\LpId;
use Lp\Domain\Lp\LpMemo;
use Lp\Domain\Lp\LpName;
use Lp\Domain\Lp\LpRepositoryInterface;
use Lp\UseCase\EditLp\EditLpUseCaseInterface;
use Lp\UseCase\EditLp\Request\EditLpHandleRequest;
use Lp\UseCase\EditLp\Request\EditLpIndexRequest;
use Lp\UseCase\EditLp\Response\EditLpHandleResponse;
use Lp\UseCase\EditLp\Response\EditLpIndexResponse;
use UnexpectedValueException;

class MockEditLpInteractor implements EditLpUseCaseInterface
{
    private $lp_domain_service;

    private $lp_repository;

    public function __construct(LpDomainService $domain_service, LpRepositoryInterface $repositorty)
    {
        $this->lp_domain_service = $domain_service;
        $this->lp_repository = $repositorty;
    }

    public function index(EditLpIndexRequest $request): EditLpIndexResponse
    {
        $lp_id = new LpId($request->getLpId());

        $exist_lp_id = $this->lp_domain_service->existById($lp_id);

        if ($this->isNotExist($exist_lp_id)) {
            throw new UnexpectedValueException('This lp dose not exist');
        }

        $lp = $this->lp_repository->findById($lp_id);

        return new EditLpIndexResponse(
            $lp->getLpId()->getValue(),
            $lp->getLpName()->getValue(),
            $lp->getLpDir()->getValue(),
            $lp->getLpMemo()
        );
    }

    public function handle(EditLpHandleRequest $request): EditLpHandleResponse
    {
        $lp_id = new LpId($request->getLpId());

        $exist_lp_id = $this->lp_domain_service->existById($lp_id);

        if ($this->isNotExist($exist_lp_id)) {
            throw new UnexpectedValueException('This lp dose not exist');
        }

        $old_lp_instance = new OldLp($this->lp_repository->findById($lp_id));

        $new_lp_instance = new Lp(
            $lp_id,
            new LpName($request->getLpName()),
            new LpDirectory($request->getLpDirectory()),
            new LpMemo($request->getLpMemo())
        );

        $equal_lp_name = $this->lp_domain_service->equalByName($new_lp_instance, $old_lp_instance);

        if ($this->isNotEqual($equal_lp_name)) {
            $exist_lp_name = $this->lp_domain_service->existByName($new_lp_instance->getLpName());

            if ($this->isExist($exist_lp_name)) {
                throw new UnexpectedValueException('This lp name already exist');
            }
        }

        $equal_lp_directory = $this->lp_domain_service->equalByDirectory($new_lp_instance, $old_lp_instance);

        if ($this->isNotEqual($equal_lp_directory)) {
            $exist_lp_directory = $this->lp_domain_service->existByDirectory($new_lp_instance->getLpDir());

            if ($this->isExist($exist_lp_directory)) {
                throw new UnexpectedValueException('This lp directory already exist');
            }
        }

        $this->lp_repository->update($new_lp_instance);

        return new EditLpHandleResponse(
            $new_lp_instance->getLpId()->getValue(),
            $new_lp_instance->getLpName()->getValue(),
            $new_lp_instance->getLpDir()->getValue(),
            $new_lp_instance->getLpMemo()->getLpMemo()
        );
    }

    private function isExist(bool $value): bool
    {
        return $value;
    }

    private function isNotExist(bool $value): bool
    {
        return $value === false ? true : false;
    }

    private function isNotEqual(bool $value): bool
    {
        return $value === false ? true : false;
    }
}
