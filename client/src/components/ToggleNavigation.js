export default () => {
  const mainMenu = document.getElementById('mainMenu');
  const toggleNavigation = document.getElementById('toggleNavigation');
  const toggleSubnavs = document.getElementsByClassName('op-header__toggle-subnav');
  toggleNavigation.addEventListener('click', () => {
    mainMenu.classList.toggle('active');
  });
  // eslint-disable-next-line
  for (const toggleSubnav of toggleSubnavs) {
    toggleSubnav.addEventListener('click', () => {
      const parent = toggleSubnav.parentElement;
      const parentList = parent.parentElement;
      // eslint-disable-next-line
      for (const subnav of parentList.children) {
        if (subnav !== parent) {
          subnav.classList.remove('active');
        }
      }
      parent.classList.toggle('active');
    });
  }
};
