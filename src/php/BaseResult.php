<?php
require_once("../DB.php");
require_once("SpecificResults.php");
require_once("../Engine.php");
abstract class BaseResult implements JsonSerializable{

    
    //$json_obj contains the JSON data received with the POST method which contains all the required data to execute the result
    protected $json_obj;

    //array of Derived class objects after processResult()
    protected $result;
    public function __construct($json_obj)
    {
        $this->json_obj=$json_obj;
        $this->result=[];
    }

    //process the Result polymorphically and return the array of derived class objects
    abstract function processResult();

    abstract function jsonSerialize();
}

class GroupResult extends BaseResult{

    //NE moram da definisem constructor sam ce pozvati constructor base class kada uradim new GroupResult(obj);

    /*
    this is the php representation as an array
    JSON_OBJ[
        type - group // so we know that this object is ment for group
        'where'=>
        from
        to
        budget
    ]
    */

    public function __construct($json_obj){
        parent::__construct($json_obj);
    }

    private function getCoordinates($city){
        $sql="Select * from city where city='{$city}'";
        $rows=DB::getRows($sql);
        return ['lat'=>$rows[0][2],'long'=>$rows[0][3]];
        
    }

    public function processResult(){
        
        $obj=$this->json_obj;
        $coor=$this->getCoordinates($obj['where']);
        //$res=Engine::execute(new Wish($coor['long'],$coor['lat'],$obj['where'],$obj['budget'],$obj['from'],$obj['to']));
        $res=Engine::executeGroup(new Group($obj['imagePath'],$obj['where'],$obj['from'],$obj['to'],$obj['budget'],$obj['members'],$obj['groupId'])
        ,$coor['long'],$coor['lat']);

        $this->result=$res;
        //$this->result[]=new Group($obj['imagePath'],$obj['where'],$obj['from'],$obj['to'],$obj['budget'],$obj['members'],$obj['groupId']);
        //$this->result[]=new Group($obj['imagePath'],$obj['where'],$obj['from'],$obj['to'],$obj['budget'],$obj['members'],$obj['groupId']);
        


        return $this->result;
    }

    public function jsonSerialize(){
        return[
            'data'=>$this->result
        ];
    }

}


?>