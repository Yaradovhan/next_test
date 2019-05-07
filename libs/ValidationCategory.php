<?php

class ValidationCategory
{
    private $con;
    private $queryFactory;

    public function __construct($connect = null, $queryFactory = null)
    {
        $this->con = $connect;
        $this->queryFactory = $queryFactory;
    }

    public function confirmData(string $data)
    {
        $catIds = [];
        $catIds = explode('/', $data);
//        dd($catIds);
        $select = $this->queryFactory->newSelect();
        $select->cols([
           'id',
           'name',
           'parent_id'
        ]);
        dd($select);
    }

}