<?php
 
include ('codebase/connector/gantt_connector.php');
 
$res=mysql_connect("oniddb.cws.oregonstate.edu","onealja-db","hV2BZQqWqsdJcz97");
mysql_select_db("onealja-db");
 
$gantt = new JSONGanttConnector($res);
$gantt->render_links("gantt_links","id","source,target,type");
$gantt->render_table(
    "gantt_tasks",
    "id",
    "start_date,duration,text,progress,sortorder,parent"
);
?>