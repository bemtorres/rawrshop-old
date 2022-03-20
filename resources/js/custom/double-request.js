// Prevenir double request
$(document).ready(function() {
  $('.form-prevent').on('submit', function() {
    $('.button-prevent').attr('disabled', 'true');
    $('.spinner').show();
  });

  $('.form-submit').on('submit', function() {
    $('.form-submit').find('button').attr('disabled', 'true');
  });

  $('.form-submit-go').on('submit', function() {
    $('.form-button').find('button').attr('disabled', 'true');
  });
});