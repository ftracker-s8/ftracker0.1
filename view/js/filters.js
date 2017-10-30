/**
 * Created by expert600 on 28.10.2017 г..
 */

function  filterEntries() {

    //var datef = document.getElementById("datef");
    var el = document.getElementById("datef");
    var datef = el.options[el.selectedIndex].value;

    //var datef = document.querySelector('input[name="datef"]:selected').value;
    var entrytype2 = document.querySelector('input[name="entrytype"]:checked').value;
    //var entrytype = document.getElementById('entrytype').innerHTML = this.value;
    var filterurl = "../../controller/get_transactions_with_filters.php?date="+datef+"&etype="+entrytype;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("transactionslist").innerHTML = this.responseText;
        }
    };
    //xmlhttp.open("GET","../view/get_transactions_with_filters.php?date="+str,true);
    xmlhttp.open("GET","../controller/get_transactions_with_filters.php?date="+datef+"&etype="+entrytype2,true);
    xmlhttp.send();

    // var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  // XMLHttpRequest object
    // var datef = document.querySelector('input[name="datef"]:checked').value;
    // var entrytype = document.querySelector('input[name="entrytype"]:checked').value;
    //
    // var filterurl = "../../controller/get_transactions_with_filters.php?date="+datef+"&etype="+entrytype2;
    // xmlhttp.open("GET",filterurl,true);
    // xmlhttp.send();
}
//
// var url = '../controller/add_account_ctrl.php';
// var method = 'POST';
// var params = 'account_name='+document.getElementById('account_name').value;
// params += '&ammount='+document.getElementById('ammount').value;
// params += '&account_desc='+document.getElementById('account_desc').value;
//
// var container_id = 'list_container' ;
// var loading_text = '<img src="../view/images/ajax_loader.gif">' ;