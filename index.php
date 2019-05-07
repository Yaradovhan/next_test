<?php
// require_once 'config.php';

//use Aura\SqlQuery\QueryFactory;

//$queryFactory = new QueryFactory('mysql');
//
//$select = $queryFactory->newSelect();

//dd($select);

//$con = DB::getConnection();
//dd($con);

// use Symfony\Component\Validator\Constraints\Length;
// use Symfony\Component\Validator\Validation;

// use Box\Spout\Reader\ReaderFactory;
// use Box\Spout\Common\Type;

// $validator = Validation::createValidator();

// $reader = ReaderFactory::create(Type::CSV); // for XLSX files
// // $reader = ReaderFactory::create(Type::CSV); // for CSV files
// //$reader = ReaderFactory::create(Type::ODS); // for ODS files

// $reader->open('test.csv');

// foreach ($reader->getSheetIterator() as $sheet) {
//     foreach ($sheet->getRowIterator() as $index=>$row) {
// dd($row);
//         }

// //        $violations = $validator->validate($row[0], [
// //            new Length(['max' => 255])
// //        ]);
// // if (0 !== count($violations)) {
// //     // there are errors, now you can show them
// //     foreach ($violations as $violation) {
// //         echo $violation->getMessage().'<br>';
// //     }
// // }
// //

// //        dd($row);
//     }


// $reader->close();


include ('config.php');
include ('libs/Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
try
{
    $obj = new Controller();
}
catch(Exception $e)
{
    echo $e->getMessage();
}
