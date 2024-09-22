import 'vite/modulepreload-polyfill'
import FlyntComponent from './scripts/FlyntComponent'
import dynamicCols from './scripts/dynamicCols'
import 'lazysizes'

if (import.meta.env.DEV) {
  import('@vite/client')
}

import.meta.glob([
  '../Components/**',
  '../assets/**',
  '!**/*.js',
  '!**/*.scss',
  '!**/*.php',
  '!**/*.twig',
  '!**/screenshot.png',
  '!**/*.md'
])
dynamicCols()

window.customElements.define(
  'flynt-component',
  FlyntComponent
)
