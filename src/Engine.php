<?php

require_once("DB.php");
require_once("php/SpecificResults.php");

// mozda da promenimo ovo u Requirement
class Wish{

public  $groupId;

//Latitude - geografska visina
public  $y;

public $image;
public $memCount;
//Longitude - geografska sirina
public  $x;

//budget for the trip
public  $budget;

//date from in format "YYYY-MM-DD"
public  $from;

//date to in format "YYYY-MM-DD"
public  $to;

//name of the city
public  $name; 
//result after call to Engine::DistanceCity()
private  $dist=0;

//result after call to Engine::Gaus() for the city
private  $gaus_res_city=0;

//result after call to Engine::Gaus() for the budget
private  $gaus_res_budget=0;

//result after call to Engine::Gaus() for the date 
private  $gaus_res_date=0;

public  $final_res;


public function __construct( $visina, $sirina, $naizv, $budget, $from, $to,$groupid,$image,$memCount){
    $this->y=$visina;
    $this->x=$sirina;
    $this->name=$naizv;
    $this->budget=$budget;
    $this->from=$from;
    $this->to=$to;
    $this->groupId=$groupid;
    $this->image=$image;
    $this->memCount=$memCount;


}

public static function cmp(Wish $a,Wish $b){
    return ($a->final_res>$b->final_res)?-1:1;
}

public function getDist() {return $this->dist;}

public function setDist($dist){$this->dist=$dist;}

public function getGausResCity() {return $this->gaus_res_city;}

public function setGausResCity($rez){$this->gaus_res_city=$rez;}

public function getGausResBudget() {return $this->gaus_res_budget;}

public function setGausResBudget($rez){$this->gaus_res_budget=$rez;}

public function getGausResDate() {return $this->gaus_res_date;}

public function setGausResDate($rez){$this->gaus_res_date=$rez;}

}

// $niz=array(new Wish(44.8125,20.4612,"Beograd",1000,"2021-06-15","2021-06-26",1), 
// new Wish(45.2396,19.8227,"Novi Sad",1300,"2021-07-15","2021-07-26",1), 
// new Wish(43.7238,20.6873,"Kraljevo",700,"2021-06-15","2021-06-27",1),
// new Wish(43.3209,21.8954,"Nis",900,"2021-06-12","2021-06-25",1), 
// new Wish(43.7304,19.6982,"Zlatibor",200,"2021-06-17","2021-06-24",1), 
// new Wish(42.5521,21.8989,"Vranje",2000,"2021-06-20","2021-06-23",1),
// );
class Engine{


    private $beta_city=0.5;
    private $beta_date=0.05;
    private $beta_budget=3;

    #return value is = e^(-beta*dist^2);
    public static function gaus($beta,$dist){

        return pow(M_E,(-$beta*$dist*$dist));

    }

    public static function distanceCity($x1,$y1,$x2,$y2){
        $dx=$x1-$x2;
        $dy=$y1-$y2;
        $distanceCity=sqrt($dx*$dx+$dy*$dy);
        return $distanceCity;
    }

    //returns the absolute difference between 2 dates in the "YYYY-MM-DD" format
    public static function disntaceDate( $d1, $d2){
        
        // ovo naravno nije tacno ali priblizno jeste :D
        $days=array(365,30,1);
        
        // splits the  into an array of YYYY,MM,DD
        $str1_array=explode("-",$d1);
        $str2_array=explode("-",$d2);


        $total_days1=0;
        $total_days2=0;
        for($i=0;$i<count($str1_array);$i++){
            $total_days1+=($days[$i])*($str1_array[$i]);
            $total_days2+=($days[$i])*($str2_array[$i]);

        }
        return abs($total_days1-$total_days2);

    }
    //Return the % difference between the 2 budgets
    public static function distanceBudget( $budget1, $budget2){
        $max=$budget1>$budget2?$budget1:$budget2;
        $min=$budget1<$budget2?$budget1:$budget2;
        $rez= 1-($min/$max);
        return $rez;
    }

    private static function getGroups(){
        $res=[];
        $sql="select * from groups inner join wish ON groups.idwish=wish.idwish";
        $rows=DB::getRows($sql);
        for($i=0;$i<count($rows);$i++){
            $row=$rows[$i];
            $memCount=DB::getCountMembers($row['idgroup']);
            $res[]=new Wish($row['coordinate_y'],$row['coordinate_x'],$row['location'],$row['budget'],$row['from'],$row['to'],$row['idgroup'],$row['image'],$memCount);

        }
        return $res;
    }

    //Executes the engine. It compares each element in $array (Wish []) to $target (Wish) using the gaus function.
    //return value is the sorted array in descending order in respect to $target
    public static function execute(Wish $target){
        $array=Engine::getGroups();
        for($i=0;$i<count($array);$i++){
            $array[$i]->setDist(Engine::distanceCity($array[0]->x,$array[0]->y,$array[$i]->x,$array[$i]->y));
            $array[$i]->setGausResCity(Engine::gaus(0.5,$array[$i]->getDist()));
            $days=Engine::disntaceDate($array[0]->from,$array[$i]->from);
            $days+=Engine::disntaceDate($array[0]->to,$array[$i]->to);
            
            $array[$i]->setGausResDate(Engine::gaus(0.05,$days));
            $array[$i]->setGausResBudget(Engine::gaus(3,Engine::distanceBudget($array[0]->budget,$array[$i]->budget)));
            
            $array[$i]->final_res=$array[$i]->getGausResCity()*$array[$i]->getGausResBudget()*$array[$i]->getGausResDate();
            }
            usort($array,"Wish::cmp");
            return $array;


    }

    public static function executeGroup(Group $target,$x,$y){
        $w=new Wish($x,$y,$target->where,$target->budget,$target->from,$target->to,$target->groupID,"",69);
        $res=Engine::execute($w);
        $resGroup=[];
        for($i=0;$i<count($res);$i++){
            //get image, get member count 
            $wish=$res[$i];
            $resGroup[]=new Group($wish->image,$wish->name,$wish->from,$wish->to,$wish->budget,$wish->memCount,$wish->groupId);


        }
        return $resGroup;
    }
   
    
}
//distanceCity from belgrade
//$output=Engine::execute($niz[0]);
// Engine::getGroups();

?>