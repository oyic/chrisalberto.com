const allSkillProgress = document.querySelectorAll('.skill-progress')

if (allSkillProgress) {
  allSkillProgress.forEach((item) => {
    const progress = item.dataset.value

    item.style.setProperty('--width-progress', progress + '0%')
  })
}
