window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var logoheader = document.getElementById("logoheader");
var logoNavbar=document.getElementById("logoNavbar");
var logoNavbar2=document.getElementById("logoNavbar2");
var sticky = navbar.offsetTop;

function myFunction() {
	if (window.pageYOffset >= sticky) {
		navbar.classList.add("sticky");
		logoheader.style.display = 'none';
		logoNavbar.style.display = 'block';
		logoNavbar2.style.display = 'block';

	} else {
		navbar.classList.remove("sticky");
		logoheader.style.display = 'block';
		logoNavbar.style.display = 'none';
		logoNavbar2.style.display = 'none';
	}
}