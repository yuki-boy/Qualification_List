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

'use strict'

  $(document).ready(function() {
  $("#timeout").fadeIn().queue(function() {
      setTimeout(function(){$("#timeout").dequeue();
      }, 1000);
  });
  $("#timeout").fadeOut();
  });



  $(function() {
    $(".sortable").sortable();
    $(".sortable").disableSelection();
    $("#submit").click(function() {
        var listIds = $(".sortable").sortable("toArray");
        $("#list_ids").val(listIds);
        $("form").submit();
    });
  });
