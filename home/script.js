let rosterDetails = {};

window.addEventListener("load", () =>
{
    indexRoster();
    document.querySelector("#rosterBack").onclick = () => { rosterPageChange(false); };
    document.querySelector("#rosterForward").onclick = () => { rosterPageChange(true); };
    rosterAutoPages(4000, 1000);
});

function indexRoster()
{
    let rosterPages = document.querySelector("#rosterContainer").querySelector("#rosterPages");
    rosterDetails = { element: rosterPages, pages: team.members.length, pageElements: [], slide: 1 };
    for (let i = 0; i < team.members.length; i++)
    {
        let td = document.createElement("td");
        let a = document.createElement("a");
        let img = document.createElement("img");
        let h4 = document.createElement("h4");
        let p = document.createElement("p");

        if (i == 0) { td.classList.add("visible"); }
        a.href = `/members/${team.members[i].name.toLowerCase().replace(" ", "")}/`;
        a.classList.add("center");
        a.setAttribute("animation", "placeholder");
        img.src = team.members[i].icon;
        img.classList.add("imgMedium");
        img.classList.add("circle");
        h4.innerText = team.members[i].name;
        p.innerText = team.members[i].position;

        a.appendChild(img);
        a.appendChild(h4);
        a.appendChild(p);
        td.appendChild(a);
        rosterPages.insertBefore(td, rosterPages.children[rosterPages.children.length - 1]);
        rosterDetails.pageElements.push(a);
    }
}

function rosterPageChange(progress)
{
    let previousSlideIndex = rosterDetails.slide;
    if (progress) { rosterDetails.slide = rosterDetails.slide == rosterDetails.pages ? 1 : rosterDetails.slide + 1; }
    else { rosterDetails.slide = rosterDetails.slide == 1 ? rosterDetails.pages : rosterDetails.slide - 1; }
    let previousSlide = rosterDetails.element.children[previousSlideIndex];
    let previousSlideA = previousSlide.querySelector("a");
    previousSlideA.classList.remove(previousSlideA.getAttribute("animation"));
    previousSlideA.setAttribute("animation", progress ? "rightToLeftOut" : "leftToRightOut");
    previousSlideA.classList.add(previousSlideA.getAttribute("animation"));
    setTimeout(() =>
    {
        previousSlide.classList.remove("visible");

        let currentSlide = rosterDetails.element.children[rosterDetails.slide];
        currentSlide.classList.add("visible");
        let currentSlideA = currentSlide.querySelector("a");
        currentSlideA.classList.remove(currentSlideA.getAttribute("animation"));
        currentSlideA.setAttribute("animation", progress ? "rightToLeftIn" : "leftToRightIn");
        currentSlideA.classList.add(currentSlideA.getAttribute("animation"));
    }, 495);
}

function rosterSlideSet(slide) //Didn't account for page select buttons in the orignal function so I made this quick dirty method, iterates through all slides till the user is at the desired page.
{
    if (slide > 0 && slide < rosterDetails.pages + 1)
    {
        let forward = slide > rosterDetails.slide ? true : false;
        while(slide != rosterDetails.slide) { rosterPageChange(forward); }
    }
}

function rosterAutoPages(slideTime, checkTime)
{
    let rosterContainer = document.querySelector("#rosterContainer");
    rosterContainer.addEventListener("mouseover", pauseTimer);
    rosterContainer.addEventListener("mouseleave", resumeTimer);
    let rosterBack = document.querySelector("#rosterBack");
    let rosterForward = document.querySelector("#rosterForward");
    rosterBack.addEventListener("click", resetTimer);
    rosterForward.addEventListener("click", resetTimer);

    let timeRemaining = slideTime;
    let timer = setInterval(timerFunction, checkTime);

    function timerFunction()
    {
        timeRemaining -= checkTime;
        if (timeRemaining <= 0)
        {
            timeRemaining = slideTime;
            rosterPageChange(true);
        }
    }

    function resetTimer() { timeRemaining = slideTime; }

    function pauseTimer() { clearInterval(timer); }

    function resumeTimer() { setInterval(timerFunction, checkTime); }
}