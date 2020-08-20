<?php
/**
 * Performing two function first one to get lovely number and another one to get luckyday of John Gambler 
 */
class Red_vision{
	
  /*
  * To get lovely number from any range A, B
  */
  public function getLovelyNumbers($start, $end){
    $repeated = 0; $remove_me = 0;
    if($end<$start){ return 'Action can not be completed : End number should be greater'; }
    for ($i = $start ; $i <= $end; $i++) 
    { 
     $repeated++;
     $crnt_number = $i; 
     $history = array(); 
     while($crnt_number) 
     { 
      if(isset($history[$crnt_number%10])){
        $ct = $crnt_number%10;
        if($ct/10==0) { 
          $history[$crnt_number%10] = ($history[$crnt_number%10])+1;
        }
        if($history[$crnt_number%10]==3){ $remove_me++; break; }
      }
      else{
        $history[$crnt_number%10] = 1;
      }
      $crnt_number = (int)$crnt_number / 10; 
    }
  }
    $selected_no = $repeated - $remove_me;
    return $selected_no; 
  }

  /*
  * Question : Casino John Lucky day 
  */
  public function luckyDay($n, $k){
    $single_round = 0;
    $all_in = 0;
    if($n==1){
      $single_round = 0;
      exit();
    }

    // for ($i=$n; $i>0 ; $i++) { 
    begining:
    if($n%2==0 && $n>2 && $k>0){
      $n = $n/2;
      $all_in++;
      $k--;
    }
    else{
      $n = $n-1;
      $single_round++;
    }
    if( $n>1 ) { goto begining; }
    $res = array();
    $res['single_round'] = $single_round;
    $res['all_in'] = $all_in;
    return $res;
  }

}
echo "<pre>";
$obj = new Red_vision();
$start = 1; $end = 111;
echo "Total Lovely Numbers : ";
echo $lovely_numbers = $obj->getLovelyNumbers($start, $end);

echo "<br/><br/>********************************<br/><br/>";

$n = 18; $k = 2;
$result = $obj->luckyDay($n, $k);

print_r($result);
?>