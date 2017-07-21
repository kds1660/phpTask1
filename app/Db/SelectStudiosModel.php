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
        $queryResults = $this->runSqlQuery($sql, '');
        return $queryResults;
    }
}
