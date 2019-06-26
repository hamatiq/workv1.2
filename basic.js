function sort(element){
    $(element).parent().children().removeClass('btn-primary');
    $(element).parent().children().not(element).addClass('btn-secondary');
    $(element).removeClass('btn-secondary');
    $(element).addClass('btn-primary');
    var id = element.id;
    if(id == 'year'){
        cars(2);
    }
    else if (id == 'make'){
        cars(3);
    }
    else if (id == 'cost'){
        cars(4);
    }
    else {
        cars(1);
    }
}

function cars(str) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        // console.log(str);
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("carlist").innerHTML= this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("GET","car.php?q="+str,true);
    xmlhttp.send();

}

function showjobs(element){
    element = $(element).parent();
    $('#job').remove();
    $("<div id='job' style='display:block; width:100%;'><div style='display:block; width:100%;'><button type='button' class='btn btn-info' id='addjob' onclick='addjob(this)'>Add Job</button></div>"+
    "<table class = 'table'><thead><tr><th width='40%'>Job Describtion</th><th width='30%'>Parts</th><th width='30%'>Labor</th></tr></thead> <tbody id = 'not_done'></tbody>"+
    "</table>"+
    "<table class = 'table'>"+
    "<thead><tr><th width='50%'>discribtion</th><th style='border=;none' width='50%'>cost</th>  </tr></thead> <tbody id = 'done'></tbody>"+
    "</table></div>").insertAfter(element);
    // console.log($(element).next());
    var stock = $(element).children(":first").text();
    // console.log(stock);
    jobs(element.nextSibling,stock);
}

function jobs(element, stock){
    // prints the jobs yet to be done
    $.ajax({url: 'jobs.php?stock='+stock,success: function(result){
        $('#not_done').append(result);}
    });
    // print jobs that are done
    $.ajax({url: 'donejobs.php?stock='+stock,success: function(result){
        $('#done').append(result);
    }});
}

function addjob(element){
    $('#addjobform').remove();
    var stock= $(element).parent().parent().prev().children(":first").text();
    // console.log(stock);
    $('<form id="addjobform" action="addjob.php" method=post>'
    +'<label for="description">describe:</label>'
    +'<input type="text" class="form-control" name="description"><br>'
    +'<input type="hidden" name="stock" value='+stock+'>'
    +'<button type="submit" class="btn btn-success">Submit</button>'
    +'</form>').insertAfter(element);
}

var mysql = require('mysql');

var con = mysql.createConnection({
    host: "todo2.cjdks7jqac0y.us-east-2.rds.amazonaws.com",
    user: 'aaauto',
    password:"Sawsan.123",
    database: "todo"
});

con.connect(function(err){
    if (err) throw err;
    con.query("select * from car where stock = 17251", function (err,result,fields){
      if (err) throw err;
      console.log(result);  
    });
});
