<?php

namespace Cds\Library\Mysql\Entity;

use Doctrine\ORM\Mapping as ORM;
use FatFree\Entity\DoctrineOrm\BaseEntity;

/**
 * @ORM\Entity(repositoryClass="Cds\Library\Mysql\Repository\CdsServerRepository")
 */
class CdsServer extends BaseEntity
{
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="ip", type="string", length=100, nullable=false)
     */
    protected $ip;

    /**
     * Server admin url
     * @var string
     * @ORM\Column(name="url", type="string", length=2000, nullable=false)
     */
    protected $url;

    /**
     * @ORM\OneToMany(targetEntity="Cds\Library\Mysql\Entity\CdsDomain", cascade={"ALL"}, mappedBy="server")
     */
    protected $domain;
}
