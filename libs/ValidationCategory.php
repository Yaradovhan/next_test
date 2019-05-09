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

    public function confirmData(array $data)
    {
        $prodData = [];
        $prodData['mpn'] = $data[0];
        $prodData['brand'] = $data[1];
        $prodData['product'] = $data[2];
        $prodData['status'] = $data[3];
        $prodData['catIds'] = explode(' / ', $data[4]);

        dd($prodData);
//        foreach ($catIds as $k => $id) {
//            dd($id);
//            $query = QueryBuild::select('Categories')
//               ->fields('name, parent_id')
//               ->whereEqual('id',$id);
//dd($query->getSyntax());
//            $result = $query->execute();
        /** return array */
//            dd($result);


    }


}