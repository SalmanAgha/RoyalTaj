//getting id from url
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};



function settingvalues(){
var Transaction = getUrlParameter('Transaction');
$('#transactionid').text(Transaction);

  $.ajax( {
    url: "api/invoicedetails.php",
    method: "POST",
    data: {Transaction:Transaction},
    dataType: "JSON",
    success: function (data) 
    {
     var result = data.data;
     var staffusername = data.staffusername;  
      
 
      var td ='';
      var finaltotal='';
      var finaltotal2='';
      for (var i = 0; i < result.length -1; i++) {

        td += '<tr>'+
        '<td><span>'+result[i].itemid+'</span></td>'+
        '<td><span>'+result[i].QTY+'</span></td>'+
        '<td><span>'+result[i].price+'</span></td>'+
        '<td><span>'+result[i].NETAMOUNT+'</span></td>'+ 
        '</tr>';
        finaltotal = result[i].nettotal; 
        finaltotal2 = result[i].nettotal2;        

      }
          td += '<tr>'+
        '<td colspan="3">Total</span></td>'+
         
        '<td><span>'+finaltotal+'</span></td>'+ 
        '</tr>';

      $("#tbody").html(td);
      $("#staffusername").html(staffusername);

      


      return data;
    }
  });

}


$(document).ready(function()
{
 
settingvalues();

  });

