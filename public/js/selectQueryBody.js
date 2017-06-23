function selectQueryBody(str, page) {
        xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("wrapper").innerHTML = this.responseText;
            }
        };
        if (!page) {
            page=2
        }
        xmlhttp.open("GET","app/bodyRequest.php?page="+page+"&studio="+str,true);
        xmlhttp.send();
}