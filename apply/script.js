function showTos()
{
    document.getElementById("tosContainer").style.display = "block";
    document.getElementById("tosText").style.display = "block";
    document.getElementById("applicationFormContainer").style.display = "none";
}

function hideTos() { document.getElementById("tosContainer").style.display = "none"; }

var socialsVisited = 0;
function disableNavLinkCustom(e)
{
    e.style.display = "none";
    socialsVisited += 1;
    if (socialsVisited >= 5)
    {
        var b1 = document.getElementById("b1");
        b1.disabled = false;
        b1.onclick = showTos;
        setTimeout(() => { showTos(); }, 1000);
    }
}

function showApplicationForm()
{
    document.getElementById("tosText").style.display = "none";
    document.getElementById("applicationFormContainer").style.display = "block";
}