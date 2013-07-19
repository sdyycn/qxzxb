<!--

var currentElement = '';

function showElement(id) {
	var element = document.getElementById(id);
	if (element) {
		element.className = ((element.className == 'close')
								 ? 'open'
								 : 'close');
	}
	var current = document.getElementById(currentElement);
	if (current && (currentElement != id)) {
		current.className= 'close';
	}

	currentElement = id;
}

//-->