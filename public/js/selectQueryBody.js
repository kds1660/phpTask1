function selectQueryBody(str,appRoot) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        document.getElementById("wrapper").innerHTML = '';

        if (this.readyState == 4 && this.status == 200) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(this.responseText, "text/html");
            doc = doc.getElementById('wrapper');
            document.getElementById("wrapper").innerHTML=doc.innerHTML;
        }
    };

    xmlhttp.open("GET", appRoot + "/Page2/Show/" + str);
    xmlhttp.send();
}