	$(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    //validate update profile
  $('#frm').validate({
    rules: {
      out_date: {
        required: true,
      },
      auther: {
        required: true,
      },
      place: {
        required: true,
      },
      amount: {
        required: true,
      },
      myfile: {
        required: true,
      },
    },
    messages: {
      out_date: {
        required: "ກະລຸນາເລືອກວັນທີ່ເພີ່ມ",
      },
      auther: {
        required: "ກະລຸນປ້ອນຊື່ຜູ້ເຊັນ",
      },
      place: {
        required: "ກະລຸນປ້ອນບ່ອນໄປສົ່ງເອກະສານ",
      },
      amount: {
        required: "ກະລຸນປ້ອນຈຳນວນເງິນ",
      },
      myfile: {
        required: "ກະລຸນເລືອກຟາຍເອກະສານ",
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