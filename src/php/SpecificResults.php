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


?>