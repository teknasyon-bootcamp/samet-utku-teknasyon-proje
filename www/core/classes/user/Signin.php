<?php 
namespace Core\classes\user;
class Signin{
    public $request;
    public function check()
    {
        $this->request = $_POST;
        $check = (new \App\models\users)->find([
            "mail"=>$this->request["mail"],
        ])->checkData()->return();
        if($check){
             return $this->userSignin();
            
        }else{
            return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Bu mail adresi bulunamadı.."]));
        }
    }
    public function userSignin(){
        $user = [];
        foreach($this->request as $key => $value){
            if($key == "password_check"){
                continue;
            }
            $user[$key] = $value;
        }
        $user["roleID"]=1;
        $check = (new \App\models\users)->find([
            "mail"=>$this->request["mail"],
        ])->return(0);
        if($check["mail"] == $this->request["mail"] && $check["password"]==md5($this->request["password"])){
            \Core\classes\session::add("login",$check);
            return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Giriş başarılı. Panel sayfasına yönlendiriliyorsunuz..","script"=>'window.location.href = "/panel";']));
        }else{
            return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Kullanıcı adınız veya şifreniz doğru değil..."]));
        }
    }
}