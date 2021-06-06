<?php
//klasa za povezivanje sa bazom podataka
class DB {
    private static $instanca = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instanca)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        
        //povezujemo se preko PDO
        //PDO je klasa ugradjena u PHP
        //PDO prikazuje konekciju izmedju PHP i DB servera
        self::$instanca = new PDO('mysql:host=localhost:3307;dbname=meetandtravel', 'root', '', $pdo_options);
      }
      return self::$instanca;
    }
    public static function getRows($sql){
                        $conn=DB::getInstance();
                        $res=$conn->prepare($sql);
                        $res->execute();
                        return $res->fetchAll();
    }
    public static function Execute($sql){
      $conn=DB::getInstance();
      $res=$conn->prepare($sql);
      $res->execute();
}
public static function getCoordinates($city){
  $sql="Select * from city where city='{$city}'";
  $rows=DB::getRows($sql);
  return ['lat'=>$rows[0][2],'long'=>$rows[0][3]];
  
}
public static function getCountMembers($idgroup){
  $sql="select count(idgroup) as c from member where idgroup={$idgroup}";
  return DB::getRows($sql)[0][0];
}
  }
?>