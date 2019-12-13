<?php
class ToDoTask
{
    private $id;
    private $subject;
    private $date;
    private $description;
    private $status;

    public function __construct($id, $subject, $date, $description, $status)
    {
        $this->$id = $id;
        $this->$subject = $subject;
        $this->$date = $date;
        $this->$description = $description;
        $this->$status = $status;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}
