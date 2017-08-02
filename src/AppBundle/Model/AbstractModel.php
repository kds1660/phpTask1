<?php

namespace AppBundle\Model;

abstract class AbstractModel
{
    public function getRequestText()
    {
        return $this->sql;
    }
}
