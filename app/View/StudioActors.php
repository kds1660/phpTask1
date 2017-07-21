<?php

namespace App\View;

use App\Db\StudioActorsModel;

class StudioActors extends AbstractBlock
{
    public function __construct($query='')
    {
        $this->query=$query;
    }

    public function getQueryResults($sql=null): array
    {
        $classname=explode('\\',__CLASS__);
        $classname='App\Db\\'.$classname[count($classname)-1].'Model';
        echo $classname;
        $model = new $classname();
        return $model->getStudioActors($sql);
    }
}
