<!--без таблиц //-->
<?php
if ($msq!='')
print "<p></p><strong><font color='Red'>$msq</font></strong><p></p>";
?>
<!--### ПОИСК ПО СОВОКУПНОСТИ НАВЫКОВ ###//-->

<BR> 
<table>
<tr>
<form name="SEARCH1" action="Staff_Search_Mod.php" method=post>
<td> 
   НАВЫКИ&nbsp;&nbsp; 
</td> 
<td>      
    <input type="text"   name="skills1" size=10 maxlength=10  value="">
</td>
<td>
    &nbsp; И &nbsp;
</td>
<td>         
    <input type="text"   name="skills2" size=10 maxlength=10  value="">
</td>
<td>
    &nbsp; И &nbsp;
</td>
<td>      
    <input type="text"   name="skills3" size=10 maxlength=10  value="">
</td>
<td>
    &nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" NAME="SEARCH1" VALUE="   Найти    ">
</td>
</tr>
</form> 
<!--без таблиц 
<br><strong>Введите данные для поиска по ключам.&nbsp;</strong>
### ПОИСК АЛЬТЕРНАТИВНЫХ НАВЫКОВ ####
//--> 
<TR></TR>
<TR></TR>
<TR></TR>
<tr>
<form name="SEARCH2" action="Staff_Search_Mod.php" method=post>
<td> 
   НАВЫКИ&nbsp;&nbsp; 
</td> 
<td>      
    <input type="text"   name="skills1" size=10 maxlength=10  value="">
</td>
<td>
    &nbsp; ИЛИ &nbsp;
</td>
<td>         
    <input type="text"   name="skills2" size=10 maxlength=10  value="">
</td>
<td>
    &nbsp; ИЛИ &nbsp;
</td>
<td>      
    <input type="text"   name="skills3" size=10 maxlength=10  value="">
</td>
<td>
    &nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" NAME="SEARCH2" VALUE="   Найти    ">
</td>
</tr>
</table> 
</form> 
