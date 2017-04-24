<?php include("_header.php"); 
	  include("_sidebar_header.php");?>
<!doctype html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" content="height=device-height, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<script type="text/javascript" src="../js/script.js"></script>
	<script src="../codebase/dhtmlxgantt.js"></script>   
	<link href="../codebase/dhtmlxgantt.css" rel="stylesheet">
	<title> Display Project</title>
</head>

<body>
<?php 
if(isset($_SESSION["uid"]) && !empty($_SESSION["uid"])){
	if(isset($_GET["p"]) && !empty($_GET["p"])){
		$id = $_GET["p"];
		$_SESSION["pid"] = $id;
		
	}
	else
		echo "No user selected from employee records page.";
}
else{
echo "Please sign in to access this page";
sleep(1);
header("Location: landing.php");
exit();
}
?>

    <input type="radio" id="scale1" name="scale" value="1" checked /><label for="scale1">Day scale</label>
    <input type="radio" id="scale2" name="scale" value="2" /><label for="scale2">Week scale</label>
    <input type="radio" id="scale3" name="scale" value="3" /><label for="scale3">Month scale</label>
    <input type="radio" id="scale4" name="scale" value="4" /><label for="scale4">Year scale</label><br>

    <div id="gantt_here" style='width:100%; height:50%;'></div>

    <script type="text/javascript">
	function setScaleConfig(value){
		switch (value) {
			case "1":
				gantt.config.scale_unit = "day";
				gantt.config.step = 1;
				gantt.config.date_scale = "%d";
				gantt.config.subscales = [
					{unit:"day", step:1, date:"%D" }
				];
				gantt.config.scale_height = 50;
				gantt.templates.date_scale = null;
				break;
			case "2":
				var weekScaleTemplate = function(date){
					var dateToStr = gantt.date.date_to_str("%d");
					var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
					return dateToStr(date) + " - " + dateToStr(endDate);
				};

				gantt.config.scale_unit = "week";
				gantt.config.step = 1;
				gantt.config.subscales = [
					{unit:"month", step:1, date:"%M" }
				];
				gantt.templates.date_scale = weekScaleTemplate;
				gantt.config.scale_height = 50;
				break;
			case "3":
				gantt.config.scale_unit = "month";
				//gantt.config.step = 1;
				gantt.config.date_scale = "%F '%y";
				gantt.config.scale_height = 25;
				gantt.config.subscales = [];
				gantt.templates.date_scale = null;
				break;
			case "4":
				gantt.config.scale_unit = "year";
				gantt.config.step = 1;
				gantt.config.date_scale = "%Y";
				gantt.config.min_column_width = 50;
				gantt.config.subscales = [];
				gantt.config.scale_height = 25;
				gantt.templates.date_scale = null;
				break;
		}
	}

	setScaleConfig('4');

	gantt.config.xml_date = "%Y-%m-%d %H:%i";

	gantt.config.columns=[
    	{name:"text",       label:"Task name",  tree:true, width:'*' },
    	{name:"start_date", label:"Start time", align: "center" },
    	{name:"duration",   label:"Duration",   align: "center" }
    	//{name:"add",        label:"" }
	];

	gantt.init("gantt_here");	
	gantt.load('data.php');//loads data to Gantt from the database

	var dp=new gantt.dataProcessor("data.php");  
	dp.init(gantt);

	var func = function(e) {
		e = e || window.event;
		var el = e.target || e.srcElement;
		var value = el.value;
		setScaleConfig(value);
		gantt.render();
	};

	var els = document.getElementsByName("scale");
	for (var i = 0; i < els.length; i++) {
		els[i].onclick = func;
	}
    </script>


<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Tasks</h3>
            </div>
            <div class="panel-body">
              <div class="row">     
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table">
				  <thead class="thead-inverse">
					<tr>
					  <th>Task Type</th>
					  <th>Task Name</th>
					</tr>
				  </thead>
				 <tbody>
				  <?php if($result = $db->query("select * from task where project_id = '$id'")){
							while($obj = $result->fetch_object()){ 
								$task_type_id = htmlspecialchars($obj->task_type_id);
								$task_name = htmlspecialchars($obj->name);
								$url = "display_task.php?t=" . htmlspecialchars($obj->task_id);
								if($result2 = $db->query("select * from task_type WHERE task_type_id = '$task_type_id'")){
									while($obj2 = $result2->fetch_object()){ 
										$task_type_name = htmlspecialchars($obj2->name);
									}
								}
							?>
				  
					<tr>
					  <th scope="row"><a href="<?php echo $url; ?>" style="display : block; color:black" ><?php echo $task_type_name; ?></a></th>
					  <td><a href="<?php echo $url; ?>" style="display : block; color:black"></a><a href="<?php echo $url; ?>" style="display : block; color:black" ><?php echo $task_name; ?></a></td>
					</tr>
				  <?php }} ?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <!--<div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>-->
            
          </div>
        </div>
      </div>
    </div>
<?php include("_sidebar_footer.php"); ?>
</body>	
</html>
