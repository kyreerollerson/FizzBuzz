<?php

/**
 * NumberGenerator_Class generates all of the numbered and "Fizz"/"Buzz"/"FizzBuzz" values
 *
 * PHP version 5.6
 *
 * Example usage:
 * $generator = new Generator();
 * $values = $generator->generateNumbers(1, 100);
 *
 * @author	Kyree S. Williams <me@kyreeswilliams.com>
 */
	
class NumberGenerator{

	/**
     * returns an array of iterated values or an error
     *
     * @param 	int $startNumber: the starting number for the iteration, no smaller than 0
     * @param 	int $endNumber: the ending number for the iteration, no larger than 1000
     * @return 	array
     * @access 	public
     */
	public function generateNumbers($startNumber, $endNumber){
		/**
		 * set up preliminary variables
		 */
		$data = array();
		$errors = array();
		/**
		 * handle error generation
		 */
		if($startNumber >= $endNumber){
			$errors[] = "The starting number must be less than the ending number";
		}
		if($startNumber < 0){
			$errors[] = "The starting number must be greater than 0";
		}
		if($endNumber > 1000){
			$errors[] = "The ending number must be no larger than 1000";
		}
		if($startNumber == $endNumber){
			$errors[] = "The starting number and ending number cannot be the same";
		}
		/**
		 * end and return errors if any exist
		 */
		if(!empty($errors)){
			$data["errors"] = $errors;
			return $data;
		}
		/**
		 * otherwise generate and return array of values
		 */
		for($i=$startNumber; $i<=$endNumber; $i++){
			$value = "";
			/**
			 * if i is a multiple of 3, add "Fizz" to value string
			 */
			if($i%3 == 0){
				$value.= "Fizz";
			}
			/**
			 * if i is a multiple of 5, add "Buzz" to value string
			 */
			if($i%5 == 0){
				$value.= "Buzz";
			}
			/**
			 * if i is not a multiple of 3 or 5, just add i to value string
			 */
			if(($i%3 != 0) && ($i%5 != 0)){
				$value.= $i;
			}
			/**
			 * if i is not a multiple of 3 or 5, just add i to value string
			 */
			$data[] = $value;
		}
		$data[] = "Fin";
		return $data;
	}

}

?>