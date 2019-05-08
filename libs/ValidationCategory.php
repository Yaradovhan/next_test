<?php

use Qpdb\PdoWrapper\PdoWrapperService;
use Qpdb\QueryBuilder\QueryBuild;

class ValidationCategory
{

    public function __construct()
    {
        $configSample = new ConfigSample();
        PdoWrapperService::getInstance()->setPdoWrapperConfig($configSample);
    }

    public function confirmData(string $data)
    {
        $catIds = [];
        $catIds = explode('/', $data);

        dd($catIds);
        foreach ($catIds as $k => $id) {
//            dd($id);
            $query = QueryBuild::select('Categories')
               ->fields('name, parent_id')
               ->whereEqual('id',$id);
dd($query->getSyntax());
//            $result = $query->execute();
            /** return array */
//            dd($result);


        }



    }

}