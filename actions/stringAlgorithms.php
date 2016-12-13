<?php
	
	function pre_kmp($pattern, $prefix){
		$m=strlen($pattern);
		$prefix[0]=-1;
		$k=-1;
		for ($q=1; $q<$m; $q++) {
			while ($k>-1 && $pattern[$k+1]!=$pattern[$q])
				$k = $prefix[$k];
			if ($pattern[$k+1]==$pattern[$q]) $k=$k+1;
			$prefix[$q]=$k;
		}
		return $prefix;
	}
	
	function kmp_function($pattern, $text){
		if($text == "" || $pattern == "") return 0;
		$num=0;
		$m=strlen($pattern);
		$prefix = array();
		$prefix = pre_kmp($pattern, $prefix);

		$n=strlen($text);

		$q=-1;
		for ($i=0; $i<$n; $i++) {
			while ($q>-1 && $pattern[$q+1]!=$text[$i])
				$q=$prefix[$q];
			if ($pattern[$q+1]==$text[$i])
				$q++;
			if ($q==$m-1) {
				$num++;
				$q=$prefix[$q];
			}
		}
		return $num;
	}
	
	function distance($pattern, $text){
		if($text == "") return 0;
		$n=strlen($text);
		$d= array();
		$old = 0;
		$neww = 0;
		for ($j=0; $j<=$n; $j++)
			$d[$j]=$j;
		$m=strlen($pattern);
		for ($i=1; $i<=$m; $i++) {
			$old = $d[0];
			$d[0]=$i;
			for ($j=1; $j<=$n; $j++) {
				if ($pattern[$i-1]==$text[$j-1]) $neww = $old;
				else {
					$neww = min($old,$d[$j]);
					$neww = min($neww,$d[$j-1]);
					if($pattern[$i-1]==strtoupper($text[$j-1]) || $text[$j-1]==strtoupper($pattern[$i-1])) $neww = $neww ;
					else $neww = $neww + 1;
				}
				$old = $d[$j];
				$d[$j] = $neww;
			}
		}
		
		return $d[$n];
	}

?>