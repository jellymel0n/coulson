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

