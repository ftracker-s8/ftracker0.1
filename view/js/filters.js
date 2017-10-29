/**
 * Created by expert600 on 28.10.2017 г..
 */
function filterDates(str) {
    //str = str || "";
    if (str == "") {
        document.getElementById("transactionslist").innerHTML = "";
        return;
    }
    else {
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
        xmlhttp.open("GET","../view/get_transactions_with_filters.php?q="+str,true);
        xmlhttp.send();
    }
}