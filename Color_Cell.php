<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=windows-1251">
<style>
body          {background: silver}
#myTBL td     {background: white; color: black}
#myTBL td.act {background: black; color: white}
</style>
<script>
function myFunc (e)                               // в одних браузерах при клике сгенерируется объект event и передастся функции как аргумент e, в других - не передастся
{
var evt = window.event || e,                      // где event не передался, пользуем window.event
    obj = evt.srcElement || evt.target;           // получаем тег, по которому кликнули - синтаксис для двух групп браузеров
if (obj.tagName == 'TABLE') return;               // кликнули по бордеру или по межячеечному пространству, т.е. не точно по ячейке 
while (obj.tagName != 'TD') obj = obj.parentNode; // в ячейке могут быть внутренние теги (см. b22) - вверх по иерархии доходим от них до тега TD
obj.className = obj.className ? '' : 'act';       // если фон был белым, станет чёрным, и - наоборот
}
 
// только ПОСЛЕ окончания загрузки браузер будет знать о существовании тега с id="myTBL"
// и только ТОГДА мы можем дать браузеру команду назначить функцию обработки события клика по этому тегу
onload = function ()
{
var trg = document.getElementById ('myTBL');
if (document.addEventListener) trg.addEventListener ('click', myFunc); // синтаксис назначения функции для одних браузеров
else if (document.attachEvent) trg.attachEvent ('onclick', myFunc);    // для других
else trg.onclick = myFunc;                                             // для третьих
}
</script>
</head>
<body>
<table id="myTBL" cellpadding="5" cellspacing="10" border="1">
<tr><td>b00</td><td>b01</td><td>b02</td></tr>
<tr><td>b10</td><td>b11</td><td>b12</td></tr>
<tr><td>b20</td><td>b21</td><td><span><b>b<i>2<u>2</u></i></b></span></td></tr>
</table>
</body>
</html>