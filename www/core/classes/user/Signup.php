<?php 
namespace Core\classes\user;
class Signup{
    public $request;
    public function check()
    {
        $this->request = $_POST;
        if($this->request["password"]!=$this->request["password_check"]){
            return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Şifreniz aynı değil..."]));
        }
        $check = (new \App\models\users)->find([
            "mail"=>$this->request["mail"],
        ])->checkData()->return();
        if($check){
             return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Bu mail adresi kullanılmaktadır.."]));
        }else{
            return $this->userSignup();
        }
    }
public function userSignup(){
    $user = [];
    foreach($this->request as $key => $value){
        if($key == "password_check"){
            continue;
        }
        if($key=="password"){
            $value=md5($value);
        }
        $user[$key] = $value;
    }
    $user["roleID"]=1;
    $check = (new \App\models\users)->create($user)->find([
        "mail"=>$this->request["mail"],
    ])->checkData()->return();
    if($check){
        return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Başarıyla Kayıt Oldunuz. Giriş Yapabilirsiniz","script"=>'Page.callAPI("/signin","post","");']));
    }
}
}