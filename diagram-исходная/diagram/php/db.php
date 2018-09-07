<?php 
require_once("rb.php");

class Datebase
{
	private $host = "localhost";
	private $dbname = "diagram_gantt";
	private $admin = "root";
	private $pass = "";

    function __construct(){
        if(! R::testConnection()){
            R::setup('mysql:host=localhost; dbname=diagram_gantt; charset=utf8', "root", "");
        }
        if(! R::testConnection()){
            exit("Подключение к базе не установлено!");
        }
    }

//$link при нажатии переход по ссілке
    public function AddRow($name,$start,$end,$color,$comp,$group,$parent,$res){
    	try{
    		$row = R::dispense("links");
	    	$row->name = $name;
            $row->res = $res;
	    	$row->start = $start;
	    	$row->end = $end;
	    	$row->color = $color;
	    	$row->comp = $comp;
	    	$row->group = $group;
	    	$row->parent = $parent;

	    	R::store($row);
	    	return true;
    	}
    	catch(Exception $e){
    		return $e;
    	}
    	R::close();
    }

    public function getAllRows(){
    	$arr_tmp = array();
        $arr_reliz = array();
    	$row = R::findAll("links");
    	foreach ($row as $item) {
            $date1 = new DateTime($item['start']);
            $tmp_date1 =  $date1->format('m/d/Y');
            $date2 = new DateTime($item['end']);
            $tmp_date2 =  $date2->format('m/d/Y');
    		array_push($arr_tmp, array($item['id'],$item['name'],$item['res'],$tmp_date1,$tmp_date2, $item['color'],$item['comp'],$item['group'],$item['parent']));
            
    	}
    	return $arr_tmp;
    }

    public function getInfoRow($id){
        $arr_tmp=array();

        $row = R::find("links","id=$id");
        foreach ($row as $item) {
            array_push($arr_tmp, $item['id'],$item['name'],$item['res'],$item['start'],$item['end'], $item['color'],$item['comp'],$item['group'],$item['parent']);
        }
        return $arr_tmp;
    }

    public function ChangeRow($name,$start,$end,$color,$comp,$group,$parent,$res,$id){
        try{
            $row = R::load("links",$id);
            $row->name = $name;
            $row->res = $res;
            $row->start = $start;
            $row->end = $end;
            $row->color = $color;
            $row->comp = $comp;
            $row->group = $group;
            $row->parent = $parent;

            R::store($row);
            return true;
        }
        catch(Exception $e){
            return $e;
        }
        R::close();
    }

    public function DeleteRow($id){
        try{
            $row = R::load("links",$id);
            R::trash($row);
            return true;
        }
        catch(Exception $e){
            return $e;
        }
        R::close();
    }

}


 ?>