<?php

namespace Entity;

class Grant
{
    use EntityTrait;

    private $grant;
    private $fund;

    /**
     * @return mixed
     */
    public function getGrant()
    {
        return $this->grant;
    }

    /**
     * @param mixed $grant
     */
    public function setGrant($grant)
    {
        $this->grant = $grant;
    }

    /**
     * @return mixed
     */
    public function getFund()
    {
        return $this->fund;
    }

    /**
     * @param mixed $fund
     */
    public function setFund($fund)
    {
        $this->fund = $fund;
    }
}