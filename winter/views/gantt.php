<?php include("_header.php");
	include("_sidebar_header.php");?>

<!DOCTYPE html>
<html>
<head>
   <title>Gantt</title>
   <script src="../codebase/dhtmlxgantt.js"></script>   
   <link href="../codebase/dhtmlxgantt.css" rel="stylesheet">
    <style type="text/css">
	html, body{ height:100%; padding:0px; margin:0px; overflow: hidden;}
    </style>

</head>
 
<body>
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
				gantt.config.scale_height = 50;
				gantt.templates.date_scale = null;
				break;
			case "4":
				gantt.config.scale_unit = "year";
				gantt.config.step = 1;
				gantt.config.date_scale = "%Y";
				gantt.config.min_column_width = 50;

				gantt.config.scale_height = 50;
				gantt.templates.date_scale = null;
				break;
		}
	}

	setScaleConfig('4');

	gantt.config.xml_date = "%Y-%m-%d %H:%i";

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
</body>
</html>
<?php include("_sidebar_footer.php");?>