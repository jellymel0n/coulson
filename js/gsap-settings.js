const words = ['develops', 'designs', 'creates'];
const lastWord = 'codes.';

let cursor = gsap.to('.cursor', {duration: 0.6, opacity: 0, ease: 'power3.inOut', repeat: -1});

let coulsonText = gsap.timeline()


coulsonText.from( '.coulson', {duration: 1, y:'10vw', ease: 'power3.out', onComplete: () => masterTL.play()})
  .to('.coulson', 1, {opacity: 1}, 0)
  

let masterTL = gsap.timeline({repeat: 0, onComplete: () => masterTL.pause()}).pause()

words.forEach(word => {
let tl = gsap.timeline({repeat: 1, yoyo: true, repeatDelay: 1})
  tl.to( '.text', {duration: 1, text: word, x: '-10px'})

  masterTL.add(tl);
})

let tl2 = gsap.timeline({repeat: 0, yoyo: false, repeatDelay: 1})
  tl2.to( '.text', {duration: 1, text: lastWord, onComplete: () => textTL.play()})

  masterTL.add(tl2);

let textTL = gsap.timeline().pause()
textTL.from( '.text-container', 1, {duration: 1, y:'10vw', ease: 'power3.out'})
  .to('.text-container', 1, {opacity: 1}, 0)
