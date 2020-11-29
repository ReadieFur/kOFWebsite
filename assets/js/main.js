var team;

window.addEventListener('DOMContentLoaded', (event) =>
{
    getMembers();
});

function getMembers()
{
    $.ajax(
    {
        type: "GET",
        url: "/assets/members/members.json",
        success: success,
        dataType: "JSON"
    });

    function success(data)
    {
        team = data;
        let membersTab = document.querySelector("#teamTab").querySelector("#members");
        for (let i = 0; i < team.members.length; i++)
        {
            let tab = document.createElement("a");
            tab.href = `/members/${team.members[i].name.toLowerCase().replace(" ", "")}/`;
            tab.innerHTML = team.members[i].name;
            membersTab.append(tab);
        }

        highlightActivePage(); //Async task was allowing page highlighting to complete before the header had been filled
    }
}

function highlightActivePage()
{
    var path = window.location.pathname.split("/").filter((el) => { return el != ""; });

    document.querySelector("#header").querySelectorAll("a").forEach(element =>
    {
        if(new RegExp(path.join("|")).test(element.innerHTML.replace(" ", "").replace("+", "").toLowerCase()))
        {
            element.classList.add("red");
            try
            {
                let whyIsThisSoFarBack = element.parentElement.parentElement.parentElement;
                if (whyIsThisSoFarBack.classList.contains("naviDropdown")) { whyIsThisSoFarBack.firstElementChild.classList.add("red"); }
            }
            catch (error) { /*console.error(error);*/ }
        }
    });
}