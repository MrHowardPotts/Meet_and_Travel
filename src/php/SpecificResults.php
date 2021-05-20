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

    public $name;
    public $members;
    public $groupID;
 
     public function __construct($name,$memberCount,$groupID)
     {
         $this->name=$name;
         $this->memberCount=$memberCount;
         $this->groupID=$groupID;
         
     }
 
     public function jsonSerialize(){
         return ['class'=>'mygroup', 'data'=>[
             'name'=>$this->name,
             'members'=>$this->memberCount,
             'groupid'=>$this->groupID
         ]
         ];
     }
 
 }
 class Member implements JsonSerializable{

    public $first;
    public $last;
 
     public function __construct($first,$last)
     {
         $this->first=$first;
         $this->last=$last;
         
     }
 
     public function jsonSerialize(){
         return ['class'=>'members', 'data'=>[
             'first'=>$this->first,
             'last'=>$this->last
         ]
         ];
     }
 
 }

 class Request implements JsonSerializable{

    public $name;
    public $first;
    public $last;
    public $userid;
    public $groupid;
 
    public function __construct($name,$first,$last,$userid,$groupid)
    {
         $this->name=$name;
         $this->first=$first;
         $this->last=$last;
         $this->userid=$userid;
         $this->groupid=$groupid;
         
    }
 
    public function jsonSerialize(){
        return ['class'=>'request', 'data'=>[
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
?>