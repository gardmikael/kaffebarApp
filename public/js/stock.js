
$(document).ready( function() {
  checkbox = $('#sales-item-bool'),
  optionalBlock = $('#sales-item-atr');

  optionalBlock.hide();

  checkbox.on('click', function() {
    if($(this).is(':checked')) {
      optionalBlock.show();
      optionalBlock.find('input').attr('required', true);
    } else {
      optionalBlock.hide();
      optionalBlock.find('input').attr('required', false);
    }
  });

  $(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });
  $(':file').on('fileselect', function(event, numFiles, label) {
      var input = $(this).parents('.input-group').find(':text'),
          log = numFiles > 1 ? numFiles + ' filer valgt' : label;
      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }
  });
});
