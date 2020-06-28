window.addEventListener('load', (event) =>
{
    showSlides(slideIndex);
    //generateRosterDots();
    autoScrollSlides();
});

//#region Roster
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");

var slideIndex = 1;

/*function generateRosterDots()
{
    for (var i = 0; i < slides.length; i++)
    {
        console.log(i);
        var span = document.createElement("span");
        span.className = "dot";
        span.onclick = currentSlide(3);
        document.getElementById("rosterDots").appendChild(span);
    }
}*/

// Next/previous controls
function plusSlides(n)
{
    var i;
    var animation = n == "-1" ? " ltr" : " rtl";
    var aniReplace = n == "-1" ? " rtl" : " ltr";
    if (slideIndex + n > slides.length) { i = 0; }
    else if (slideIndex + n < 1) { i = slides.length - 1;}
    else { i = slideIndex - 1 + n; }
    slides[i].className = slides[i].className.replace(aniReplace, animation);

    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n)
{
    if (n != slideIndex)
    {
        var animation = n > slideIndex ? " ltr" : " rtl";
        var aniReplace = n > slideIndex ? " rtl" : " ltr";  
        slides[n - 1].className = slides[n - 1].className.replace(animation, aniReplace);
        showSlides(slideIndex = n);
    }
}

function showSlides(n)
{
    var i;
    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }
    for (i = 0; i < slides.length; i++)
    {
       slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++)
    {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

var mouseOverControl = false;

function disableAutoScroll() { mouseOverControl = true; }

function enableAutoScroll() { mouseOverControl = false; }

function autoScrollSlides()
{
    setTimeout(() =>
    {
        if (mouseOverControl == false) { plusSlides(1); }
        autoScrollSlides();
    }, 4000);
}
//#endregion