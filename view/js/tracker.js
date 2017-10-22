/**
 * Created by expert600 on 21.10.2017 г..
 */

// add_new_account function
function add_new_account() {
    // initialisation
    var url = '../controller/add_account_ctrl.php';
    var method = 'POST';
    var params = 'account_name='+document.getElementById('account_name').value;
    params += '&ammount='+document.getElementById('ammount').value;
    params += '&account_desc='+document.getElementById('account_desc').value;

    var container_id = 'list_container' ;
    var loading_text = '<img src="../view/images/ajax_loader.gif">' ;
    // call ajax function
    ajax (url, method, params, container_id, loading_text) ;
}

function delete_account(account_id) {
    if (confirm('Are you sure to delete this member ?')) {
        // initialisation
        var url = '../controller/delete_user_account.php';
        var method = 'POST';
        //var params = 'id='+id;
        var params = 'account_id='+account_id;
        var container_id = 'list_container' ;
        var loading_text = '<img src="images/ajax_loader.gif">' ;
        // call ajax function
        ajax (url, method, params, container_id, loading_text) ;
    }
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