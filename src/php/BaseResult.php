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


class MyGroupResult extends BaseResult{

    private $user_id;
    public function __construct($json_obj,$user_id){
        parent::__construct($json_obj);
        $this->user_id=$user_id;
    }

    

    public function processResult(){
        
        $obj=$this->json_obj;
        $user_id=$this->user_id;
        $sql="select * from meetandtravel.group where idleader={$user_id}";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            $memCount=DB::getCountMembers($row['idgroup']);
            $this->result[]=new MyGroup($row['name'],$memCount,$row['idgroup']);
        }
        


        return $this->result;
    }

    public function jsonSerialize(){
        return[
            'data'=>$this->result
        ];
    }

}

class MembersResult extends BaseResult{

    public function __construct($json_obj){
        parent::__construct($json_obj);
        
    }

    

    public function processResult(){
        
        $obj=$this->json_obj;
        $group_id=$obj['groupId'];
        $sql="SELECT * FROM member inner join user on member.iduser=user.iduser where member.idgroup={$group_id}";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            
            //$this->result[]=new Member($row['first'],$row['last']);
            $this->result[]=new Member("Elon","Musk");

        }
        


        return $this->result;
    }

    public function jsonSerialize(){
        return[
            'data'=>$this->result
        ];
    }

}

class RequestResult extends BaseResult{
    private $user_id;
    public function __construct($json_obj,$user_id){
        parent::__construct($json_obj);
        $this->user_id=$user_id;
    }

    

    public function processResult(){
        
        $obj=$this->json_obj;
        $group_id=$obj['groupId'];
        $user_id=$this->user_id;
        $sql="SELECT * FROM request inner join user on request.iduser=user.iduser where request.idgroup={$group_id}";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            
            //$this->result[]=new Request($row['name'],$row['first'],$row['last'],$user_id,$row['idgroup']);
            $this->result[]=new Request("IOTA","Hans","Moog",$user_id,1);

        }
        


        return $this->result;
    }

    public function jsonSerialize(){
        return[
            'data'=>$this->result
        ];
    }

}

class WishResult extends BaseResult{
    private $user_id;
    public function __construct($json_obj,$user_id){
        parent::__construct($json_obj);
        $this->user_id=$user_id;
    }

    

    public function processResult(){
        
        $obj=$this->json_obj;
        $user_id=$this->user_id;
        $sql="SELECT * FROM wish where iduser={$user_id}";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            
            // $this->result[]=new MyWishes($row['image'],$row['location'],$row['from'],$row['to'],$row['budget'],$row['idwish']);
            $this->result[]=new MyWishes('php/images/1620843858relayfinal.png','Belgrade','2021-06-01','2021-07-12',325,1);
        }
        


        return $this->result;
    }

    public function jsonSerialize(){
        return[
            'data'=>$this->result
        ];
    }

}

class AccepterArrResult extends BaseResult{
    private $user_id;
    public function __construct($json_obj,$user_id){
        parent::__construct($json_obj);
        $this->user_id=$user_id;
    }

    

    public function processResult(){
        
        $obj=$this->json_obj;
        $user_id=$this->user_id;
        $group_id=$obj['groupId'];
        $sql="SELECT * FROM accepted_arrangment where idgroup={$group_id}";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            //za svaki idArr -> wish
            $arrid=$row['idarrangment'];
            $sql2="select * from wish inner join arrangment on wish.idwish=arrangment.idwish where arrangment.idarrangment={$arrid}";
            $wish=DB::getRows($sql2)[0];
            $memCount=0; //getMemCount!!!!!!!!!!!
            $this->result[]=new AcceptedArr($row['image'],$row['location'],$row['from'],$row['to'],$row['budget'],$memCount,$group_id,$arrid);
            //$this->result[]=new MyWishes('php/images/1620843858relayfinal.png','Belgrade','2021-06-01','2021-07-12',325,1);
        }
        


        return $this->result;
    }

    public function jsonSerialize(){
        return[
            'data'=>$this->result
        ];
    }

}
?>