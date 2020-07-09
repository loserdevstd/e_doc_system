$(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  //validate update profile
  $('#mou_form').validate({
    rules: {
      m_partner: {
        required: true,
      },
      name_partner: {
        required: true,
      },
      approved: {
        required: true,
      },
      extension: {
        required: true,
      },
      staff: {
        required: true,
      },
    },
    messages: {
      m_partner: {
        required: "ກະລຸນາປ້ອນປະເທດຮ່ວມສັນຍາ",
      },
      name_partner: {
        required: "ກະລຸນາປ້ອນຊື່ສະຖາບັນຮ່ວມສັນຍາ",
      },
      approved: {
        required: "ກະລຸນາເລືອກການອະນຸມັດ",
      },
      extension: {
        required: "ກະລຸນາເລືອກການຂະຫຍາຍສັນຍາ",
      },
      staff: {
        required: "ກະລຸນາເລືອກພະນັກງານ",
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