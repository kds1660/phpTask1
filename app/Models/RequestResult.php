<?php

namespace App\Models\RequestResult;

use App\DbConnect as Db;
use Log\Logger as Log;

class RequestResult
{
    public $result;

    public function __construct($result)
    {
        $this->result = $result;
    }


    public static function page1()
    {
        include ROOT . '/app/include/requestText1.php';
        $listQuery=[];
        $db = Db\DbConnect::getInstance();
        foreach ($sql as $sql) {
            Log\Logger::log('Model::page1, request: '.$sql);
            $req = $db->query($sql);
            $list = [];
            foreach ($req->fetchAll(\PDO::FETCH_ASSOC) as $result) {
                $list[] = new RequestResult($result);
            }
            $listQuery[] = array($sql, $list);
        }


        return $listQuery;
    }

    public static function page2($studio)
    {
        include ROOT . '/app/include/requestText2.php';

        $listQuery=[];
        $db = Db\DbConnect::getInstance();
        foreach ($sql as $sql) {
            Log\Logger::log('Model::page2, request: '.$sql."\n".'studio: '.$studio);
            $req = $db->prepare($sql);
            $req->execute(array('studio' => $studio));

            $list = [];
            foreach ($req->fetchAll(\PDO::FETCH_ASSOC) as $result) {
                $list[] = new RequestResult($result);
            }
            $listQuery[] = array($sql, $list);
        }
        return $listQuery;
    }
}
