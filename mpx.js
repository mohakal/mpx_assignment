$(document).ready(function(){
    $("#myForm").on('submit', function(e){
        e.preventDefault();
        $.post("submit.php",
            {
                paragraph: $("#paragraph").val(),
                replacement: $("#replacement").val()
            },
            function(data, status){
                $("#returnFromSubmit").text(data.message);
            });
    });
    $("#myFormSearch").on('submit', function(e){
        e.preventDefault();
        $.post("search.php",
            {
                keyword: $("#keyword").val()
            },
            function(data, status){
                $(".resultTable").attr("style", "display:none");
                $("#result").empty();

                var trappend = "";
                if(data.status=="200") {
                    $("#searchResultMessage").text("");
                    $.each(data.message, function (key, value) {
                        trappend = trappend + "<tr><td>" + value[0] + "</td><td>" + value[1] + "</td></tr>";
                    });
                    $("#result").append(trappend);
                    $(".resultTable").attr("style", "display:block");
                } else {
                    $("#searchResultMessage").text(data.message);
                }
            });
    });
});