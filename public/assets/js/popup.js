document.getElementById("hlm_lokasi").onclick = function (e) {
    e.preventDefault();
    document.getElementById("popup").style.display = "block";
    document.getElementById('popupiframe').src = "/lokasi";
    document.getElementById("judul").innerHTML = "Info Lokasi";
    document.getElementById('close').onclick = function () {
        document.getElementById("popup").style.display = "none";
    };
    return false;
}

document.getElementById("hlm_ekonomi").onclick = function (e) {
    e.preventDefault();
    document.getElementById("popup").style.display = "block";
    document.getElementById('popupiframe').src = "/ekonomi";
    document.getElementById("judul").innerHTML = "Ekonomi";
    document.getElementById('close').onclick = function () {
        document.getElementById("popup").style.display = "none";
    };
    return false;
}

document.getElementById("hlm_zonasi").onclick = function (e) {
    e.preventDefault();
    document.getElementById("popup").style.display = "block";
    document.getElementById('popupiframe').src = "/zonasi";
    document.getElementById("judul").innerHTML = "Zonasi";
    document.getElementById('close').onclick = function () {
        document.getElementById("popup").style.display = "none";
    };
    return false;
}

document.getElementById("hlm_persil").onclick = function (e) {
    e.preventDefault();
    document.getElementById("popup").style.display = "block";
    document.getElementById('popupiframe').src = "/persil";
    document.getElementById("judul").innerHTML = "Persil";
    document.getElementById('close').onclick = function () {
        document.getElementById("popup").style.display = "none";
    };
    return false;
}

document.getElementById("hlm_poi").onclick = function (e) {
    e.preventDefault();
    document.getElementById("popup").style.display = "block";
    document.getElementById('popupiframe').src = "/poi";
    document.getElementById("judul").innerHTML = "POI";
    document.getElementById('close').onclick = function () {
        document.getElementById("popup").style.display = "none";
    };
    return false;
}

document.getElementById("hlm_kblikeg").onclick = function (e) {
    e.preventDefault();
    document.getElementById("popup").style.display = "block";
    document.getElementById('popupiframe').src = "/kode-kbli";
    document.getElementById("judul").innerHTML = "Kode KBLI";
    document.getElementById('close').onclick = function () {
        document.getElementById("popup").style.display = "none";
    };
    return false;
}

window.onkeydown = function (e) {
    if (e.keyCode == 27) {
        document.getElementById("popup").style.display = "none";
        e.preventDefault();
        return;
    }
}
