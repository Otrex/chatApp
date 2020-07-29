var feeV = $("#fee-view");

var memV = $("#member-view");

var search = $("#search");

var searchResult = $("#search-result");

memV.load(
    "fee/getUnpaid",
    function(data, err, x)
    {
        $(this).html(data);
    }
);

search.keyup(function(){
    $.post(
       "dashboard/searchMember",
       {
           getdept:1,
           
           search:search.val(), 
           
           by: "name"
       },
       
       function(data, err)
       {
           searchResult.html(data);
       }
    );
});



