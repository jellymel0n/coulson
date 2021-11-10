const word = 'Projects.';

let archiveCursor = gsap.to('.archive-cursor', {duration: 0.6, opacity: 0, ease: 'power3.inOut', repeat: -1});

let archiveTL = gsap.timeline({repeat: 0, yoyo: false, delay: 2.5, repeatDelay: 10});
    archiveTL.to( '.archive-text', {duration: 1, text: word, x: '-10px', repeatDelay: 5, onComplete: () => archiveCursor.pause()})

    




