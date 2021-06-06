<?php
session_start();
require_once "../DB.php";

$user_id=$_SESSION['unique_id'];

class groupd_info implements JsonSerializable{
    private $id;
    private $name;
    public function __construct($name,$id)
    {
        $this->id=$id;
        $this->name=$name;
    }
    public function jsonSerialize(){
        return[
            'name'=>$this->name,
            'id'=>$this->id
        ];
    }
}

$sql="Select * from groups where idleader={$user_id}";
$rows=DB::getRows($sql);
if(count($rows)==0){
    header("HTTP/1.1 204 NO CONTENT"); //niste leader ni u 1 grupi
    return;
}
$groups=[];
for($i=0;$i<count($rows);$i++){
    $groups[]=new groupd_info($rows[$i]['name'],$rows[$i]['idgroup']);
}
echo json_encode($groups);
?>