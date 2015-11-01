<?php

namespace Entity;

class Project
{
    use EntityTrait;

    private $projectName;
    private $executionTime;
    private $field;

    /**
     * @return mixed
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @param mixed $projectName
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
    }

    /**
     * @return mixed
     */
    public function getExecutionTime()
    {
        return $this->executionTime;
    }

    /**
     * @param mixed $executionTime
     */
    public function setExecutionTime($executionTime)
    {
        $this->executionTime = $executionTime;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param mixed $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }
}