<?php
  class Person {
  // Properties
  Protected $ID;
  Protected $FName;
  Protected $LName;
  Protected $Gender;
  Protected $Mail;
  Protected $Phone;
  Protected $UserName;
  Protected $Password;
  //end of Properties

  //setter and getter
   public function SetID($ID) {
    $this->ID = $ID;
  }
  public function GetID() {
    return $this->ID;
  }

  public function SetFName($FName){
    $this->FName = $FName;
  }
  public function GetFName(){
    return $this->FName;
  }

  public function SetLName($LName){
    $this->LName = $LName;
  }
  public function GetLName(){
    return $this->LName;
  }


  public function SetGender($Gender){
    $this->Gender = $Gender;
  }
  public function GetGender(){
    return $this->Gender;
  }


  public function SetMail($Mail){
    $this->Mail = $Mail;
  }
  public function GetMail(){
    return $this->Mail;
  }


  public function SetPhone($Phone){
    $this->Phone = $Phone;
  }
  public function GetPhone(){
    return $this->Phone;
  }


  public function SetUserName($UserName){
    $this->UserName = $UserName;
  }
  public function GetUserName(){
    return $this->UserName;
  }


  public function SetPassword($Password){
    $this->Password = $Password;
  }
  public function GetPassword(){
    return $this->Password;
  }
  //end of setter and getter


  //abstract functions
  //abstract public function AddUser(User $user);
  //abstract public function UpdateUser(User $user);
  //abstract public function Login();
  //end of abstract functions





}
?>