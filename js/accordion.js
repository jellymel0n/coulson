var accordions = document.getElementsByClassName('accordion-tab');

for (let i = 0; i < accordions.length; i++) {
    accordions[i].onclick = function () {
        this.classList.toggle('is-open');
        let content = this.nextElementSibling;

        if (content.style.maxHeight) {
        // Accordion is open 
            content.style.maxHeight = null;
        } else {
        // Accordion is closed 
            content.style.maxHeight = content.scrollHeight + 'px';
        }
    }
}

// Fixing Codepen embed to only display javascript
var jsCodePen = document.getElementById('js-link');
var resultsCodePen = document.getElementById('result-link');
resultsCodePen.classList.remove('active');
jsCodePen.classList.add('active');