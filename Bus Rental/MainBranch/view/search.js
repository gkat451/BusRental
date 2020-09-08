$(document).ready(function(){
    $("div#ajax input#searchField").keyup(function(){
        var search = $("div#ajax input#searchField").val().trim();
        if (search != ""){
            $.get("../controller/ws/searchWebService.php?locations="+search,function(results){
                $("div#ajax div.ajaxResults").empty();
                var locOnly = [];
                for (var i = 0; i < results.length; i++){
                    locOnly.push(results[i].bLocation);
                }
                var locArray = [];
                if (results.length > 1){
                    function onlyUnique(value, index, self) { 
                        return self.indexOf(value) === index;
                    }
                    var temp = [];
                    temp = locOnly.filter( onlyUnique );
                    for (var i = 0; i < temp.length; i++){
                        locArray.push(temp[i]);
                    }
                } else {
                    //when only one - like Heathrow
                    for (var i = 0; i < results.length; i++){
                        locArray.push(results[i].bLocation);
                    }
                }
                for (var i = 0; i < locArray.length; i++){
                    var result = $('<div class="result">'+locArray[i]+'</div>');
                    result.click(function(){
                        $("div#ajax div.ajaxResults").hide();
                        $("div#ajax input#searchField").val($(this).text());
                        $("input#searchButton").click();
                        });
                    $("div#ajax div.ajaxResults").append(result);
                }
                if (results.length == 0){
                    $("div#ajax div.ajaxResults").hide();
                }
                else {
                    $("div#ajax div.ajaxResults").show();
                }
            });
        } else {
            $("div#ajax div.ajaxResults").hide();
        }
    });
    $("div#ajax input#searchButton").click(function(){
        var search = $("div#ajax input#searchField").val().trim();
        $.get("../controller/ws/searchWebService.php?locations="+search,function(results){
            $("table#table tbody").empty();
            for (var i = 0; i < results.length; i++){
                var bus = results[i];
                var newrow = $("<tr></tr>");
                newrow.append("<td>"+bus.bCapacity+"</td>");
                newrow.append("<td>£"+bus.bRate+"</td>");
                newrow.append("<td>"+bus.bColour+"</td>");
                newrow.append("<td>"+bus.bLocation+"</td>");
                newrow.append("<td><img alt='This bus is "+bus.bColour+"' src='../view/img/"+bus.bColour+".png'></td>");
                newrow.append("<td><form method='post' action='../controller/addBasket.php'><input type='hidden' value='search.php' name='origin'/><input type='hidden' value='"+bus.bId+"' name='input'/><input type='submit' value='Add to basket'/></form></td>");
                $("table#table tbody").append(newrow);
            }
        });
    });
    $("div#ajaxSort select").change(function(){
        var rows, switching, i, x, y, shouldSwitch, position;
        var table = document.getElementById("table");
        var selected = $("div#ajaxSort select option:selected").val();
        if (selected == "location"){
            position = 3;
        } else if (selected == "colour"){
            position = 2;
        } else if (selected == "rate"){
            position = 1;
        } else if (selected == "capacity"){
            position = 0;
        }
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[position];
                y = rows[i + 1].getElementsByTagName("TD")[position];
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    });
});