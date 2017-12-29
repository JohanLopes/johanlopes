<?php

namespace App\Services;

use Symfony\Component\Yaml\Yaml;
use App\Entity\Project;

class ProjectFinder
{
    protected $projects;

    public function __construct($dataPath)
    {
        $this->projects = Yaml::parseFile($dataPath);
    }

    /**
     * Find project by slug
     *
     * @param $slug
     * @return App\Entity\Project
     */
    public function find($slug)
    {
        if (!array_key_exists($slug, $this->projects)) {
            throw new \Exception("No project with slug " . $slug);
        }

        return $this->projects[$slug];
    }

    /**
     * Find all projects
     *
     * @retur array
     */
    public function findAll()
    {
        return $this->projects;
    }
}
