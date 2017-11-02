<?php
class Utility{
	public static $inputDateString;
	public static $inputEpochDateTime;
	public $objInputDateString;
	public function __construct($inputDate) {
		print "Utility Object initiated</br>";
		$this->objInputDateString = $inputDate;
	}
	public static function isDateWithin30Days($inputValue){
		self::$inputDateString=$inputValue;
		if (!self::CheckValidDate()){
			self::ConvertDateToEpoch();
			$epochNow = time();
			$diff = self::$inputEpochDateTime - $epochNow;
			print_r($diff);
			if ( $diff < (30 * 60*60*24)){
				// earlier than today
				return -2;
			}
			else if ($diff > (30*60*60*24)){
				return -3;
			}
			else return 0;
		}
		else return -1;
	}
	public static function CheckValidDate(){
		$inputDateStringpart = explode('-', self::$inputDateString);
		$day=$inputDateStringpart[0];
		$month=$inputDateStringpart[1];
		$year=$inputDateStringpart[2];
		print("Date: $day,$month,$year");
		print("</br>");
		if (!checkdate($month,$day,$year)){
			return -1;
		}
		else return 0;
	}
	public static function ConvertDateToEpoch(){
		$inputDateStringpart = explode('-', self::$inputDateString);
		$day=$inputDateStringpart[0];
		$month=$inputDateStringpart[1];
		$year=$inputDateStringpart[2];
		self::$inputEpochDateTime=mktime(23,59,59,$month,$day,$year);
	}
	public function printDates(){
		print "</br><b>Display dates values</b> </br>";
		print "Input String date: ".self::$inputDateString."</br>";
		print "Input Object String date: ".$this->objInputDateString."</br>";
		print "Epoch date equivalent: ".self::$inputEpochDateTime."</br>";
		print "</br>";
	}
}