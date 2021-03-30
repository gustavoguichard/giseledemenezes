$(document).ready(function () {
  const anchor = $('#specializations-anchor')
  const toggleSidebar = (event) => {
    event.preventDefault()
    if (anchor.data('closed')) {
      $('#sidebar').slideDown()
      anchor.data('closed', false)
      anchor.html('- Fechar as Especializações')
    } else {
      $('#sidebar').slideUp()
      anchor.data('closed', true)
      anchor.html('+ Ver as Especializações')
    }
  }

  anchor.on('click', toggleSidebar)
})
