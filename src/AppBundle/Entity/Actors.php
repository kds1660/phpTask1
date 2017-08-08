<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actors
 *
 * @ORM\Table(name="actors", indexes={@ORM\Index(name="id_actor", columns={"id_actor"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repositories\ActorsQueries")
 */
class Actors
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_actor", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActor;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=31, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=31, nullable=false)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Fees",mappedBy="idActor")
     * @ORM\JoinColumn(name="id_actor", referencedColumnName="id_actor")
     */
    private $actorFees;
}

