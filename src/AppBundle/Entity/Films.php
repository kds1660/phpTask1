<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Films
 *
 * @ORM\Table(name="films", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name", "director", "year"})})
 * @ORM\Entity
 */
class Films
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_film", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFilm;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=63, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=31, nullable=false)
     */
    private $director;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date", nullable=false)
     */
    private $year;

    /**
     * @var integer
     *
     * @ORM\Column(name="budget", type="integer", nullable=false)
     */
    private $budget;

    /**
     * @var integer
     *
     * @ORM\Column(name="box_office", type="integer", nullable=false)
     */
    private $boxOffice;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="smallint", nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=31, nullable=false)
     */
    private $genre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Studios", inversedBy="idFilm")
     * @ORM\JoinTable(name="studio_films",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_film", referencedColumnName="id_film")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_studio", referencedColumnName="id_studio")
     *   }
     * )
     */
    private $idStudio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idStudio = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

