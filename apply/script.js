let applyContainer;

window.addEventListener("load", () =>
{
    applyContainer = document.querySelector("#applyContainer");
    document.querySelector("#showApplication").onclick = () => { applicationSlide(1); applyFormVisibility(1); };
    document.querySelector("#applyContainerClickOut").onclick = () => { applyFormVisibility(0); };
    document.querySelector("#page1Button").onclick = () => { applicationSlide(2); };
    document.querySelector("#page3Button").onclick = () => { applyFormVisibility(0); };
    let applicationForm = document.querySelector("#applyForm");
    applicationForm.onsubmit = submitApplication;
    document.querySelector("#submitApplication").onclick = () => { applicationForm.querySelector("input[type=submit]").click(); };
});

function applicationSlide(page) { document.querySelector("#applyPages").className = `page${page}`; }

function submitApplication(event)
{
    event.preventDefault();

    $.ajax(
    {
        type: "POST",
        url: "submitApplication.php",
        data:
        {
            forename: event.srcElement[0].value,
            nickname: event.srcElement[1].value,
            birthdate: event.srcElement[2].value,
            competedGames: event.srcElement[3].value,
            country: event.srcElement[4].value,
            email: event.srcElement[5].value,
            previousCompetitions: event.srcElement[6].value,
            whykOF: event.srcElement[7].value,
            daysActive: event.srcElement[8].value,
            streamUpload: event.srcElement[9].value
        },
        success: success,
        dataType: "TEXT"
    });

    function success(data)
    {
        let page3Status = document.querySelector("#page3Status");
        if (data == "sucessful") { page3Status.innerText = "Success"; page3Status.style.color = "green"; }
        else { page3Status.innerText = "Failed"; page3Status.style.color = "red"; }
        applicationSlide(3);
    }
}

function applyFormVisibility(e)
{
    if (e == 1)
    {
        applyContainer.classList.remove("fadeOut");
        applyContainer.classList.add("fadeIn");
        applyContainer.style.display = "block";
    }
    else
    {
        applyContainer.classList.remove("fadeIn");
        applyContainer.classList.add("fadeOut");
        setTimeout(() => { applyContainer.style.display = "none"; }, 495);
    }
}