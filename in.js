

const searchinput=document.getElementById("myinput");
const rows=document.querySelectorAll("tr");

searchinput.addEventListener("keyup",function(event)
{

const q=even.target.value.toLowerCase();
rows.forEach((row) => {
    row.querySelector("td").textContent.toLowerCase().startswith(q)
    ? row.style.display=''
    :(row.style.display="none");
});   

});