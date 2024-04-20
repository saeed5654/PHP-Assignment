<?php

class Movie
{
    private $name;
    private $casts;
    private $release_date;
    private $director;
    private $ratings;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCasts()
    {
        return $this->casts;
    }

    /**
     * @param mixed $casts
     */
    public function setCasts($casts)
    {
        $this->casts = $casts;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * @param mixed $release_date
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return mixed
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * @param mixed $ratings
     */
    public function setRatings($ratings)
    {
        $this->$ratings = $ratings;
    }
}