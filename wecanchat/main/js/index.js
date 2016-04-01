/**
 * Created by whistle ting on 2015/12/14.
 */
$(document).ready(function(){
    //提交推文
   $("#sub").click(function(){
       var data = {
           content:$("#writeArticle").val()
       }
       var jsonData = JSON.stringify(data);
       $.post(
           "require.php",
            jsonData,
           function(data){
                $("#content").html(data);
       });
   });
    function getData(){
        $.get(
            "require.php",
            null,
            function(data){
                if(data!=""){
                    $("#content").html(data);
                }
            }
        );
    }
    setInterval(getData, 1000);
});