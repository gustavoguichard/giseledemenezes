$(document).ready(function () {
  const anchor = $('#specializations-anchor')
  const toggleSidebar = (event) => {
    event.preventDefault()
    if (anchor.data('closed')) {
      $('#sidebar').slideDown()
      anchor.data('closed', false)
      $('.icon', anchor).html('-')
    } else {
      $('#sidebar').slideUp()
      anchor.data('closed', true)
      $('.icon', anchor).html('+')
    }
  }

  anchor.on('click', toggleSidebar)
})
