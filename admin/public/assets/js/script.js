var checked = false;

function checkedAllUser() {
    var aa = document.getElementsByClassName("name1");
    checked = document.getElementById('name1').checked;

    for (var i = 0; i < aa.length; i++) {
    aa[i].checked = checked;
    }
}

function checkedAllPro() {
    var aa = document.getElementsByClassName("product");
    checked = document.getElementById('product1').checked;

    for (var i = 0; i < aa.length; i++) {
    aa[i].checked = checked;
    }
}

function checkedAllCate() {
    var aa = document.getElementsByClassName("category");
    checked = document.getElementById('category1').checked;

    for (var i = 0; i < aa.length; i++) {
    aa[i].checked = checked;
    }
}
