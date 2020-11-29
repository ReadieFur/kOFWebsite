window.addEventListener("DOMContentLoaded", () =>
{
    initSocials();
});

function initSocials()
{
    let socialsSection = document.querySelector("#socials");
    member.socials.forEach(social =>
    {
        let div = document.createElement("div");
        div.classList.add(social.platform);
        let p = document.createElement("p");
        p.innerHTML = social.description;
        let a = document.createElement("a");
        a.innerText = "Visit channel";
        a.href = social.link;
        a.classList.add("asButton");
        a.classList.add("hollowButton");
        a.classList.add("light");
        a.style.width = "max-content";

        div.appendChild(p);
        div.appendChild(a);
        socialsSection.appendChild(div);
    });
}