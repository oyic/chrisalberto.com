import VanillaTilt from 'vanilla-tilt'

VanillaTilt.init(document.querySelectorAll('.tilt-me'), {

  max: 15, // max tilt rotation (degrees)
  startX: 0, // the starting tilt on the X axis, in degrees.
  startY: 0, // the starting tilt on the Y axis, in degrees.
  perspective: 1000, // Transform perspective, the lower the more extreme the tilt gets.
  scale: 1.05,
  speed: 400,
  glare: true,
  "max-glare": 0.1,
})
