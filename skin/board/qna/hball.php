<?php
include_once("../../../common.php");
$table = 'g5_write_'.$bo_table;
sql_query("update $table set wr_7 = 'admin'"); 
goto_url(G5_URL."/bbs/board.php?bo_table=".$bo_table. $qstr); 
?>
