<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fees
 *
 * @ORM\Table(name="fees", uniqueConstraints={@ORM\UniqueConstraint(name="id_film_actor", columns={"id_film", "id_actor"})}, indexes={@ORM\Index(name="actor_key", columns={"id_actor"}), @ORM\Index(name="film_key", columns={"id_film"})})
 * @ORM\Entity
 */
class Fees
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fee", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFee;

    /**
     * @var integer
     *
     * @ORM\Column(name="fee", type="integer", nullable=false)
     */
    private $fee;

    /**
     * @var \AppBundle\Entity\Actors
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Actors",inversedBy="actorFees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_actor", referencedColumnName="id_actor")
     * })
     */
    private $idActor;

    /**
     * @var \AppBundle\Entity\Films
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Films")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_film", referencedColumnName="id_film")
     * })
     */
    private $idFilm;


}

