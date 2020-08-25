$(function() {
  'use strict';

 
  $(function() {
    // validate signup form on keyup and submit
    $("#registo_user").validate({
      rules: {
        nome: {
          required: true,
          minlength: 3
        },
        password: {
          required: true,
          minlength: 4
        },
        password_second: {
          required: true,
          minlength: 4,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        },
        perfil: {
          required: true,
          minlength: 1
        },
      },
      messages: {
        nome: {
          required: "Por favor coloque o nome",
          minlength: "Nome no minimo com  3 characters"
        },
        password: {
          required: "Por favor coloque a password",
          minlength: "Your no minimo com  4 characters"
        },
        password_second: {
          required: "Por favor coloque a password",
          minlength: "Your no minimo com  4 characters",
          equalTo: "As senhas nao correspondes"
        },
        email: "Por favor coloque o email valido",
        perfil: "Por favor coloque o perfil valido",
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
  });
});


