<?php

namespace Cds\Library\Mysql\Service;

use FatFree\Service\DoctrineOrm\BaseService;
use FatFree\Entity\DoctrineOrm\BaseEntity;

class DomainService extends BaseService
{
    public function get(BaseEntity $entity)
    {
        $dql = $this->entityManager
            ->getRepository($entity->getClassName())
            ->createQueryBuilder($entity->getClassNameWithoutNamespace())
            ->where(
                sprintf('%s.safeDelete != 1', $entity->getClassNameWithoutNamespace())
            )
            ->setMaxResults(10);

        $dql->orderBy(
            sprintf(
                '%s.id',
                $entity->getClassNameWithoutNamespace()
            ),
            'asc'
        );

        $result = $dql->getQuery()
            ->getSQL();


        return $result;
    }

    public function getWrong(BaseEntity $entity)
    {
        $dql = $this->entityManager
            ->getRepository($entity->getClassName())
            ->createQueryBuilder($entity->getClassName())
            ->where(
                sprintf('%s.safeDelete != 1', $entity->getClassName())
            )
            ->setMaxResults(10);

        $dql->orderBy(
            sprintf(
                '%s.%s',
                $entity->getClassName(),
                'id'
            ),
            'asc'
        );

        $result = $dql->getQuery()
            ->getSQL();

        return $result;
    }

}
