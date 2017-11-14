

<?php

/**
* Date Format
*/
class Format 
{
	
	public function DateFormat($date)
	{
		 return date('F j,Y g:i a',strtotime($date));
	}

	public function validation($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	public function textShorten($text,$limit=400)
	{
		$text=$text." ";
		$text=substr($text,0, $limit);
		$text=substr($text,0,strrpos($text,''));
		$text=$text.".";
		return $text;
	}
}

?>