<?php
echo rand() ;
// echo rand() . "\n";
// --Lấy 2 1 số ngẫu nhiên trong khoảng 5-> 15
echo rand(1, 9);
?>


<?php
function rand_string( $length ) {
       $chars ="0123456789";
       $size = strlen( $chars );
       for( $i = 0; $i < $length; $i++ ) {
             $str .= $chars[ rand( 0, $size - 1 ) ];
        }
       return $str;
}
echo 
$my_string = rand_string( 6 );

?>