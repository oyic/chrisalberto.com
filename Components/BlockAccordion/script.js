const allPanelTriggers = document.querySelectorAll('.panel-trigger')

if (allPanelTriggers) {
  allPanelTriggers.forEach((item) => {
    item.addEventListener('click', (e) => {
      e.preventDefault()
      const parent = item.parentElement
      const target = parent.querySelector('.panel-content')
      item.ariaExpanded = item.ariaExpanded === 'true' ? 'false' : 'true'

      target.ariaHidden = target.ariaHidden === 'true' ? 'false' : 'true'
      target.style.height = target.ariaHidden === 'true' ? 0 : target.scrollHeight + 'px'
    })
  })
}
