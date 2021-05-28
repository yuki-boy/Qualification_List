'use strict'

{
  const open = document.getElementById('open');
  const close = document.getElementById('close');


  open.addEventListener('click', () => {
    modal.classList.remove('hidden');
  });

  close.addEventListener('click', () => {
    modal.classList.add('hidden');
  });

}