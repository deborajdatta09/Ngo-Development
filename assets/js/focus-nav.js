( function( window, document ) {
  function ngo_organization_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const ngo_organization_nav = document.querySelector( '.sidenav' );
      if ( ! ngo_organization_nav || ! ngo_organization_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...ngo_organization_nav.querySelectorAll( 'input, a, button' )],
        ngo_organization_lastEl = elements[ elements.length - 1 ],
        ngo_organization_firstEl = elements[0],
        ngo_organization_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && ngo_organization_lastEl === ngo_organization_activeEl ) {
        e.preventDefault();
        ngo_organization_firstEl.focus();
      }
      if ( shiftKey && tabKey && ngo_organization_firstEl === ngo_organization_activeEl ) {
        e.preventDefault();
        ngo_organization_lastEl.focus();
      }
    } );
  }
  ngo_organization_keepFocusInMenu();
} )( window, document );