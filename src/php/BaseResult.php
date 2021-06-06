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

    public function jsonSerialize(){
        return[
            'data'=>$this->result
        ];
    }
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
        
        return DB::getCoordinates($city);
        
    }

    public function processResult(){
        
        $obj=$this->json_obj;
        if(isset($obj['idwish'])){
            $idwish=$obj['idwish'];
            $row=DB::getRows("select * from wish where idwish={$idwish}")[0];
            $ele=['where'=>$row['location'],
                    'from'=>$row['from'],
                    'to'=>$row['to'],
                    'budget'=>$row['budget']    
        ];
        $obj=array_merge($obj,$ele);
        }
        $coor=$this->getCoordinates($obj['where']);
        //$res=Engine::execute(new Wish($coor['long'],$coor['lat'],$obj['where'],$obj['budget'],$obj['from'],$obj['to']));
        $res=Engine::executeGroup(new Group("",$obj['where'],$obj['from'],$obj['to'],$obj['budget'],-1,-1)
        ,$coor['long'],$coor['lat']);

        $this->result=$res;
        //$this->result[]=new Group($obj['imagePath'],$obj['where'],$obj['from'],$obj['to'],$obj['budget'],$obj['members'],$obj['groupId']);
        //$this->result[]=new Group($obj['imagePath'],$obj['where'],$obj['from'],$obj['to'],$obj['budget'],$obj['members'],$obj['groupId']);
        


        return $this->result;
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
        $sql="select * from groups where idleader={$user_id}";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            $memCount=DB::getCountMembers($row['idgroup']);
            $this->result[]=new MyGroup($row['image'],$row['name'],$memCount,$row['idgroup']);
        }
        


        return $this->result;
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
            
            $this->result[]=new Member($row['image'],$row['firstname'],$row['lastname']);
            //$this->result[]=new Member("Elon","Musk");

        }
        


        return $this->result;
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
        //$user_id=$this->user_id; ne misli se na njegov userID nego na ID usera kojeg treba da prihvatimo
        $sql="select * from (SELECT r.idgroup,r.iduser,user.image,user.firstname,user.lastname FROM request as r inner join user on r.iduser=user.iduser where r.idgroup={$group_id})as x inner join groups on x.idgroup=groups.idgroup";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            
            $this->result[]=new Request($row['image'],$row['name'],$row['firstname'],$row['lastname'],$row['iduser'],$row['idgroup']);
            //$this->result[]=new Request("IOTA","Hans","Moog",$user_id,1);

        }
        


        return $this->result;
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
            
            $this->result[]=new MyWishes($row['image'],$row['location'],$row['from'],$row['to'],$row['budget'],$row['idwish']);
            //$this->result[]=new MyWishes('php/images/1620843858relayfinal.png','Belgrade','2021-06-01','2021-07-12',325,1);
        }
        


        return $this->result;
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
        $sql="SELECT aa.idgroup,aa.idarrangement,a.image,a.from,a.to,a.location,a.price FROM accepted_arrangement as aa inner join arrangement as a on aa.idarrangement=a.idarrangement where idgroup={$group_id}";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            $memCount=DB::getCountMembers($group_id);

            $this->result[]=new AcceptedArr($row['image'],$row['location'],$row['from'],$row['to'],$row['price'],$memCount,$group_id,$row['idarrangement']);
            //$this->result[]=new MyWishes('php/images/1620843858relayfinal.png','Belgrade','2021-06-01','2021-07-12',325,1);
        }
        


        return $this->result;
    }


}

class ArrangementResult extends BaseResult{

    public function __construct($json_obj){
        parent::__construct($json_obj);
    }

    

    public function processResult(){
        
        $obj=$this->json_obj;
                
        $sql="SELECT * FROM arrangement";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            
            $this->result[]=new Arrangement($row['image'],$row['location'],$row['from'],$row['to'],$row['price'],$row['idarrangement']);
            //$this->result[]=new MyWishes('php/images/1620843858relayfinal.png','Belgrade','2021-06-01','2021-07-12',325,1);
        }
        


        return $this->result;
    }

    

}

class PaidResult extends BaseResult{

    public function __construct($json_obj){
        parent::__construct($json_obj);
    }

    //this will process all members who have paid
    private function processPaid($obj){
        $group_id=$obj['groupId'];     
        $arr_id=$obj['arrangementId'];   
        $sql="Select z.idgroup,z.iduser,z.image,z.firstname,z.lastname,z.idarrangement,z.price,p.amount 
        from (select y.idgroup,y.iduser,y.image,y.firstname,y.lastname,y.idarrangement,a.price 
        from (SELECT  x.idgroup,x.iduser,x.image,x.firstname,x.lastname,aa.idarrangement 
        from 
        (select m.idgroup,m.iduser,u.image,u.firstname,u.lastname 
        from member as m inner join user as u on m.iduser=u.iduser where m.idgroup={$group_id}) as x 
        inner join accepted_arrangement as aa on x.idgroup=aa.idgroup where aa.idarrangement={$arr_id} ) as y INNER join arrangement a on y.idarrangement=a.idarrangement) as z left join paid as p on z.idgroup=p.idgroup AND
        z.iduser=p.iduser and z.idarrangement=p.idarrangement";
        $rows=DB::getRows($sql);
        foreach($rows as $row){
            $paid=$row['amount'];
            if($paid==null)$paid=0;
            $this->result[]=new Paid($row['image'],$row['firstname'],$row['lastname'],$row['price'],$paid,$row['idarrangement'],
        $row['idgroup'],$row['iduser']);
            //$this->result[]=new MyWishes('php/images/1620843858relayfinal.png','Belgrade','2021-06-01','2021-07-12',325,1);
        }
    }

    public function processResult(){
        
        $obj=$this->json_obj;
        $this->processPaid($obj);
        


        return $this->result;
    }

    

}

?>