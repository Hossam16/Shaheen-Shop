<?php
class Products
{
    protected $ID;
    protected $Name;
    protected $NameAr;
    protected $Desc;
    protected $DescAr;
    protected $Price;
    protected $SalePrice;
    protected $BSale;
    protected $Stock;
    protected $SID;
    protected $MaxAmount;
    protected $Photo;
    protected $Status;
    protected $ViewNum;
    protected $Rate;
    protected $CompanyID;
    protected $Size;
    protected $CreatedUser;



    public function Products($Name, $NameAr, $Desc, $DescAr, $Price, $SalePrice, $BSale, $Stock, $SID, $MaxAmount, $Photo, $Status, $ViewNum, $Rate, $CompanyID, $Size)
    {
        $conn = new config();
        $this->Name = $Name;
        $this->NameAr = $NameAr;
        $this->Desc = $Desc;
        $this->DescAr = $DescAr;
        $this->Price = $Price;
        $this->SalePrice = $SalePrice;
        $this->BSale = $BSale;
        $this->Stock = $Stock;
        $this->SID = $SID;
        $this->MaxAmount = $MaxAmount;
        $this->Photo = $Photo;
        $this->Status = $Status;
        $this->ViewNum = $ViewNum;
        $this->Rate = $Rate;
        $this->CompanyID = $CompanyID;
        $this->Size = $Size;
        $this->Name = mysqli_real_escape_string($conn->datacon(), $this->Name);
        $this->NameAr = mysqli_real_escape_string($conn->datacon(), $this->NameAr);
        $this->Desc = mysqli_real_escape_string($conn->datacon(), $this->Desc);
        $this->DescAr = mysqli_real_escape_string($conn->datacon(), $this->DescAr);
    }

    public function SetCreatedUser($CreatedUser)
    {
        $this->CreatedUser = $CreatedUser;
    }


    public function ViewAllProducts()
    {
        $conn = new config();
        $sql = "SELECT products.*,nheader.id AS headerID ,nsub.ID AS nsubID ,ncat.ID AS ncatID FROM `products` INNER JOIN nsub on nsub.ID=products.SID INNER JOIN ncat ON ncat.ID=nsub.catid INNER JOIN nheader ON nheader.ID=ncat.headerid ORDER BY headerID ASC, ncatID ASC ,nsubID ASC,products.Price ASC";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function reternAllProducts()
    {
        $conn = new config();
        $sql = "SELECT products.* FROM products  where products.BSale = 1 ORDER BY FIELD(products.SID,'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','58','56','47','48','49','50','51','52','53','54','39','40','41','42','57','43','44','45','46','55')";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql)->fetch_assoc());
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function ViewSingleProduct($PID)
    {
        $conn = new config();
        $sql = "SELECT * FROM `products` WHERE products.id=$PID";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    static public function ViewSingleProductByCode($Code)
    {
        $conn = new config();
        $sql = "SELECT * FROM `products` WHERE products.Photo LIKE '%$Code%'";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql)->fetch_assoc());
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function addProduct()
    {
        $conn = new config();
        $sql = "INSERT INTO `products`( `Name`, `ArName`, `Stock`, `Price`, `SID`, `BSale`, `SalePrice`, `MaxAmount`, `Desc`, `ArDesc`, `Photo`, `ViewNumber`, `Rate`, `Status`, `CompanyID`, `Size`, `Schedule` ,`CreatedUser`) 
               VALUES ('$this->Name','$this->NameAr',$this->Stock,$this->Price,$this->SID,$this->BSale,$this->SalePrice, $this->MaxAmount,'$this->Desc', '$this->DescAr','$this->Photo',$this->ViewNum,$this->Rate,$this->Status,$this->CompanyID,'$this->Size',1,$this->CreatedUser) ";
        if ($conn->datacon()->query($sql)) {
            return ('Success');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function topProducts($start, $end)
    {
        $conn = new config();
        $sql = "SELECT SUM(t1.Num) AS Num,products.* FROM (SELECT SUM(orderdata.Count) AS Num,products.ID AS ProductName , products.Photo AS CCODE FROM orders INNER JOIN orderdata ON orderdata.OID=orders.ID INNER JOIN products on products.id=orderdata.PID WHERE orders.Date BETWEEN '$start 00:00:00' AND '$end 23:59:59' GROUP BY ProductName UNION ALL SELECT SUM(dashorderdata.Count) AS Num,products.ID As ProductName , products.Photo AS CCODE FROM dashorders INNER JOIN dashorderdata ON dashorderdata.OID=dashorders.ID INNER JOIN products on products.id=dashorderdata.PID WHERE dashorders.Date BETWEEN '$start 00:00:00' AND '$end 23:59:59' GROUP BY ProductName)t1 INNER JOIN products on products.ID=t1.ProductName GROUP BY ProductName ORDER BY Num Desc LIMIT 100";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    static public function commodityReport()
    {
        $conn = new config();
        $sql = "SELECT COUNT(products.ID) As Count,nheader.headerar As Header FROM `products` INNER JOIN nsub ON nsub.ID = products.SID INNER JOIN ncat ON ncat.ID= nsub.catid INNER JOIN nheader ON nheader.ID=ncat.headerid WHERE nheader.id!=6 GROUP BY nheader.ID UNION ALL SELECT COUNT(products.ID) As Count,nsub.subar As Header FROM `products` INNER JOIN nsub ON nsub.ID = products.SID INNER JOIN ncat ON ncat.ID= nsub.catid INNER JOIN nheader ON nheader.ID=ncat.headerid WHERE nheader.id=6 GROUP BY nsub.ID";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    static public function commodityOfferReport()
    {
        $conn = new config();
        $sql = "SELECT COUNT(products.ID) As Count,nheader.headerar As Header FROM `products` INNER JOIN nsub ON nsub.ID = products.SID INNER JOIN ncat ON ncat.ID= nsub.catid INNER JOIN nheader ON nheader.ID=ncat.headerid WHERE products.BSale=1 AND nheader.ID !=6 GROUP BY nheader.ID UNION All SELECT COUNT(products.ID) As Count,nsub.subar As Header FROM `products` INNER JOIN nsub ON nsub.ID = products.SID INNER JOIN ncat ON ncat.ID= nsub.catid INNER JOIN nheader ON nheader.ID=ncat.headerid WHERE products.BSale=1 AND nheader.ID=6 GROUP BY nsub.ID";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public function downProducts()
    {
        $conn = new config();
        $sql = "SELECT PID , sum(CC) AS occurrence,products.ArName,products.Price,products.BSale,products.SalePrice,products.Photo FROM (SELECT dashorderdata.PID,dashorderdata.Count AS CC FROM dashorderdata UNION All SELECT orderdata.PID,orderdata.Count AS CC FROM orderdata)t1 INNER JOIN products on products.ID = t1.PID GROUP BY t1.PID ORDER BY `occurrence` ASC LIMIT 100";
        if ($conn->datacon()->query($sql)) {
            return ($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
}
