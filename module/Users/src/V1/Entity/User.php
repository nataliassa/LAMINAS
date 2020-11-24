<?php

namespace Users\V1\Entity;

use DateTime;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Laminas\Hydrator\DoctrineObject as DoctrineHydrator;


/**
 * User
 *
 * @ORM\Table(name="Users")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=80, nullable=false)
     */
    private $username;

    /**
     * @var Email
     * @ORM\OneToMany(targetEntity="Users\V1\Entity\Email", mappedBy="userId", cascade={"persist", "remove"}, orphanRemoval=true, indexBy="emailId"))
     */
    private $emails;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emails = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return Users\V1\Entity\Email
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param Email $emails
     * @return User
     */
    public function setEmails(Email $emails)
    {
        $this->emails = $emails;
        return $this;
    }

    /**
     * @param $emails
     */
    public function addEmails(Collection  $emails){
        foreach ($emails as $email) {
            $email->setUserId($this);
            $this->emails->add($email);
        }
    }

    /**
     * @param $emails
     */
    public function removeEmails(Collection  $emails){
        foreach ($emails as $email) {
            $email->setUserId(null);
            $this->emails->removeElement($email);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        $arr = get_object_vars($this);
       // $arr['emails'] = $this->getEmails()->getArrayCopy();
         return $arr;
    }

}
