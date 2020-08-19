window.addEventListener('DOMContentLoaded', (event) =>
{
    const urlParams = new URLSearchParams(location.search);
    if (urlParams.has("submission"))
    {
        SubmissionStatus = document.getElementsByTagName("h1")[document.getElementsByTagName("h1").length - 1];
        SubmissionStatus.style.display = "block";
        if (urlParams.get("submission") == "sucessful") { SubmissionStatus.innerHTML = "APPLICATION SUBMITTED!"; }
        else if (urlParams.get("submission") == "unsucessful")
        {
            SubmissionStatus.innerHTML = "SUBMISSION FAILED!";
            SubmissionStatus.style.color = "red";
        }
        else { SubmissionStatus.style.display = "none"; }
    }
});