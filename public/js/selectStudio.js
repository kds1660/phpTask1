function selectStudio(str) {

    if (str == "") {
       // document.getElementById("wrapper").innerHTML = "";
        return;
    } else {
        xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("wrapper").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","app/bodyRequest.php?page=2&studio="+str,true);
        xmlhttp.send();
    }
}