var getAllStud = $("#getStudents");
    
var response = $("#response");
    
var search = $("#search-result");
    
var searchform = $("#srch");
    
var inp = $("#search");
    
    var by = $("#by");
    
    inp.keyup(function(){
        if (inp.val() !== "")
        {
        $.post(
            "dashboard/searchMember",
            {
                search: inp.val(),
                by: by.val()
            },
            
            function (data, r)
            {
                
                search.html(parse(data));
                
            }
        );
        } else {
            search.html("");
        }
    });
    
    getAllStud.click(function(){
        
        $.post(
            "dashboard/getAllStudents",
        {
            name: "Donald Duck"
        },
        
        function(data, status){
            //search.html(data);
            response.html("<pre>"+parse(data));
        });
    });
    
    function parse(data)
    {
        data = JSON.parse(data);
        
        if (data.length < 1 || data === null){
            return "No Data Found!";
        }
        
        var v = "<hr />", x;
        
        if (isArray(data))
        {
            for (i =0;i<data.length; i++)
            {
                v += "<p> ID: " + 
                    data[i].member.id + 
                    "</p>";
                
                v += "<p> Name: " + 
                    data[i]["name"] + 
                    "</p>";
                    
                v += "<p> Date of Birth: " +
                    data[i]["dateOfBirth"] +
                    "</p>";
                
                if (data[i]["Class"] === undefined){
                    v += "<p> Office: " + 
                    data[i]["office"] +
                    "</p>";
                    
                } else {
                    v += "<p> Class: " + 
                    data[i]["Class"] +
                    "</p>";
                }
                
                v += "<input type='hidden'"+
                " value='"+data[i].member.id
                +"' id = 'target' />";
                
                v +="<button id='edit'>" +
                "Edit</button>" +
                "<button id='delete'>Delete" +
                "</button>";
                
                v +="<hr/>";
            }
            
            return v;
        }
        
        for (x in data)
        {
            for (i =0;i<data[x].length; i++)
            {
                v += "<p> ID: " + 
                    data[x][i].member.id + 
                    "</p>";
                    
                v += "<p> Name: " + 
                    data[x][i]["name"] + 
                    "</p>";
                    
                v += "<p> Date of Birth: " +
                    data[x][i]["dateOfBirth"] +
                    "</p>";
                    
                v += "<p> Class: " + 
                    data[x][i]["Class"] +
                    "</p>";
                
                v += "<input type='hidden'"+
                " value='"+data[x][i].member.id
                +"' id = 'target' />";
                
                v +="<button id='edit'>" +
                "Edit</button>" +
                "<button id='delete'>Delete" +
                "</button>";
                
                
                v +="<hr/>";
            }
                
        }
        
        return v;
    }
    
    function isArray(myArray) {
        return myArray.constructor === Array;
    }
    
var editButton = $("#edit");

var deleteButton = $("#delete");

var target = $("#target");

var temp = $("#temp");

deleteButton.click(function(){
    
    $.post(
        "dashboard/deleteMember",
        {
            id : target.val(),
        },
        
        function (d, s)
        {
            if (d === "1")
            {
                alert("Successful!");
            }
        }
    );
    
});