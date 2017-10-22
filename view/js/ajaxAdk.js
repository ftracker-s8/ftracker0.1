/**
 * Created by adk600 on 22.10.2017 г..
 */

// sends data to a php file, via POST, and displays the received answer
//function ajaxRow(php_file, tagID, aid) {
function ajaxRow(tagID, aid) {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  // XMLHttpRequest object

    // create pairs index=value with data that must be sent to server
    //var  the_data = 'test='+document.getElementById('txt2').innerHTML;
    var the_data = 'id-submit=' + aid;
    var php_file = '../controller/get_account_by_id.php';

    request.open("POST", php_file, true);			// set the request

    // adds  a header to tell the PHP script to recognize the data as is sent via POST
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(the_data);		// calls the send() method with datas as parameter

    // Check request status
    // If the response is received completely, will be transferred to the HTML tag with tagID
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            document.getElementById(tagID).innerHTML = request.responseText;
        }
    }
}

// delete_member function
function updateAccount(id) {
        // initialisation
        var url = '../controler/delete_ticket_controller.php';
        var method = 'POST';
        var params = 'id='+id;
        var container_id = 'list_container' ;
        //var container_id = 'field_container' ;
        var loading_text = '<img src="images/ajax_loader.gif">' ;
        // call ajax function
        ajax (url, method, params, container_id, loading_text) ;
}

function update_account_by_id(aid) {
    // initialisation
    var url = '../controller/update_account_by_id.php';
    var method = 'POST';
    var params = 'account_id='+ aid;
    params += '&account_name_update='+document.getElementById('account_name_update').value;
    params += '&ammount_update='+document.getElementById('ammount_update').value;
    params += '&account_desc_update='+document.getElementById('account_desc_update').value;
    //params += '&aid='+document.getElementById('account_id').value;

    var container_id = 'list_container' ;
    //var container_id = 'test22' ;
    var loading_text = '<img src="../view/images/ajax_loader.gif">' ;
    // call ajax function
    ajax (url, method, params, container_id, loading_text) ;
}

// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
        xhr = new XMLHttpRequest();
    } catch(e) {
        try{ // for: IE6+
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(e1) { // if not supported or disabled
            alert("Not supported!");
        }
    }
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4) { // when result is ready
            document.getElementById(container_id).innerHTML = xhr.responseText;
        } else { // waiting for result
            document.getElementById(container_id).innerHTML = loading_text;
        }
    }
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send(params);
}
