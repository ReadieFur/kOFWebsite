window.addEventListener('DOMContentLoaded', (event) =>
{
    injectHeaderFooter();
});

function injectHeaderFooter()
{
    $("#header").load("/header.html");
    $("#footer").load("/footer.html");
}