<?php

require_once 'View.php';
require_once 'ValidationCategory.php';

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Qpdb\PdoWrapper\PdoWrapperService;

use Qpdb\QueryBuilder\QueryBuild;

class Model
{
    protected $placeHolderProp = array();
    protected $dataProp = array();
    protected $validCat;

    public function __construct()
    {
        $this->placeHolderProp['%TITLE%'] = 'Parse file';
        $this->placeHolderProp['%MSG%'] = '';
        $this->placeHolderProp['%SUCCESS%'] = '';
        $this->dataProp['%SUCCESS_FILES%'] = [];
        $this->placeHolderProp['%FAIL%'] = '';
        $this->dataProp['%FAIL_FILES%'] = [];
        $this->validCat = new ValidationCategory();
        $configSample = new ConfigSample();
        PdoWrapperService::getInstance()->setPdoWrapperConfig($configSample);

    }

    public function getArray()
    {
        return $this->placeHolderProp;
    }

    public function valid($file)
    {
        $result = [];
        $reader = ReaderFactory::create(Type::CSV);
        $reader->open($file['request']['tmp_name']);

//        $this->getCategoriesTree();

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $index => $row) {
//                if(strlen($row[0])>255){
//                    $this->placeHolderProp['%FAIL_FILES%'][] = $row;
//                    continue;
//                }
//                if($row[0] == '111'){
//                    $this->placeHolderProp['%SUCCESS_FILES%'][] =  $row;
//                }
                $this->validCat->confirmData($row);
            }
        }
        $this->countFailSuccess();

        return $result;
    }

    public function countFailSuccess()
    {

        if (count($this->dataProp['%FAIL_FILES%']) > 0) {
            $this->placeHolderProp['%FAIL%'] = 'Count fail row: ' . count($this->dataProp['%FAIL_FILES%']);
        }
        if (count($this->dataProp['%SUCCESS_FILES%']) > 0) {
            $this->placeHolderProp['%SUCCESS%'] = 'Count OK row: ' . count($this->dataProp['%SUCCESS_FILES%']);
        }
    }

    public function getCategoriesTree()
    {
        $query = QueryBuild::select('Categories')->fields('id', 'name', 'parent_id')->whereEqual('id', 8);
        $categories = $query->execute();
        dd($this->buildTree($categories));

    }

    function buildTree(array $elements, $parentId = 0)
    {

        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] != null) {
                $children = $this->buildTree($elements, $element['parent_id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }

}