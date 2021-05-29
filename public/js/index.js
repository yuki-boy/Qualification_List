'use strict'

{
  const open = document.getElementById('open');
  const close = document.getElementById('close');
  const modal = document.getElementById('modal');
  const covor = document.getElementById('covor');


  open.addEventListener('click', () => {
    modal.classList.remove('hidden');
    covor.classList.remove('hidden');
  });

  close.addEventListener('click', () => {
    modal.classList.add('hidden');
    covor.classList.add('hidden');
  });

  covor.addEventListener('click', () => {
    close.click();
  })

}