<?php

class Group implements JsonSerializable{

   public $imagePath;
   public $where;
   public $from;
   public $to;
   public $budget;
   public $memberCount;
   public $groupID;

    public function __construct($imagePath,$where,$from,$to,$budget,$memberCount,$groupID)
    {
        $this->imagePath=$imagePath;
        $this->where=$where;
        $this->from=$from;
        $this->to=$to;
        $this->budget=$budget;
        $this->memberCount=$memberCount;
        $this->groupID=$groupID;
        
    }

    public function jsonSerialize(){
        return ['class'=>'group', 'data'=>[
            'image'=>$this->imagePath,
            'where'=>$this->where,
            'from'=>$this->from,
            'to'=>$this->to,
            'budget'=>$this->budget,
            'members'=>$this->memberCount,
            'groupid'=>$this->groupID
        ]
        ];
    }

}

class MyGroup implements JsonSerializable{

    public $imagePath;
    public $name;
    public $members;
    public $groupID;
 
     public function __construct($imagePath,$name,$memberCount,$groupID)
     {
        $this->imagePath=$imagePath;
        $this->name=$name;
        $this->memberCount=$memberCount;
        $this->groupID=$groupID;
        
     }
 
     public function jsonSerialize(){
         return ['class'=>'mygroup', 'data'=>[
            'image'=>$this->imagePath,
            'name'=>$this->name,
            'members'=>$this->memberCount,
            'groupid'=>$this->groupID
         ]
         ];
     }
 
 }
 class Member implements JsonSerializable{

    public $imagePath;
    public $first;
    public $last;
 
     public function __construct($imagePath,$first,$last)
     {
        $this->imagePath=$imagePath;
        $this->first=$first;
        $this->last=$last;
         
     }
 
     public function jsonSerialize(){
         return ['class'=>'members', 'data'=>[
            'image'=>$this->imagePath,
            'first'=>$this->first,
            'last'=>$this->last
         ]
         ];
     }
 
 }

 class Request implements JsonSerializable{

    public $imagePath;
    public $name;
    public $first;
    public $last;
    public $userid;
    public $groupid;
 
    public function __construct($imagePath,$name,$first,$last,$userid,$groupid)
    {   
        $this->imagePath=$imagePath;
        $this->name=$name;
        $this->first=$first;
        $this->last=$last;
        $this->userid=$userid;
        $this->groupid=$groupid;
         
    }
 
    public function jsonSerialize(){
        return ['class'=>'request', 'data'=>[
            'image'=>$this->imagePath,
            'name'=>$this->name,
            'first'=>$this->first,
            'last'=>$this->last,
            'userid'=>$this->userid,
            'groupid'=>$this->groupid
        ]
        ];
    }
 
 }
 class MyWishes implements JsonSerializable{

    public $imagePath;
    public $where;
    public $from;
    public $to;
    public $budget;
    public $wishid;

    public function __construct($imagePath,$where,$from,$to,$budget,$wishid)
    {
        $this->imagePath=$imagePath;
        $this->where=$where;
        $this->from=$from;
        $this->to=$to;
        $this->budget=$budget;
        $this->wishid=$wishid;
        
        
    }

    public function jsonSerialize(){
        return ['class'=>'wish', 'data'=>[
            'image'=>$this->imagePath,
            'where'=>$this->where,
            'from'=>$this->from,
            'to'=>$this->to,
            'budget'=>$this->budget,
            'wishid'=>$this->wishid
        ]
        ];
    }

 
 }

 class AcceptedArr implements JsonSerializable{

    public $imagePath;
    public $where;
    public $from;
    public $to;
    public $budget;
    public $memberCount;
    public $groupid;
    public $arrid;

    public function __construct($imagePath,$where,$from,$to,$budget,$memberCount,$groupid,$arrid)
    {
        $this->imagePath=$imagePath;
        $this->where=$where;
        $this->from=$from;
        $this->to=$to;
        $this->budget=$budget;
        $this->memberCount=$memberCount;
        $this->groupid=$groupid;
        $this->arrid=$arrid;

        
        
        
    }

    public function jsonSerialize(){
        return ['class'=>'acceptedArr', 'data'=>[
            'image'=>$this->imagePath,
            'where'=>$this->where,
            'from'=>$this->from,
            'to'=>$this->to,
            'budget'=>$this->budget,
            'members'=>$this->memberCount,
            'groupid'=>$this->groupid,
            'arrangementid'=>$this->arrid
        ]
        ];
    }

 
 }

 class Arrangement implements JsonSerializable{

    public $imagePath;
    public $where;
    public $from;
    public $to;
    public $budget;
    public $arrid;

    public function __construct($imagePath,$where,$from,$to,$budget,$arrid)
    {
        $this->imagePath=$imagePath;
        $this->where=$where;
        $this->from=$from;
        $this->to=$to;
        $this->budget=$budget;
        $this->arrid=$arrid;     
    }

    public function jsonSerialize(){
        return ['class'=>'acceptedArr', 'data'=>[
            'image'=>$this->imagePath,
            'where'=>$this->where,
            'from'=>$this->from,
            'to'=>$this->to,
            'budget'=>$this->budget,
            'arrangementid'=>$this->arrid
        ]
        ];
    }

 
 }


 class Paid implements JsonSerializable{

    public $imagePath;
    public $first;
    public $last;
    public $price;
    public $paid;
    public $arrid;
    public $groupid;
    public $userid;

    public function __construct($imagePath,$first,$last,$price,$paid,$arrid,$groupid,$userid)
    {
        $this->imagePath=$imagePath;
        $this->first=$first;
        $this->last=$last;
        $this->price=$price;
        $this->paid=$paid;
        $this->arrid=$arrid;
        $this->groupid=$groupid;     
        $this->usrid=$userid;     

    }

    public function jsonSerialize(){
        return ['class'=>'acceptedArr', 'data'=>[
            'image'=>$this->imagePath,
            'first'=>$this->first,
            'last'=>$this->last,
            'price'=>$this->price,
            'paid'=>$this->paid,
            'arrangementid'=>$this->arrid,
            'userid'=>$this->userid,
            'groupid'=>$this->groupid
        ]
        ];
    }

 
 }

?>