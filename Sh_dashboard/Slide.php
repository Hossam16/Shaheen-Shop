<?php

 function Offer_99($arText,$enText)
	{
				$conn=new config();
        $sql = "INSERT INTO `sliders`(`ID`,`name`, `namear`, `text`, `textar`, `link`, `linkar`, `photo`, `status`, `header`) VALUES ('76','99 Offers','عروض الـ 99','$enText','$arText','https://shaheen.center/shop.php?SID=76','https://shaheen.center/shop_ar.php?SID=76','99Offersss.jpg',0,'mainslider')";
        if ($conn->datacon()->query($sql)) {
			  echo "Done";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
        $s = 13;
        $sql2 = "INSERT INTO `nsub`(`ID`, `sub`, `subar`, `catid`, `photo`) VALUES ('76','99 Offers','عروض الـ 99',$s,'99offers.jpg')";
        if ($conn->datacon()->query($sql2)) {
			  echo "Done";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->datacon()->error;
        }
  }
  
  function Offer_99Active()
	{
				$conn=new config();
        $sql = "UPDATE `nsub` SET `StatusSub`=1 WHERE nsub.id=76";
        if ($conn->datacon()->query($sql)) {
          $sql = "UPDATE `sliders` SET `header`='mainslider' WHERE sliders.ID=27";
          if ($conn->datacon()->query($sql)) {
          } else {
              echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
          }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }
  function Offer_99DisActive()
	{
				$conn=new config();
        $sql = "UPDATE `nsub` SET `StatusSub`=0 WHERE nsub.id=76";
        if ($conn->datacon()->query($sql)) {
          $sql = "UPDATE `sliders` SET `header`='mainslider0' WHERE sliders.ID=27";
          if ($conn->datacon()->query($sql)) {
          } else {
              echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
          }
    }
     else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }
  
  function summerOfferActive()
	{
				$conn=new config();
        $sql = "UPDATE `nsub` SET `StatusSub`=1 WHERE nsub.id=74";
        if ($conn->datacon()->query($sql)) {
          $sql = "UPDATE `sliders` SET `header`='mainslider' WHERE sliders.ID=25";
          if ($conn->datacon()->query($sql)) {
          } else {
              echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
          }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }
  function summerOfferDisActive()
	{
				$conn=new config();
        $sql = "UPDATE `nsub` SET `StatusSub`=0 WHERE nsub.id=74";
        if ($conn->datacon()->query($sql)) {
          $sql = "UPDATE `sliders` SET `header`='mainslider0' WHERE sliders.ID=25";
          if ($conn->datacon()->query($sql)) {
          } else {
              echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
          }
    }
     else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }
  
  function heroOfferActive()
	{
				$conn=new config();
        $sql = "UPDATE `nsub` SET `StatusSub`=1 WHERE nsub.id=78";
        if ($conn->datacon()->query($sql)) {
          $sql = "UPDATE `sliders` SET `header`='mainslider' WHERE sliders.ID=28";
          if ($conn->datacon()->query($sql)) {
          } else {
              echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
          }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }
  function heroOfferDisActive()
	{
				$conn=new config();
        $sql = "UPDATE `nsub` SET `StatusSub`=0 WHERE nsub.id=78";
        if ($conn->datacon()->query($sql)) {
          $sql = "UPDATE `sliders` SET `header`='mainslider0' WHERE sliders.ID=28";
          if ($conn->datacon()->query($sql)) {
          } else {
              echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
          }
    }
     else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
