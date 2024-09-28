import { buildRefs, getJSON } from '@/assets/scripts/helpers.js'
import Swiper from 'swiper'
import { Autoplay, A11y, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/autoplay'
import 'swiper/css/a11y'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

export default function (el) {
  const refs = buildRefs(el)
  const data = getJSON(el)

  const swiper = initSlider(refs, data)

  return () => swiper.destroy()
}

function initSlider (refs, data) {
  const { options } = data
  const config = {
    modules: [Autoplay, A11y, Navigation, Pagination],
    a11y: options.a11y,
    roundLengths: true,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },

    navigation: {
      nextEl: refs.next,
      prevEl: refs.prev
    }
  }
  config.slidesPerView = 1
  config.spaceBetween = options.columnsGap
  config.breakpoints = {
    640: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: options.columnsGap
    }
  }
  if (options.autoPlay && options.playspeed) {
    config.autoPlay = {
      delay: options.playspeed
    }
  }

  return new Swiper(refs.slider, config)
}
