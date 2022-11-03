export default () => {
  const mainMenu = document.getElementById('mainMenu');
  const toggleNavigation = document.getElementById('toggleNavigation');
  toggleNavigation.addEventListener('click', () => {
    mainMenu.classList.toggle('active');
  });
};
