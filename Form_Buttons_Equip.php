<!--без таблиц //--> 
<br><strong>Введите данные для поиска по ключам документов</strong>
<p></p>
  <form name="del" action="Equip_Search.php?FormType=<?php print $FormType;?>" method=post>
   &nbsp&nbspНаименование документа (часть слова)&nbsp&nbsp        
    <input type="text"   name="name" size=10 maxlength=8    value="">
    &nbsp;
    &nbsp&nbsp;Год-Месяц-Дата или Год-месяц, Год &nbsp&nbsp      
    <input type="text"   name="year" size=10 maxlength=10   value="">
    &nbsp;    
    &nbsp&nbsp;Содержание (часть слова)&nbsp&nbsp         
    <input type="text"   name="content" size=10 maxlength=10  value="">
    &nbsp;
    <INPUT TYPE="submit" NAME="SEARCH" VALUE="   Найти    ">    
  </form>        