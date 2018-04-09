

$(document).ready(function(){
        $("#extraButton").click(function(){
            var htmlToClone = $("#addExtra div.first").html();
            $("#addExtra").append(htmlToClone);    
        });
    });