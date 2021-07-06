<?php
class Order
{
    protected $ID;
    protected $AID;
    protected $CName;
    protected $Location;
    protected $Governorate;
    protected $City;
    protected $Phone;
    protected $Phone2;
    protected $SubTotal;
    protected $Shipping;
    protected $TotalPrice;
    protected $Status;
    protected $Note;
    protected $Date;


    public function __construct($AID, $CName, $Location, $Governorate, $City, $Phone, $Phone2, $SubTotal, $Shipping, $TotalPrice, $Status, $Note)
    {
        $this->AID = $AID;
        $this->CName = $CName;
        $this->Location = $Location;
        $this->Governorate = $Governorate;
        $this->City = $City;
        $this->Phone = $Phone;
        $this->Phone2 = $Phone2;
        $this->SubTotal = $SubTotal;
        $this->Shipping = $Shipping;
        $this->TotalPrice = $TotalPrice;
        $this->Status = $Status;
        $this->Note = $Note;
        $this->Date = date("Y-m-d H:i:s");
    }

    public function AddOrder()
    {
        $conn = new config();
        $this->Location = mysqli_real_escape_string($conn->datacon(), $this->Location);
        $sql = "INSERT INTO `dashorders`(`AID`, `CName`, `Location`, `Governorate`,`City`, `Phone`, `Phone2`, `SubTotal`, `Shipping`, `TotalPrice`, `Status`, `Note` , `Date`) VALUES ($this->AID,'$this->CName','$this->Location','$this->Governorate','$this->City','$this->Phone','$this->Phone2',$this->SubTotal,$this->Shipping,$this->TotalPrice,'$this->Status','$this->Note','$this->Date');";
        $conn = new mysqli('localhost', 'root', 'z.8<%o?SVROIopQ.', 'shaheen_shaheen');
        $conn->query($sql);
        $id = $conn->insert_id;
        return ($id);
    }

    public function Update($Subtotal, $Shipping, $Total, $OID, $Governorate, $Note)
    {
        $conn = new config();
        $sql = "UPDATE `dashorders` SET `SubTotal`=$Subtotal,`Shipping`=$Shipping,`TotalPrice`=$Total,`Governorate`='$Governorate', `Note`='$Note'  WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function UpdateOrderCallPH2($PH2, $PH1, $OID)
    {
        $conn = new config();
        $sql = "UPDATE `dashorders` SET `Phone2`=$PH2 , `Phone`=$PH1 WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function UpdateOrderLocation($location, $OID)
    {
        $conn = new config();
        $sql = "UPDATE `dashorders` SET `Location`='$location' WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function Updateweb($Subtotal, $Shipping, $Total, $OID, $Governorate, $note)
    {
        $conn = new config();
        $sql = "UPDATE `orders` SET `SubTotal`=$Subtotal,`Shipping`=$Shipping,Note='$note',`TotalPrice`=$Total,`Governorate`='$Governorate' WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function Updatewebaddress($address, $OID)
    {
        $conn = new config();
        $sql = "UPDATE `orders` SET `Location`='$address' WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function ViewAllOrders()
    {
        $conn = new config();
        $sql = "SELECT * FROM `dashorders` WHERE 1";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllOrdersDashFillter($date, $ID, $name, $phone, $AID)
    {
        $conn = new config();
        if (isset($AID)) {
            $sql = "SELECT dashorders.*,admin.username As Agent FROM `dashorders` INNER JOIN admin on admin.ID=dashorders.AID WHERE dashorders.Date LIKE '%$date%' AND dashorders.ID LIKE '%$ID%' AND dashorders.CName LIKE '%$name%' AND dashorders.Phone LIKE '%$phone%' AND dashorders.AID=$AID";
        } else {
            $sql = "SELECT dashorders.*,admin.username As Agent FROM `dashorders` INNER JOIN admin on admin.ID=dashorders.AID WHERE dashorders.Date LIKE '%$date%' AND dashorders.ID LIKE '%$ID%' AND dashorders.CName LIKE '%$name%' AND dashorders.Phone LIKE '%$phone%'";
        }
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllOrdersByStatus($Status)
    {
        $conn = new config();
        $sql = "SELECT * FROM `dashorders` WHERE dashorders.Status='$Status'";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    static public function ViewAllOrdersTA($Date, $Status)
    {
        $conn = new config();
        if ($Status == 'Pniding') {
            $sql = "SELECT * FROM `dashorders` WHERE (dashorders.Status='Stock Ready' OR dashorders.Status='Missed3' OR dashorders.Status='Waiting Branch' OR dashorders.Status='Waiting Customer') AND dashorders.Date LIKE '%$Date%';";
        } elseif ($Status == 'Canceled') {
            $sql = "SELECT * FROM `dashorders` WHERE (dashorders.Status='Canceled') AND dashorders.Date LIKE '%$Date%';";
        } elseif ($Status == 'Confirmed') {
            $sql = "SELECT * FROM `dashorders` WHERE (dashorders.Status='Confirmed') AND dashorders.Date LIKE '%$Date%';";
        } elseif ($Status == 'New') {
            $sql = "SELECT * FROM `dashorders` WHERE (dashorders.Status='New') AND dashorders.Date LIKE '%$Date%';";
        }
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    static public function ViewAllOrdersWebTA($Date, $Status)
    {
        $conn = new config();
        if ($Status == 'Pniding') {
            $sql = "SELECT orders.*, CONCAT(user.FName,' ',user.LName) AS CName FROM `orders` INNER JOIN user on user.ID=orders.UID  WHERE (orders.Status='Missed3' OR orders.Status='Stock Ready' OR orders.Status='Waiting Branch') AND orders.Date LIKE '%$Date%';";
        } elseif ($Status == 'Canceled') {
            $sql = "SELECT orders.*, CONCAT(user.FName,' ',user.LName) AS CName FROM `orders` INNER JOIN user on user.ID=orders.UID  WHERE (orders.Status='Canceled') AND orders.Date LIKE '%$Date%';";
        } elseif ($Status == 'Confirmed') {
            $sql = "SELECT orders.*, CONCAT(user.FName,' ',user.LName) AS CName FROM `orders` INNER JOIN user on user.ID=orders.UID  WHERE (orders.Status='Confirmed') AND orders.Date LIKE '%$Date%';";
        } elseif ($Status == 'New') {
            $sql = "SELECT orders.*, CONCAT(user.FName,' ',user.LName) AS CName FROM `orders` INNER JOIN user on user.ID=orders.UID  WHERE (orders.Status='New' OR orders.Status='new') AND orders.Date LIKE '%$Date%';";
        }
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllConfirmedOrders($Date)
    {
        $conn = new config();
        $sql = " SELECT * FROM `dashorders` WHERE (dashorders.Status='Confirmed' OR dashorders.Status='new' OR dashorders.Status='Ready To Shipping' OR dashorders.Status='New' OR dashorders.Status='Canceled') AND dashorders.Date LIKE '%$Date%'";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllConfirmedOrdersForStock($Date)
    {
        $conn = new config();
        $sql = " SELECT * FROM `dashorders` WHERE (dashorders.Status='New') AND dashorders.Date LIKE '%$Date%'";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllConfirmedOrdersfinal($Date)
    {
        $conn = new config();
        $sql = " SELECT * FROM `dashorders` WHERE (dashorders.Status='Confirmed') AND dashorders.Date LIKE '%$Date%'";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllOrdersWebDate($date, $ID, $name, $phone)
    {
        $conn = new config();
        $sql = "SELECT orders.*, CONCAT(user.FName,' ',user.LName) AS CName FROM `orders` INNER JOIN user on user.ID=orders.UID WHERE orders.date LIKE '%$date%' AND orders.ID LIKE '%$ID%' AND CONCAT(user.FName,' ',user.LName) LIKE '%$name%' AND orders.Phone LIKE '%$phone%' ";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllConfirmedWebOrders($Date)
    {
        $conn = new config();
        $sql = "SELECT orders.*, CONCAT(user.FName,' ',user.LName) AS CName FROM `orders` INNER JOIN user on user.ID=orders.UID WHERE (orders.Status='new') AND orders.Date LIKE '%$Date%'";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewAllConfirmedWebOrdersfinal($Date)
    {
        $conn = new config();
        $sql = "SELECT orders.*, CONCAT(user.FName,' ',user.LName) AS CName FROM `orders` INNER JOIN user on user.ID=orders.UID WHERE (orders.Status='Confirmed') AND orders.Date LIKE '%$Date%'";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function ViewSingleOrders($OID)
    {
        $conn = new config();
        $sql = "SELECT * FROM `dashorders` WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ViewSingleOrdersweb($OID)
    {
        $conn = new config();
        $sql = "SELECT user.ID AS userid,CONCAT(user.FName,' ',user.LName) AS CName,user.Mail,orders.ID,orders.Location,orders.Governorate,orders.Phone,orders.SubTotal,orders.Shipping,orders.TotalPrice,orders.Status,orders.Date,orders.Note FROM `orders`INNER JOIN user on user.ID=orders.UID WHERE orders.ID=$OID";
        if ($conn->datacon()->query($sql)) {
            return (($conn->datacon()->query($sql)));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function Cancel($OID)
    {
        $conn = new config();
        $sql = "UPDATE `dashorders` SET `Status`='Canceled'WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function CancelWeb($OID)
    {
        $conn = new config();
        $sql = "UPDATE `orders` SET `Status`='Canceled' WHERE ID=$OID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function Transfer()
    {
        $conn = new config();
        $sql = "UPDATE `dashorders` SET `Status`='In Prograss' WHERE `Status`='New'";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function TransferWeb()
    {
        $conn = new config();
        $sql = "UPDATE `orders` SET `Status`='In Prograss' WHERE `Status`='New'";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    static public function CahngeStatus($OID, $Status, $CancelNote, $admin)
    {
        $conn = new config();
        if ($CancelNote == Null) {
            $sql = "UPDATE `dashorders` SET `Status`='$Status' WHERE ID=$OID";
        } else {
            $sql = "UPDATE `dashorders` SET `Status`='$Status' , `innerNote`='$CancelNote' WHERE ID=$OID";
        }

        if ($conn->datacon()->query($sql)) {
            if ($Status == 'Ready To Shipping') {
                $sql2 = "UPDATE `dashorderdata` SET `Availability`='Available' WHERE dashorderdata.OID='$OID'";
                if ($conn->datacon()->query($sql2)) {
                    $sql3 = "INSERT INTO `orderlogs`(`OID`, `StatusFrom`, `StatusTo`,`AdminID`) VALUES ('$OID','sss','$Status',$admin)";
                    if ($conn->datacon()->query($sql3)) {
                        return "Success";
                    } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->datacon()->error;
                    }
                } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->datacon()->error;
                }
            }
            $sql3 = "INSERT INTO `orderlogs`(`OID`, `StatusFrom`, `StatusTo`,`AdminID`) VALUES ('$OID','sss','$Status',$admin)";
            if ($conn->datacon()->query($sql3)) {
                return "Success";
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->datacon()->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    static public function CahngeStatusWeb($OID, $Status, $CancelNote, $admin)
    {
        $conn = new config();
        if ($CancelNote == NULL) {
            $sql = "UPDATE `orders` SET `Status`='$Status' WHERE ID=$OID";
        } else {
            $sql = "UPDATE `orders` SET `Status`='$Status',`innerNote`='$CancelNote' WHERE ID=$OID";
        }
        if ($conn->datacon()->query($sql)) {
            if ($Status == 'Ready To Shipping') {
                $sql2 = "UPDATE `orderdata` SET `Availability`='Available' WHERE orderdata.OID='$OID'";
                if ($conn->datacon()->query($sql2)) {
                    $sql3 = "INSERT INTO `orderlogs`(`OID`, `StatusFrom`, `StatusTo`,`AdminID`) VALUES ('$OID','sss','$Status',$admin)";
                    if ($conn->datacon()->query($sql3)) {
                        return "Success";
                    } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->datacon()->error;
                    }
                } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->datacon()->error;
                }
            }
            $sql3 = "INSERT INTO `orderlogs`(`OID`, `StatusFrom`, `StatusTo`,`AdminID`) VALUES ('$OID','sss','$Status',$admin)";
            if ($conn->datacon()->query($sql3)) {
                return "Success";
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->datacon()->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function salesOnRange($start, $end)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date) FROM (select  dashorders.SubTotal,dashorders.Date from dashorders where dashorders.Date between '$start' and '$end' UNION ALL select orders.SubTotal,orders.Date from orders where orders.Date between '$start 00:00:00' and '$end 23:59:59')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function salesOnRangeByUser($start, $end)
    {
        $conn = new config();
        $sql = "SELECT orders.UID,CONCAT(user.FName,' ',user.LName) AS Name,user.Phone,COUNT(orders.ID) AS QU ,SUM(orders.SubTotal) AS Amount FROM `orders` INNER JOIN user on user.ID=orders.UID where orders.Date between '$start 00:00:00' and '$end 23:59:59' GROUP BY orders.UID order BY QU DESC LIMIT 20";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function salesOnRangeWeb($start, $end)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date) FROM (select orders.SubTotal,orders.Date from orders where orders.Date between '$start 00:00:00' and '$end 23:59:59')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function dayReport($day)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date) FROM (select  dashorders.SubTotal,dashorders.Date from dashorders where dashorders.Date LIKE '%$day%' UNION ALL select orders.SubTotal,orders.Date from orders where orders.Date LIKE '%$day%')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function dayReportWeb($day)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date) FROM (select orders.SubTotal,orders.Date from orders where orders.Date LIKE '%$day%')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }



    public function governorateOnRange($start, $end)
    {
        $conn = new config();
        $sql = "SELECT t1.Governorate,COUNT(t1.ID) AS Count,SUM(t1.SubTotal) AS Sum FROM (SELECT orders.Governorate,orders.ID,orders.SubTotal FROM orders where orders.Date between '$start 00:00:00' and '$end 23:59:59' UNION ALL SELECT dashorders.Governorate,dashorders.ID,dashorders.SubTotal FROM dashorders where dashorders.Date between '$start' and '$end')t1 GROUP BY t1.Governorate ORDER BY COUNT(t1.ID) DESC";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function agentOnRange($start, $end)
    {
        $conn = new config();
        $sql = "SELECT admin.ID AS AAID,COUNT(dashorders.ID) AS Count, admin.username, SUM(dashorders.SubTotal) AS Sum FROM dashorders INNER JOIN admin on admin.ID=dashorders.AID where dashorders.Date between '$start' and '$end' GROUP BY admin.username ORDER BY COUNT(dashorders.ID) DESC";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public static function agentOnRangeCancel($start, $end, $AID)
    {
        $conn = new config();
        $sql = "SELECT COUNT(dashorders.ID) AS Count,admin.ID AS AAID FROM dashorders INNER JOIN admin on admin.ID=dashorders.AID where dashorders.Date between '$start' and '$end' AND dashorders.Status='Canceled' AND admin.username='$AID'";
        if ($conn->datacon()->query($sql)) {
            $result = $conn->datacon()->query($sql);
            while ($row = $result->fetch_assoc()) {
                return $row['Count'];
            }
        } else {
            return "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function agentOnDay($day, $AAID)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date) FROM (select  dashorders.SubTotal,dashorders.Date from dashorders where dashorders.Date LIKE '%$day%' AND dashorders.AID=$AAID)t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function viewAramexAWB()
    {
        $conn = new config();
        $sql = "SELECT * FROM `Aramex` WHERE 1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function salesOnRangeForAgent($start, $end, $AAID)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date) FROM (select  dashorders.SubTotal,dashorders.Date from dashorders where dashorders.Date between '$start' and '$end' AND dashorders.AID=$AAID)t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function salesOnRangeForAgentDetails($start, $end, $AAID)
    {
        $conn = new config();
        $sql = "select  dashorders.* from dashorders where dashorders.Date between '$start' and '$end' AND dashorders.AID=$AAID";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function CancelBy($start, $end, $AAID)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date),SUM(Shipping) FROM (SELECT dashorders.SubTotal,dashorders.Date,dashorders.Shipping FROM `dashorders` WHERE dashorders.innerNote LIKE '%$AAID%' AND dashorders.Status='Canceled' AND dashorders.Date BETWEEN '$start' AND '$end' UNION ALL SELECT orders.SubTotal,orders.Date,orders.Shipping FROM `orders` WHERE orders.innerNote LIKE '%$AAID%' AND orders.Status='Canceled' AND orders.Date BETWEEN '$start 00:00:01' AND '$end 23:59:59')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function Confirmed($start, $end)
    {
        $conn = new config();
        $sql = "SELECT SUM(SubTotal),COUNT(Date),SUM(Shipping) FROM (SELECT dashorders.SubTotal,dashorders.Date,dashorders.Shipping FROM `dashorders` WHERE dashorders.Status='Confirmed' AND dashorders.Date BETWEEN '$start' AND '$end' UNION ALL SELECT orders.SubTotal,orders.Date,orders.Shipping FROM `orders` WHERE  orders.Status='Confirmed' AND orders.Date BETWEEN '$start 00:00:01' AND '$end 23:59:59')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function CancelByDetails($start, $end, $AAID)
    {
        $conn = new config();
        $sql = "SELECT * FROM (SELECT dashorders.id,dashorders.CName AS Name,dashorders.innerNote,dashorders.SubTotal,dashorders.Date,dashorders.Shipping,dashorders.Location  FROM `dashorders` WHERE dashorders.innerNote LIKE '%$AAID%' AND dashorders.Status='Canceled' AND dashorders.Date BETWEEN '$start' AND '$end' UNION ALL SELECT orders.ID,CONCAT(user.FName,' ',user.LName) AS Name,orders.innerNote,orders.SubTotal,orders.Date,orders.Shipping,orders.Location FROM `orders` INNER JOIN user ON user.ID=orders.UID WHERE orders.innerNote LIKE '%$AAID%' AND orders.Status='Canceled' AND orders.Date BETWEEN '$start 00:00:01' AND '$end 23:59:59')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function ConfirmedByDetails($start, $end)
    {
        $conn = new config();
        $sql = "SELECT * FROM (SELECT dashorders.id,dashorders.CName AS Name,dashorders.innerNote,dashorders.SubTotal,dashorders.Date,dashorders.Shipping  FROM `dashorders` WHERE dashorders.Status='Confirmed' AND dashorders.Date BETWEEN '$start' AND '$end' UNION ALL SELECT orders.ID,CONCAT(user.FName,' ',user.LName) AS Name,orders.innerNote,orders.SubTotal,orders.Date,orders.Shipping FROM `orders` INNER JOIN user ON user.ID=orders.UID WHERE orders.Status='Confirmed' AND orders.Date BETWEEN '$start 00:00:01' AND '$end 23:59:59')t1";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
}
