<div class="menu">

<a class="btn btn-lg btn-success" href='javascript:Page.callAPI("/page/news/turkiye-haberleri","post","",function(data){ document.getElementsByClassName("PHPnews")[0].innerHTML=data; });' role="button">Türkiye Haberleri</a> <a class="btn btn-lg btn-success" href='javascript:Page.callAPI("/page/news/bursa-haberleri","post","",function(data){ document.getElementsByClassName("PHPnews")[0].innerHTML=data; });' role="button">Bursa Haberleri</a> <a class="btn btn-lg btn-success" href='javascript:Page.callAPI("/page/news/dunya-haberleri","post","",function(data){ document.getElementsByClassName("PHPnews")[0].innerHTML=data; });' role="button">Dünya Haberleri</a>
</div>
<div class="PHPnews">

</div>
<style>
body{
    background: #eee;
}
span{
    font-size:15px;
} 
.box{
    padding:60px 0px;
}

.box-part{
    background:#FFF;
    border-radius:0;
    padding:60px 10px;
    margin:30px 0px;
}
.text{
    margin:20px 0px;
}

.fa{
     color:#4183D7;
}
</style>