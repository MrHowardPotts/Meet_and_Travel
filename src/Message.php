<?php
//klasa za povezivanje sa bazom podataka
class Message implements JsonSerializable {
    
    private $idmessage;
    private $idgroup;
    private $iduser;
    private $message;
    private $image;
    

    public function __construct($idm,$idg,$idu,$message,$image) {
        $this->idmessage=$idm;
        $this->idgroup=$idg;
        $this->iduser=$idu;
        $this->message=$message;
        $this->image=$image;
    }

    private function __clone() {}

    public function jsonSerialize()
    {
        return [
            'idmessage'=>$this->idmessage,'idgroup'=>$this->idgroup,
            'idsender'=>$this->iduser,'message'=>$this->message,
            'image'=>$this->image
        ];
    }
    
  }
?>