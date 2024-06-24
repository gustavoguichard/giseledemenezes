$(document).ready(function () {
  const $menuBt = $('#menu-bt')
  const $menu = $('#menu-list')

  const toggleMenu = (event) => {
    event.preventDefault()
    const state = $menuBt.data('state')
    const newState = state === 'closed' ? 'open' : 'closed'
    const $text = $('.anchor-text', $menuBt)
    if (state === 'closed') {
      $menu.slideDown()
      $menuBt.data('state', 'open')
    } else {
      $menu.slideUp()
      $menuBt.data('state', 'closed')
    }
    $text.text($menuBt.data(`${newState}-text`))
  }

  $menuBt.on('click', toggleMenu)
})
