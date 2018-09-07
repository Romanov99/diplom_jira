<!--без таблиц 
<br><strong>Введите данные для поиска по ключам.&nbsp;</strong>//--> 
<p></p>  
<form name="del" action="Staff_Search.php" method=post>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Навыки&nbsp;&nbsp;        
    <input type="text" name="skils" size=10 maxlength=20   value="html">
    &nbsp;
    &nbsp&nbsp;Год начала работы  &nbsp&nbsp         
    <input type="text" name="staj"  size=10 maxlength=20   value="2018">
    &nbsp;
    &nbsp&nbsp;Сертификат&nbsp&nbsp        
    <input type="text" name="sert"  size=10 maxlength=20   value="ОНПУ">
    &nbsp&nbsp;Сертификат&nbsp&nbsp        
    <input type="hidden"   name="Proj_Id"   value="<?=$Proj_Id?>">
    <input type="hidden"   name="Proj_Nm"   value="<?=$Proj_Nm?>">
    <INPUT TYPE="submit" NAME="SEARCH" VALUE="   Найти    ">
    &nbsp;
  </form>        