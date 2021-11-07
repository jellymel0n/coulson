var dur = 1;

TweenMax.set("#box", {
  perspective: 1000,
});
TweenMax.set(".box", {
  transformStyle: "preserve-3d",
});
TweenMax.set(".box div", {
  transformStyle: "preserve-3d",
  transformOrigin: "50% 50% -50px",
  transformPerspective: 1000,
});
TweenMax.set(".back", {
  rotationY: 180,
});
TweenMax.set(".right", {
  rotationY: 270,
});
TweenMax.set(".left", {
  rotationY: 90,
});
TweenMax.set(".top", {
  rotationX: 90,
});
TweenMax.set(".bottom", {
  rotationX: 270,
});

var tlFaces = new TimelineMax({
  paused: true, //,
  //repeat: -1
});
tlFaces
  .to(
    ".front",
    dur,
    {
      rotationX: "+=90",
      ease: Linear.easeNone,
    },
    0
  )
  .to(
    ".back",
    dur,
    {
      rotationX: "-=90",
      ease: Linear.easeNone,
    },
    0
  )
  .to(
    ".top",
    dur,
    {
      rotationX: "+=90",
      ease: Linear.easeNone,
    },
    0
  )
  .to(
    ".bottom",
    dur,
    {
      rotationX: "+=90",
      ease: Linear.easeNone,
    },
    0
  )
  .to(
    ".left div",
    dur,
    {
      rotationZ: "+=90",
      ease: Linear.easeNone,
    },
    0
  )
  .to(
    ".right div",
    dur,
    {
      rotationZ: "-=90",
      ease: Linear.easeNone,
    },
    0
  );

var clicked = 0;
$(document).on("click", "#rotateXplus", function () {
    
  if (clicked == 0) {
    tlFaces.play();
    clicked = 1;
  } else if (clicked == 1) {
    tlFaces.reverse();
    clicked = 0;
  }
});

console.log('test');
