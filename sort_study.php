<?php
/*PHP已经面世十几年了，数据结构更是数倍于PHP生龄，但很不理解的是语言界竟无一人出版使用PHP来讲解数据结构的专业书目。是PHP应用过于简单不懈著作？还是PHP所占领域并不重要导致？总之我当初在学这一块的时候甚是苦恼，伪代码让我很头痛。
  原本想专门针对数据结构用PHP讲解的方式写个小册子，现在就直接贴出来了。数据结构的知识渊深、复杂，有些知识点确实难于理解，这些源码供大家学习交流。其中包括：

  排序算法：插入排序、冒泡排序、快速排序、分治|合并算法排序、归并算法排序、选择排序、基数排序、
          堆排序、希尔排序、间接排序、计数排序、桶排序。
  查找算法：循序搜寻法、顺序查找、二分查找、插捕搜寻法。
  其它算法：斐波那契数列、线性表删除、汉落塔算法、阶乘算法、指定三角形边输出倒三角形。
  算法学习：根据要求输出的长度，匹配预先定义好的字符中的字符组合各种可能进行输出、根据两个矩形的
           四个点的坐标求出交集四点坐标，还不够完善。
 
  个人未使用成功的用//Failure已做标记，要注意。如果您有解法，希望回贴答之，先表示感谢了。*/
//插入排序（数组排序）前提：、适合：元素个数较少的排序
//参数：insertion_sort(目标数组)
function insertion_sort($array) {
 
 $len   = count($array);
 if(0 >= $len) {
  return false;
 }
 
 for($j=1; $j<$len; $j++) {
  $key  = $array[$j];
  $i   = $j-1;
  while($i>=0 && $array[$i]>$key) {    //移值过程
   $array[$i+1]  = $array[$i];
   $i--;
  }
  
  $array[$i+1]  = $key;      //把最后要插入的值放到对应的位置
 }
 
 return $array;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(insertion_sort($array));
 
//冒泡排序（数组排序）
//参数：bubble_sort(目标数组)
function bubble_sort($array) {
 
 $len   = count($array);
 if(0 >= $len) {
  return false;
 }
 
 for ($i=0; $i<$len; $i++) {
  for ($j=$len-1; $j>$i; $j--) {    //方式一
//  for ($j=$i+1; $j<$len; $j++) {    //方式二
   if($array[$i] > $array[$j]) {   //从小到大排序
//   if($array[$i] < $array[$j]) {   //从大到小排序
    $temp  = $array[$j];
    $array[$j] = $array[$i];
    $array[$i] = $temp;
   }
  }
 }
 
 return $array;
}

//$array    = array("2", "3", "1", "4");
//print_r(bubble_sort($array));
 
//快速排序（数组排序）
//参数说明quick_sort(数组)
function quick_sort($array) {
 
 $len   = count($array);
 if(1 >= $len) {
  return $array;
 }
 
 $key   = $array[0];
 $left_arr  = array();
 $right_arr  = array();
 
 for ($i=1; $i<$len; $i++) {
  if ($key >= $array[$i]) {
   $left_arr[]  = $array[$i];
  }else {
   $right_arr[] = $array[$i];
  }
 }
 
 $left_arr  = quick_sort($left_arr);
 $right_arr  = quick_sort($right_arr);
 
 return array_merge($left_arr, array($key), $right_arr);
}
//$array    = array("2", "4", "1", "3", "1");
//print_r(quick_sort($array));
 
//分治|合并算法排序（数组排序）前提：数组A[p...q]和A[q+1...r]已经排好序、适合：元素个数较多的排序
//参数：merge_sort(目标数组，开始位置，结束位置)
//Failure
//function merge_sort($array, $p, $q, $r) {
// 
// $n1   = $q - $p + 1;
// $n2   = $r - $q;
// for($i=1; $i<$n1; $i++) {
//  $arr1 = $array[$p+$i-1];
//  for ($j=1; $j<$n2; $j++) {
//   $arr2   = $arr1[$q+$j];
//   $i    = 1;
//   $j    = 1;
//   for($k=$p; $k<=$r; $k++) {
//    if($arr1[$i] <= $arr2[$j]) {
//     $array[$k]   = $arr1[$i];
//     $i++;
//    }else {
//     $array[$k]   = $arr2[$j];
//     $j++;
//    }
//   }
//  }
// }
// 
// return $array;
//}
//Failure
//function merge_sort_chil($array, $p, $q, $r) {
// 
// $len1   = $q - $p +1;
// $len2   = $r - $q;
// for($t=0; $t<$len1; $t++) {
//  $arr1[$t] = $array[$p+$t];
// }
// for ($t=0; $t<$len2; $t++) {
//  $arr2[$t] = $array[$q+$t+1];
// }
// 
// $i=$j   = 0;
// $k    = $p;
// while($i<$len1 && $j<$len2) {
//  if($arr1[$i] <= $arr2[$j]) {
//   $array[$k++]   = $arr1[$i++];
//  }else {
//   $array[$k++]   = $arr2[$j++];
//  }
// }
// 
// while($i<$len1) {
//  $array[$k++]    = $arr1[$i++];
// }
// while($j<$len2) {
//  $array[$k++]    = $arr2[$j++];
// }
//}
//
//function merge_sort($array, $p, $r) {
// 
// if($p < $r) {
//  $q   = ($p+$r)/2;
//  merge_sort($array,$p,$q);
//  merge_sort($array,$q+1,$r);
//  merge_sort_chil($array,$p,$q,$r);  
// }
// 
// return $array;
//}
//归并算法排序（数组排序）前提：数组A[p...q]和A[q+1...r]已经排好序、适合：元素个数较多的排序
//前提：数组$arr1和$arr2已经排好序
function merge_sort($arr1, $arr2) {
 
 $len1   = count($arr1);
 $len2   = count($arr2);
 //$array[]   = $len1 + $len2;
 $i=$j=$k  = 0;
 while($i<$len1 && $j<$len2) {
  if ($arr1[$i] <= $arr2[$j]) {
   $array[$k++]   = $arr1[$i++];
  }else {
   $array[$k++]   = $arr2[$j++];
  }
 }
 
 while ($i<$len1) {
  $array[$k++]    = $arr1[$i++];
 }
 while ($j<$len2) {
  $array[$k++]    = $arr2[$j++];
 }
 
 return $array;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//$arr1    = array("1", "2", "4");
//$arr2    = array("3", "5", "6");
//print_r(merge_sort($arr1, $arr2));
 
//选择排序（数组排序）前提：、适合：
//参数：select_sort(目标数组)
function select_sort($array) {
 
 $len   = count($array);
 for ($i=0; $i<$len-1; $i++) {
  $key  = $array[$i];
  $loc  = $i;
  for($j=$i+1; $j<$len; $j++) {
   if($array[$j] < $key) {
    $key  = $array[$j];
    $loc  = $j;
   }
  }
  
  $array[$loc]  = $array[$i];
  $array[$i]   = $key;
 }
 
 return $array;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(select_sort($array));
 
//基数排序（数组排序）前提：、适合：
//参数：base_sort(目标数组，基数值)
//Failure
//function base_sort($array, $key) {
// 
// $len   = count($array);
// $k    = 0;
// $n    = 1;
// while($n <= $key) {
//  for($i=0; $i<$len; $i++) {
//   $lsd      = (($array[$i]/$n));
//   $temp[$lsd][$order[$lsd]] = $array[$i];
//   $order[$lsd]++;
//  }
//  for ($i=0; $i<$len; $i++) {
//   if($order[$i] != 0) {
//    for ($j=0; $j<$order[$i]; $j++) {
//     $array[$k]   = $temp[$i][$j];
//    }
//    $order[$i]    = 0;
//   }
//   $n *= 10;
//   $k = 0;
//  }
// }
// 
// return $array;
//}
$array    = array("5", "2", "4", "6", "1", "3");
//print_r(base_sort($array, 4));
 
//堆排序（数组排序）前提：、适合：
//参数：heap_sort(目标数组，长度)
//未理解
function heap_sort(&$array) {
 
 $last   = count($array);
 array_unshift($array, 0);
 $i    = $last>>1;
 while (true) {
  adjust_node($i, $last, $array);
  if ($i > 1) {
   $i--;
  }else {
   if($last==1) {
    break;
   }
   swap($array[$last], $array[1]);
   $last--;
  }
 }
 
 array_shift($array); 
 return $array;
}
function adjust_node($n, $last, &$array) {
 $l    = $n<<1;
 if (!isset($array[$l])||$l>$last) {
  return ;
 }
 
 $r    = $l+1;
 if($r<=$last && $array[$r]>$array[$l]) {
  $l   = $r;
 }
 if($array[$l] > $array[$n]) {
  swap($array[$l], $array[$n]);
  adjust_node($l, $last, $array);
 }
}
function swap(&$a, &$b) {
 
 $a    = $a ^ $b;
 $b    = $a ^ $b;
 $a    = $a ^ $b;
 
// $temp   = $a;
// $a    = $b;
// $b    = $temp;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(heap_sort($array));
 
//希尔排序（数组排序）前提：、适合：缩小增量排序，不稳定
//参数：shell_sort(目标数组)
//Failure
function shell_sort($array) {
 
 $len   = count($array);
 for ($inc=1; $inc<=$len/9; $inc=3*$inc+1);
 for (; $inc>0; $inc/=3) {
  for ($i=$inc+1; $i<$len; $i+=$inc) {
   $t  = $array[$i-1];
   $j  = $i;
   while (($j>$inc) && ($array[$j-$inc-1])>$t) {
    $array[$j-1]  = $array[$j-$inc-1];
    $j     -= $inc;
   }
   
   $array[$j-1]   = $t;









  }
 }
 
 return $array;
}
//希尔排序
//Failure
function shell_sort2($array, $from, $len) {
 
 $value   = 1;
 while(($value+1)*2 < $len) {
  $value  = ($value+1)*2 - 1;
 }
 for ($delta=$value; $delta>=1; $delta=($delta+1)/2-1) {
  for($i=0; $i<$delta; $i++) {
   modify_insert_sort($array, $from+$i, $len-$i, $delta);
  }
 }
 
}
function modify_insert_sort($array, $from, $len, $delta) {
 
 if($len <= 1) {
  return ;
 }
 
 $temp   = null;
 for ($i=$from+$delta; $i<$from+$len; $i+=$delta) {
  $temp  = $array[$i];
  $j   = $i;
  for (; $j>$from; $j-=$delta) {
   if (strcmp($temp,$array[$j-$delta]) < 0) {
    $array[$j]   = $array[$j-$delta];
   }else {
    break;
   }
   
   $array[$j]    = $temp;
  }
 }
 
 //return $array;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(shell_sort2($array, 0, 6));
 
//间接排序（数组排序）前提：、适合：复制代价很高的元素。
//参数：indirect_sort(目标数组，数组长度)
//Faulure URL:http://www.cppblog.com/yuziyu/archive/2009/07/16/90212.html
function indirect_sort($array, $len) {
 
 if($array==NULL || $len<=0) {
  return 0;
 }
 
 for($i=0; $i<$len; ++$i) {
  $index[$i]   = i;
 }
 
 for($i=1; $i<$len; ++$i) {
  $temp    = $index[$i];
  for($j=$i; $j-1>=0&&$array[$j-1]>$array[$temp]; --$j) {
   $index[$j]  = $index[$j-1];
  }
  $index[$j]   = $temp;
 }
 
 for($i=0; $i<$len; ++$i) {
  if($index[$i] == $i) {
   continue;
  }else {
   $temp   = $array[$i];
   $j    = $i;
   while($index[$j] != $i) {
    $array[$j] = $array[$index[$j]];
    $temp2  = $j;
    $j   = $index[$j];
    
    $index[$temp2]  = $temp2;
   }
   
   $array[$j]    = $temp;
   $index[$j]    = $j;
  }
 }
 
 return 1;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(indirect_sort($array, 6));
 
//计数排序（数组排序）前提：、适合：计数排序的基本思想就是对每一个输入元素X，确定出小于X的元素个数后插入到对应位置
//参数：count_sort(目标数组)
function count_sort($array, $size) {
 
 $min=$max   = $array[0];
 for($i=1; $i<$size; $i++) {
  if($array[$i] < $min) {
   $min  = $array[$i];
  }else if($array[$i] > $max) {
   $max  = $array[$i];
  }
 }
 $range    = $max - $min + 1;
 for($i=0; $i<$range; $i++) {
  $count[$i]  = 0;
 }
 for($i=0; $i<$size; $i++) {
  $count[$array[$i]-$min]++;
 }
 
 $z     = 0;
 for($i=$min; $i<=$max; $i++) {
  for($j=0; $j<$count[$i-$min]; $j++) {
   $array[$z++] = $i;
  }
 }
 
 return $array;
}
//$array    = array("5", "2", "4", "6", "6", "1", "1", "3");
//print_r(count_sort($array, 8));
 
//基数排序（数组排序）前提：、适合：
//参数：distribution_sort(目标数组，数组长度)
//Failure URL:http://baike.baidu.com/view/1170573.htm
function distribution_sort($array, $d) {
 
 $len   = count($array);
 $n=$m   = 1;
 $k    = 0;
 $temp=$order = array();
 
 while($m<=$d) {
  for ($i=0; $i<$len; $i++) {
   $lsd = (($array[$i]/$n));
   $temp[$lsd][$order[$lsd]]  = $array[$i];
   $order[$lsd]++;
  }
  
  for ($i=0; $i<$d; $i++) {
   if ($order[$i] != 0) {
    for ($j=0; $j<$order[$i]; $j++) {
     $array[$k]    = $temp[$i][$j];
     $k++;
    }
    $order[$i]     = 0;
   }
   
   $n  *= 10;
   $k  = 0;
   $m++;
  }
 }
 
 return $array;
}
//Failure URL:http://www.cnblogs.com/sun/archive/2008/06/26/1230095.html
function radix_sort($array, $digit) {
 
 $len   = count($array);
 for ($k=1; $k<=$digit; $k++) {
  for ($i=0; $i<$len; $i++) {
   $tempSplitDigit  = $array[$i]/math_pow(10,$k-1) - ($array[$i]/math_pow(10,k))*10;
   $tempcountsortarray[$tempSplitDigit]  += 1;   
  }
  
  for ($m=1; $m<10; $m++) {
   $tempcountsortarray[$m]      += $tempcountsortarray[$m-1];
  }
  
  for ($n=$len-1; $n>=0; $n--) {
   $tempSplitDigit  = $array[$n]/math_pow(10,$k-1) - ($array[$n]/math_pow(10,$k))*10;
   $tempArray[$tempcountsortarray[$tempSplitDigit]-1]  = $array[$n];
   $tempcountsortarray[$tempSplitDigit]     -= 1;
  }
  
  for ($p=0; $p<$len; $p++) {
   $array[$p]   = $tempArray[$p];
  }
 }
 
 return $array;
}
function math_pow($d, $n) {
 
 $value   = 1;
 if($n <= 0) {
  return 1;
 }else {
  for ($i=1; $i<=$n; $i++) {
   $value = $value*$d;
  }
 }
 
 return $value;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(radix_sort($array, 3));
 
//桶排序（数组排序）前提：、适合：桶排序就是排序数字按大小划分为n段，每段装在一个桶里，然后对各个桶分别排序
//参数：bucket_sort(目标数组，开始排序位置，数组长度，数组最大值)
//Failure
function bucket_sort($keys, $from, $len, $max) {
 
 $temp=$count   = array();
 for ($i=0; $i<$len; $i++) {
  $count[$keys[$from+$i]]++;
 }
 
 for ($i=0; $i<$max; $i++) {
  $count[$i]   = $count[$i] + $count[$i-1];
 }
 
 array_copy($keys, $from, $temp, 0, $len);
 for ($k=$len-1; $k>=0; $k--) {
  $keys[--$count[$temp[$k]]]   = $temp[$k];
 }
 
 return $keys;
 
}
function array_copy($keys, $from, &$temp, $start, $len) {
 
 for ($i=$start; $i<$len; $i++) {
  $temp[$start++]   = $keys[$from++];
 }
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(bucket_sort($array, 0, 6, 6));
 
 
 
//循序搜寻法（数组值查找）前提：、适合：
//参数：(目标数组，键值)
function liner_search($array, $key) {
 
 $i    = 0;
 while($array[$i] != $key) {
  $i++;
 }
 
 return $i;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(liner_search($array, 1));
//顺序查找（数组里的某个元素）
//参数：sequence_search(目标数组，查找范围，目标值)
function sequence_search($array, $n, $k) {
 
// $array[$n]   = $k;
 for ($i=0; $i<$n; $i++) {
  if($array[$i] == $k) {
   break;
  }
 }
 
 if ($i < $n) {
  return $i;
 }else {
  return -1;
 }
}
//$array    = array("1", "2", "3", "4");
//echo sequence_search($array, 4, 3);
 
//二分查找（数组里查找某个元素），前提：该数组已经按从小到大的顺序排列好了
//参数：bin_sch(目标数组，开始位置，最终位置，目标值)
function bin_sch($array, $low, $high, $k) {
 
 if($low <= $high) {
  $mid    = intval(($low+$high)/2);
  if($array[$mid] == $k) {
   return $mid;
  }elseif ($k < $array[$mid]) {
   return bin_sch($array, $low, $mid-1, $k);
  }else {
   return bin_sch($array, $mid+1, $high, $k);
  }
 }
 
 return -1;
}
//$array    = array("1", "2", "3", "4");
//echo bin_sch($array, 2, 3, 4);
 
//插捕搜寻法（数组查找元素）前提：、适合：分布平均的数组
//参数：interpolation_sch(目标数组，目标值)
//Failure
function interpolation_sch($array, $key) {
 
 $low   = 0;
 $upper   = count($array) -1;
 while($low <= $upper) {
  $mid  = ($upper-$low) * ($key-$array[$low])/($array[$upper]-$array[$low]) + $low;
  if($mid<$low || $mid>$upper) {
   return -1;
  }
  if ($key < $array[$mid]) {
   $upper = $mid -1;
  }elseif ($key > $array[$mid]) {
   $low = $mid + 1;
  }else {
   return $mid;
  }
 }
 
 return -1;
}
//$array    = array("5", "2", "4", "6", "1", "3");
//print_r(interpolation_sch($array, 2));
 
 

//斐波那契数列（计算总和）前提：、适合：
//参数：fibonacci(长度)
function fibonacci($n) {
 
 if(0==$n || 1==$n) {
  return $n;
 }
 
 $array[0]   = 0;
 $array[1]   = 1;
 $totle    = 1;
 for($i=2; $i<=$n; $i++) {
  $array[$i]  = $array[$i-1] + $array[$i-2];
  $totle   += $array[$i];
 }
 
 $result["sort"]  = $array;
 $result["totle"] = $totle;
  
 return $result;
}
//print_r(fibonacci(5));
 
//线性表删除（数组中实现）
//参数：delete_array_element(目标数组，删除位置)
function delete_array_element($array, $i) {
 
 for ($j=$i; $j<count($array); $j++) {
  $array[$j]  = $array[$j+1];
 }
 array_pop($array);
 return $array;
}
//$array    = array("1", "2", "3", "4");
//print_r(delete_array_element($array, 2));
 
//汉落塔算法，前提：、适合：
//hanoi参数：(塔高数，柱1，柱2，柱3)
function hanoi($key, $a, $b, $c) {
 
  if(1 == $key) {
   echo "Move sheet {$key} from {$a} to {$c}" . "<br />";
  }else {
   hanoi($key-1, $a, $c, $b);
   echo "Move sheet {$key} from {$a} to {$c}" . "<br />";
   hanoi($key-1, $b, $a, $c);
  }
}
//print_r(hanoi(3, "A", "B", "C" ));
 
//阶乘算法
//factorial参数：(阶乘基数)
function factorial($value) {
 
 if(0 >= ceil($value)) {
  return 0;
 }else {
  
  $sum  = 1;
  while ($value>1) {
   $sum = $sum * $value;
   $value--;
  }
  
  return $sum;
 }
}
//$fact_value   = factorial(5);
//print_r($fact_value);
 
//指定三角形边输出倒三角形
//reverse_triangle参数：(三角形边长)
function reverse_triangle($len) {
 
 if(0 >= ceil($len)) {
  return 'invalid value';
 }else {
  
  $width  = $len;
  $triangle = "";
  
  while ($width>=0) {
   
   $blank = ($len-$width);
   for ($i=0; $i<$blank; $i++) {
    $triangle  .= "&nbsp;";
   }
   
   for ($i=0; $i<=$width; $i++) {
    $triangle  .= "*&nbsp;"; 
   }
   
   $triangle   .= "<br />";
   $width--;
  }
  
  return $triangle;
 }
}
function reverse_triangle2($len) {
 
 if(0 >= ceil($len)) {
  return 'invalid value';
 }else 
 {
  $a   = 0;
  $triangle = "";
  for ($i=$len; $i>0; $i--) {
   $a++;
   $j  = $i*2 - 1;
   for ($k=0; $k<$j; $k++) {
    $triangle  .= "*";
   }
   $triangle   .= "<br />";
   
   for($x=$a; $x>0; $x--) {
    $triangle  .= "&nbsp;";
   }
  }
  
  return $triangle;
 }
}
//$triangle   = reverse_triangle(6);
//$triangle2   = reverse_triangle2(6);
//print_r($triangle);
//print_r($triangle2);
 
 

 
//根据要求输出的长度，匹配预先定义好的字符中的字符组合各种可能进行输出
function gene_dic($n){
//$source='0123456789abcdefghijklmnopqrstuvwxyz';
$source='0123456789';
$len=strlen($source);
$count=1;
for($i=0;$i<$n;$i++){
  $count*=$len;
  $series[]=0;}
for($i=0;$i<$count;$i++){
  $word='';
  $tonext_value=1;//小循环前设好给末位进位
  for($no=$n-1;$no>=0;$no--){ 
    $word=$source{$series[$no]}.$word;
    $series[$no]+=$tonext_value;
    if($no>0){
      if($series[$no]==$len){
          $series[$no]=0;
        $tonext_value=1;
        }else{
        $tonext_value=0;
        } } }
echo "$word ";
}
}
//gene_dic(2);
 
//根据两个矩形的四个点的坐标求出交集四点坐标，还不够完善
//矩形一的四点：a,b,c,d、矩形二四点：e,f,g,k
function rectangle_intersect($a, $b, $c, $d, $e, $f, $g, $h) {
 
 if($e[0]>$b[0] || $g[1]>$b[1]) {
  return "No Intersect."; 
 }else if($e[0]==$b[0]) {
  $i=$j   = $b;
  $k=$l   = $d;
 }else if($g[1]==$b[1]) {
  $i=$k   = $g;
  $j=$l   = $d;
 }else if($e[0]<$b[0] || $g[1]<$b[1]) {
  if(($e[1]-$g[1]) > ($a[1]-$c[1])) {
   $i[0]=$k[0]  = $e[0];
   $i[1]=$j[1]  = $a[1];
   $j[0]=$l[0]  = $b[0];
   if($g[1] < $c[1]) {
    $k[1]=$l[1]  = $c[1];
   }else {
    $k[1]=$l[1]  = $g[1];    
   }
  }else {
   $i[0]=$k[0]  = $e[0];
   $i[1]=$j[1]  = $a[1];
   $j[0]=$l[0]  = $b[0];
   $k[1]=$l[1]  = $g[1];   
  }
 }
 
 return array($i, $j, $k, $l);
}
//以坐标的方式输出
//$res = rectangle_intersect(array(2,5), array(5,5), array(2,3), array(5,3), array(4,7), array(10,7), array(4,4), array(10,4)); //有交集
//$res = rectangle_intersect(array(-2,6), array(2,6), array(-2,4), array(2,4), array(-1,5), array(1,5), array(-1,-3), array(1,-3));
//print_r($res);
 
?>