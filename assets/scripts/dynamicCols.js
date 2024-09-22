export default function dynamicCols () {
  const spacing = document.querySelector('[data-grid-spacing]')
  const columns = document.querySelector('[data-columns]')
  const root = document.documentElement
  if (spacing.dataset.gridSpacing) {
    root.style.setProperty('--grid-spacing', spacing.dataset.gridSpacing)
    root.style.setProperty('--grid-columns', columns.dataset.columns)
  }
}
