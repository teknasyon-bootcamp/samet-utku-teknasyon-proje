<?php 
namespace Core\classes\membership;
class Signup{
    public function check()
    {
        $request = $_POST;
        if($request["post_password"]!=$request["post_password2"]){
            return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Şifreniz aynı değil...","script"=>""]));
        }
        $checkuser = new \App\models\users;
        $dataview = $checkuser
        ->create([
            "username"=>"test",
            "password"=>md5("test"),
            "mail"=>"smtkuo@gmail.com",
            "roleID"=>1
        ])
        ->all()
        ->return();
        print_r($dataview);

    }  
}