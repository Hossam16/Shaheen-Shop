<?php


class Nsub 
{
    protected $ID;
    protected $sub;
    protected $subar;
    protected $catid;
    protected $photo;
    public function __constract($sub,$subar,$catid,$photo){
        $this->sub =$sub;
        $this->subar=$subar;
        $this->catid=$catid;
        $this->photo=$photo;

    }
    public function Viewallnsub(){
        $conn=new config();
        $sql = "SELECT * FROM `nsub` ORDER BY `ID` ASC";
        if ($conn->datacon()->query($sql)) {
			return($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
}





?>