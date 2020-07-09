$(document).ready(function () {
  $('#register').validate({
    rules: {
      username: {
        required: true,
      },
      passwd: {
        required: true,
        minlength: 6
      },
      age: {
        required: true,
        minlength: 2,
      },
      bithdate: {
        required: true,
      },
      mail: {
        required: true,
        email: true,
      },
      tel: {
        required: true,
        minlength: 7
      },
      functionary: {
        required: true
      },
      position: {
        required: true
      },
      department: {
        required: true
      },
      address: {
        required: true
      },
      degree: {
        required: true
      },
      major: {
        required: true
      },
      youth_date: {
        required: true
      },
      labor_date: {
        required: true
      },
    },
    messages: {
      username: {
        required: "Please enter a email address",
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
      age: {
        required: "Please enter age",
        minlength: "Your age must be at least 2 characters"
      },
      bithdate: {
        required: "Please enter birthdate",
      },
      mail: {
        required: "Please enter email",
        email: "Please enter valid email address"
      },
      tel: {
        required: "Please enter phone number",
        minlength: "Your phone number must be at least 7 characters"
      },
      functionary: {
        required: "Please enter functionary"
      },
      position: {
        required: "Please enter position"
      },
      department: {
        required: "Please enter department"
      },
      address: {
        required: "Please enter address"
      },
      degree: {
        required: "Please enter degree"
      },
      major: {
        required: "Please enter major"
      },
      youth_date: {
        required: "Please enter youth date"
      },
      labor_date: {
        required: "Please enter labor date"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});