<?php

namespace Johanlopes\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Johanlopes\CoreBundle\Entity\Project
 *
 * @ORM\Entity(repositoryClass="Johanlopes\CoreBundle\Entity\ProjectRepository")
 * @ORM\Table(name="project")
 */
class Project
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var text $resume
     */
    private $resume;

    /**
     * @var text $technology
     */
    private $technology;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var string $image
     */
    private $image;

    /**
     * @var integer $rank
     */
    private $rank;

    /**
     * @var string $slug
     *
     */
    private $slug;

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set resume
     *
     * @param text $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    /**
     * Get resume
     *
     * @return text
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set technology
     *
     * @param text $technology
     */
    public function setTechnology($technology)
    {
        $this->technology = $technology;
    }

    /**
     * Get technology
     *
     * @return text
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * Get rank
     *
     * @return integer
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
