<?php

class View
{
	private $forRender;
	private $file;

	public function __construct($template)
	{       
		  $this->file = file_get_contents($template);
	}

	public function addToReplace($mArray)
	{
	  foreach($mArray as $key=>$val)
	   {
			$this->forRender[$key] = $val;
	   }
	}

	public function templateRender()
	{
//	    dd($this->forRender);
		foreach($this->forRender as $key=>$val)
		{
			$this->file = str_replace($key, $val, $this->file);
		}													
		echo $this->file;
    }
    
    public static function makeList($data)
	{	
//    $arr['%OUT%'] = '';
//    foreach ($data as $row) {
//        $arr['%OUT%'] .= 	'<br><div class="row align-items-center">'
//							. '<div class="col"><p>'
//							. '<a href = ' . $row['link'] . '>' . $row['linkText'] . '</a></p>'
//							. '<p>' . $row['link'] . '</p>'
//							. '<p>' . $row['details'] . '</p></div></div><hr>';
//    }
//    return $arr['%OUT%'];
	}
    
}
