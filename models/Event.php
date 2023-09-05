<?php

class Event
{

    private string $description;
    private string $date;
    private string $category_id;


    /**
     * @param string $description
     * @param string $date
     * @param string $category_id
     */
    public function __construct(string $description, string $date, string $category_id)
    {
        $this->description = $description;
        $this->date = $date;
        $this->category_id = $category_id;
    }

    /**
     * @return string
     */
    public function getdescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $name
     */
    public function setdescription(string $description): void
    {
        $this->description = $description;
    }
    /**
     * @return string
     */
    public function getdate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setdate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getCategory_id(): string
    {
        return $this->category_id;
    }

    /**
     * @param string $category_id
     */
    public function setCategory_id(string $category_id): void
    {
        $this->category_id = $category_id;
    }
}
