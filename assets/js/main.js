function menu() {
    const hidden = document.querySelector('.menu');
    const sidebar = document.querySelector('.hide-menu');
    sidebar.classList.toggle('active');
}

var ALERT_TITLE_FAIL = "Gagal!";
var ALERT_BUTTON_TEXT = "Oke";

function fail(txt) {
    d = document;

    if (d.getElementById("modalContainer")) return;

    main = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    main.id = "modalContainer";
    main.style.height = d.documentElement.scrollHeight + "px";

    alertCstm = main.appendChild(d.createElement("div"));
    alertCstm.id = "alertBox";
    if (d.all && !window.opera) alertCstm.style.top = document.documentElement.scrollTop + "px";
    alertCstm.style.left = (d.documentElement.scrollWidth - alertCstm.offsetWidth) / 2 + "px";
    alertCstm.style.visiblity = "visible";

    h1 = alertCstm.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE_FAIL));

    msg = alertCstm.appendChild(d.createElement("p"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertCstm.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    btn.focus();
    btn.onclick = function() { removeCustomAlert(); return false; }

    alertCstm.style.display = "block";

}

function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}