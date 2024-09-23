import VanillaTilt from 'vanilla-tilt'

VanillaTilt.init(document.querySelectorAll('.tilt-me'), {

  max: 30, // max tilt rotation (degrees)
  startX: 0, // the starting tilt on the X axis, in degrees.
  startY: 0, // the starting tilt on the Y axis, in degrees.
  perspective: 1000, // Transform perspective, the lower the more extreme the tilt gets.
  scale: 1,
  glare: true,
  maxGlare: 0.1
})
