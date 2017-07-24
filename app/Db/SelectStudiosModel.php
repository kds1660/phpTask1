<?php

namespace App\Db;

class SelectStudiosModel extends AbstractModel
{
    /**
     * @return array
     */

    public function getStudios(): array
    {
        $sql = 'select name from studios';
        return $this->runSqlQuery($sql, '');
    }
}
