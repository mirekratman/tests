<?php

namespace Cds\Library\Mysql\Entity;

use Doctrine\ORM\Mapping as ORM;
use FatFree\Entity\DoctrineOrm\BaseEntity;

/**
 * @ORM\Entity(repositoryClass="Cds\Library\Mysql\Repository\CdsDomainRepository")
 */
class CdsDomain extends BaseEntity
{
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Cds\Library\Mysql\Entity\CdsServer", inversedBy="domain", fetch="EAGER")
     * @ORM\JoinColumn(name="serverid", referencedColumnName="id", nullable=false)
     */
    protected $server;
}
