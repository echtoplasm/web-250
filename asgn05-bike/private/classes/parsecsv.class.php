<?php

class ParseCSV
{
  // this is not a method, but this allows the parseCSV class 
  // to have a defined property for what the delimiter in the file 
  // being parsed will be and since this is a CSV parser then 
  // obviously the delimiter will be a comma.
  public static $delimiter = ',';

  private $filename;
  private $header;
  private $data = [];
  private $row_count = 0;

  // constructor dunction for assigning the filename being parsed
  // to the class 
  public function __construct($filename = '')
  {
    if ($filename != '') {
      $this->file($filename);
    }
  }
  
  // this is a poorly named method but i was just following what kevin did 
  // this function literally is just a setter for the filename with some 
  // existence validation 
  public function file($filename)
  {
    if (!file_exists($filename)) {
      echo "File does not exist.";
      return false;
    } elseif (!is_readable($filename)) {
      echo "File is not readable.";
      return false;
    }
    $this->filename = $filename;
    return true;
  }
  
  // again this is a weird function that calls the reset function before
  // before reset has ever been written in the class definition, this 
  // violates the c-style paradigm of 'declare before use', but kevin wrote
  // it this way so i just kept it 
  //
  // the purpose of this function is to iterate through the csv file, 
  // split on delimiter, and pass the line if it is null 
  // it then returns an array of data that has been stored in $this -> data 
  public function parse()
  {
    if (!isset($this->filename)) {
      echo "File not set.";
      return false;
    }

    $this->reset();

    $file = fopen($this->filename, 'r');
    while (!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if ($row == [NULL] || $row === FALSE) {
        continue;
      }
      if (!$this->header) {
        $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->row_count++;
      }
    }
    fclose($file);
    return $this->data;
  }
  
  // this is literally just a getter for $this->data weird naming choice
  // again 
  public function last_results()
  {
    return $this->data;
  }

  // this is literally just a getter for the number of rows 
  public function row_count()
  {
    return $this->row_count;
  }

  // this resets the objects state back to empty
  private function reset()
  {
    $this->header = NULL;
    $this->data = [];
    $this->row_count = 0;
  }
}
