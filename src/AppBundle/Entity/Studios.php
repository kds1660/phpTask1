<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Studios
 *
 * @ORM\Table(name="studios", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name", "year"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repositories\StudiosQueries")
 */
class Studios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_studio", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStudio;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=63, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date", nullable=false)
     */
    private $year;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Films", mappedBy="idStudio")
     */
    private $idFilm;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idFilm = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

