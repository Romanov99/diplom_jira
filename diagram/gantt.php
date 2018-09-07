<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<link rel="stylesheet" type="text/css" href="jsgantt.css"/>
<script language="javascript" src="jsgantt.js"></script>
<script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/graphicsjs/1.3.3/graphics.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">


	<meta charset="utf-8">
	<title>RVProger управление проектами</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main_page.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/form.css" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/gantt.css" charset="utf-8">
	<meta name="description" content="управление проектами ">
	<meta name="keywords" content="управление проектами,Scrum доска ">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="css/fontawesome.min.css">
	 <script src="codebase/dhtmlxgantt.js"></script>   
   <link href="codebase/dhtmlxgantt.css" rel="stylesheet">
	
</head>
<body>
	<div id="wrapper">
		<div id="content">
			<header>
				<div id="logo"> 
					<a href="index.php" title="На главную">
						<img src="img/logo.png" title="RVProger" alt="RVProger">
						<span>RVProger</span>
					</a>
				</div>
				<div id="about">
					<a href="project.php" title="Проекты">Проекты</a>
					<a href="" title="Scrum доска">Scrum доска</a>
					<a href="otjot.php" title="Отчеты">Отчеты</a>
					<a href="otjot.php" title="Отчеты">Диаграмма Ганта</a>
				</div>
				
				<!--Понадобится пойже в регистрации -->
				<div id="reg_auth">
					
					<a href="" title="Войти в кабинет пользователя">
						<div class="btn">
							Войти
						</div>
					</a>
					<a href="" title="Зарегистрироваться на сайте ">
						<div class="btn">
							Регистрация
						</div>
					</a>
					<a href="index.php" title="Создать проект">
						<div class="btn">
							Создать проект
						</div>
					</a>
				</div>
			</header>

			<nav>
				<div id="main">
			 		<h2 class="heading">Диаграмма Ганта </h2>
			 		<div style="clear: both"><br></div>
			 		 	 <style type="text/css">
<!--
.style1 {color: #0000FF}

.roundedCorner{display:block}
.roundedCorner *{
  display:block;
  height:1px;
  overflow:hidden;
  font-size:.01em;
  background:#0061ce}
.roundedCorner1{
  margin-left:3px;
  margin-right:3px;
  padding-left:1px;
  padding-right:1px;
  border-left:1px solid #91bbe9;
  border-right:1px solid #91bbe9;
  background:#3f88da}
.roundedCorner2{
  margin-left:1px;
  margin-right:1px;
  padding-right:1px;
  padding-left:1px;
  border-left:1px solid #e5effa;
  border-right:1px solid #e5effa;
  background:#307fd7}
.roundedCorner3{
  margin-left:1px;
  margin-right:1px;
  border-left:1px solid #307fd7;
  border-right:1px solid #307fd7;}
.roundedCorner4{
  border-left:1px solid #91bbe9;
  border-right:1px solid #91bbe9}
.roundedCorner5{
  border-left:1px solid #3f88da;
  border-right:1px solid #3f88da}
.roundedCornerfg{
  background:#0061ce;}


-->
</style>


<div style="position:relative" class="gantt" id="GanttChartDIV"></div>
<br><br>
<button id="new_row">Add New ROW</button>



<div id="dil1" style="text-align:center">
  <h2>Create new row</h2>
    <input type="" name="" id="row_name" placeholder="Name"><br><br>
    <input type="" name="" id="row_res" placeholder="Resource"><br><br>
    <input type="" name="" id="row_data_start" placeholder="data_start "><br><br>
    <input type="" name="" id="row_data_end"  placeholder="data_end"><br><br>
    <input type="color" name="" id="row_color" placeholder="color"><br><br>
    <input type="" name="" id="row_proc" placeholder="procent"  ><br><br>
    <input type="" name="" id="row_parent" placeholder="parent(0 or 1) "><br><br>
    <input type="" name="" id="row_id_parent" placeholder="index parent"><br><br>

    <button id='add_row'>Add</button>

</div>

<div id="dil2">


<button id="ch_row">Change</button>
<button id="del_row">Delete</button>
  



</div>


<div id="delete_row">
    <h2>Delete?</h2>
    <button id="yes_delete">Yes</button>
    <button id="no_delete">No</button>
</div>



<div id="chane_row">
  <h2>Change this row</h2>
    <input type="" name="" id="row_name_ch" placeholder="Name"><br><br>
    <input type="" name="" id="row_res_ch" placeholder="Resource"><br><br>
    <input type="" name="" id="row_data_start_ch" placeholder="data_start "><br><br>
    <input type="" name="" id="row_data_end_ch"  placeholder="data_end"><br><br>
    <input type="color" name="" id="row_color_ch" placeholder="color"><br><br>
    <input type="" name="" id="row_proc_ch" placeholder="procent"  ><br><br>
    <input type="" name="" id="row_parent_ch" placeholder="parent(0 or 1) "><br><br>
    <input type="" name="" id="row_id_parent_ch" placeholder="index parent"><br><br>

    <button id='refactor_row'>Change</button>
</div>



<script type="text/javascript">
  
  $("#ch_row").click(function(){
      $("#chane_row").dialog("open");
      $("#dil2").dialog("close");
      $("#del_row").dialog("close");
      $("#dil1").dialog("close");
  });
  $("#del_row").click(function(){
    $("#delete_row").dialog("open");
      $("#dil2").dialog("close");
      $("#dil1").dialog("close");
      $("#chane_row").dialog("close");
  });

  $("#no_delete").click(function(){
      $("#delete_row").dialog("close");
  });
</script>



<script>

  var g = new JSGantt.GanttChart('g',document.getElementById('GanttChartDIV'), 'day');

	g.setShowRes(1); // Show/Hide Responsible (0/1)
	g.setShowDur(1); // Show/Hide Duration (0/1)
	g.setShowComp(1); // Show/Hide % Complete(0/1)
   g.setCaptionType('Resource');  // Set to Show Caption (None,Caption,Resource,Duration,Complete)



</script>


<script type="text/javascript">
  
  $("#dil1").dialog({
        autoOpen: false,
        show: {
            effect: 'drop',
            duration: 500
        },
        hide: {
            effect: 'clip',
            duration: 500
        },
        width: 300
    });


$("#dil2").dialog({
        autoOpen: false,
        show: {
            effect: 'drop',
            duration: 500
        },
        hide: {
            effect: 'clip',
            duration: 500
        },
        width: 300
    });

$("#chane_row").dialog({
        autoOpen: false,
        show: {
            effect: 'drop',
            duration: 500
        },
        hide: {
            effect: 'clip',
            duration: 500
        },
        width: 300
    });


$("#delete_row").dialog({
        autoOpen: false,
        show: {
            effect: 'drop',
            duration: 500
        },
        hide: {
            effect: 'clip',
            duration: 500
        },
        width: 300
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){

      $.post(
          "php/work_db.php",
          {
            wanna_row:"1"
          },
          function(data){
            obj = JSON.parse(data);
            for(i=0; i<obj.length; i++){

              g.AddTaskItem(new JSGantt.TaskItem(obj[i][0], obj[i][1],  obj[i][3],  obj[i][4], obj[i][5], "", 0, obj[i][2], obj[i][6], 0,  obj[i][7], obj[i][8]));

              //g.AddTaskItem(new JSGantt.TaskItem(obj[i][0], obj[i][1],  obj[i][3],  obj[i][4], "#ff0000", "", 0, obj[i][2], obj[i][6], 0,  obj[i][7], obj[i][8]));
            }

            g.Draw();g.DrawDependencies();
          }
          
      );

      
    
  });



      $("#new_row").click(function(){

        $("#dil1").dialog("open");
      });

      $("#add_row").click(function(){
          color_row ="";
          temp = $("#row_color").val();
          str = temp.split('');
          for(i=1;i<str.length;i++){
              color_row += str[i]; // get id colum
          }


        $.post(
          "php/work_db.php",
          {
            name: $("#row_name").val(),
            data_start:$("#row_data_start").val(),
            data_end:$("#row_data_end").val(),
            color:color_row,
            proc:$("#row_proc").val(),
            parent:$("#row_parent").val(),
            id_parent:$("#row_id_parent").val(),
            res:$("#row_res").val()
          },
          function(data){
               if(data == "1"){
                      alert("Successfully");
                  }
                  else{
                    alert("Error...");
                  }

                  $("#dil1").dialog("close");
                  location.reload();

         
          }
      );
      });


      $(document).on('dblclick','.table_test .col', function(){
        id_tr = "";
        temp = this.id;
        str = temp.split('');
          for(i=6;i<str.length;i++){
              id_tr += str[i]; // get id colum
          }

          if( id_tr != ""){

              $.post(
                "php/work_db.php",
                {
                  wanna_refactor_id: id_tr
                },
                function(data){

                    obj = JSON.parse(data);

                    $("#row_name_ch").val(obj[1]);
                    $("#row_data_start_ch").val(obj[3]);
                    $("#row_data_end_ch").val(obj[4]);
                    $("#row_color_ch").val("#"+obj[5]);
                    $("#row_proc_ch").val(obj[6]);
                    $("#row_parent_ch").val(obj[7]);
                    $("#row_id_parent_ch").val(obj[8]);
                    $("#row_res_ch").val(obj[2]);

                    $("#dil2").dialog("open");
                }
            );
          }
      });


      $("#refactor_row").click(function(){

        color_row ="";
          temp = $("#row_color").val();
          str = temp.split('');
          for(i=1;i<str.length;i++){
              color_row += str[i]; // get id colum
          }
          
          $.post(
              "php/work_db.php",
              {
                id_ch:id_tr,
                name_ch: $("#row_name_ch").val(),
                data_start_ch:$("#row_data_start_ch").val(),
                data_end_ch:$("#row_data_end_ch").val(),
                color_ch:color_row,
                proc_ch:$("#row_proc_ch").val(),
                parent_ch:$("#row_parent_ch").val(),
                id_parent_ch:$("#row_id_parent_ch").val(),
                res_ch:$("#row_res_ch").val()
              },
              function(data){
                  if(data == "1"){
                      alert("Successfully");
                  }
                  else{
                    alert("Error...");
                  }
                  $("#dil2").dialog("close");
                  location.reload();

              }

            );
      });


      $("#yes_delete").click(function(){
        if(id_tr!=""){
          $.post(
            "php/work_db.php",
            {
              wanna_delete_row: id_tr
            },
            function(data){
              if(data == "1"){
                      alert("Successfully");
                  }
                  else{
                    alert("Error...");
                  }
                  $("#delete_row").dialog("close");
                  location.reload();

            }

          );

        }
      });






    
</script>






				</div>				
			</nav>
				
		</div>


		<footer>
			<div id="site_name">
				<span>RVProger</span>
			</div>
			<div id='clear'></div>
			<div id="footer_menu">
				<a href="" title="Поддержать проект ">Поддержка</a>
				<a href="" title="Написать письмо">Обратная связь</a>
			</div>
			<div id="rights">
				<a href="">Все права защищены &copy; <?=date ('Y')?></a>
			</div>
			

		</footer>
	</div>
</body>
</html>