let heeftSub = document.querySelectorAll('.heeft-submenu > a');
console.log(heeftSub);

for (let i = 0; i < heeftSub.length; i++) {
  heeftSub[i].addEventListener('click', (e)=> e.preventDefault());
}
