/**
 * Theme functions file
 */

// Select modal
var mpopup = document.getElementById('mpopupBox');

// Select trigger link
var mpLink = document.getElementById("wpz-search-popup");

// Select close action element
var closeModal = document.getElementsByClassName("wpz-search-close")[0];

var searchInput = document.getElementById("wpz-search"); //DOM element

// Open modal once the link is clicked
if( null !== mpLink && null !== mpopup ) {
	mpLink.onclick = function() {
		mpopup.style.display = "block";
		searchInput.focus()  //focus function
	
	};
}

// Close modal once close element is clicked
if( undefined !== closeModal ) {
	closeModal.onclick = function() {
		mpopup.style.display = "none";
	};
}

// Close modal when user clicks outside of the modal box
window.onclick = function(event) {
    if (event.target == mpopup) {
		mpopup.style.display = "none";
    }
};

document.onkeydown = function( evt ) {
	evt = evt || window.event;
	var isEscape = false;
	if ( "key" in evt ) {
		isEscape = ( evt.key === "Escape" || evt.key === "Esc" );
	} else {
		isEscape = (evt.keyCode === 27);
	}
	if ( isEscape ) {
		mpopup.style.display = "none";
	}
};