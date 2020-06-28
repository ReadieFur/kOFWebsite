window.addEventListener('load', (event) =>
{
    indexMembers();
});

function indexMembers()
{
    var request = new XMLHttpRequest();
    request.open("GET", "/members/pages.json", false);
    request.send(null);
    var json = JSON.parse(request.responseText);
    json.forEach(element =>
    {
        var a = document.createElement("a");
        a.innerHTML = element.DisplayName;
        a.href = "/members/" + element.DisplayName.toString().replace(' ', '').toLowerCase();
        document.getElementById("members-content").appendChild(a);
    });
}