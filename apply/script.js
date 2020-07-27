var b1 = document.getElementById("b1");

function showTos()
{
    document.getElementById("tosContainer").style.display = "block";
    document.getElementById("tosText").style.display = "block";
    document.getElementById("applicationFormContainer").style.display = "none";
    document.getElementById("submissionStatus").style.display = "none";
}

function hideTos()
{
    document.getElementsByClassName("tosContainer")[0].className = "tosContainer fadeIn";
    document.getElementById("tosContainer").style.display = "none";
}

var socialsVisited = 0;
function disableNavLinkCustom(e)
{
    e.style.display = "none";
    socialsVisited += 1;
    if (socialsVisited >= 5)
    {        
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

window.addEventListener('DOMContentLoaded', (event) =>
{
    document.getElementById("b1").disabled = false; //Temp while fixing function disableNavLinkCustom();

    const urlParams = new URLSearchParams(location.search);
    if (urlParams.has("submission"))
    {
        document.getElementsByClassName("tosContainer")[0].className = "tosContainer";

        document.getElementById("tosContainer").style.display = "block";

        document.getElementById("tosText").style.display = "none";
        document.getElementById("applicationFormContainer").style.display = "none";
        document.getElementById("submissionStatus").style.display = "block";

        if (urlParams.get("submission") == "sucessful")
        {
            document.getElementById("submissionComplete").innerHTML = "APPLICATION SUBMITTED!";
        }
        else //Implement submission cooldowns as well as failed here (with BASIC errors, full errors should log to the console)
        {
            document.getElementById("submissionComplete").innerHTML = "SUBMISSION FAILED!";
        }
    }
});