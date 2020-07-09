$(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
//validate update profile
  $('#frm').validate({
    rules: {
      doc_type: {
        required: true,
      },
      in_date: {
        required: true,
      },
      doc_date: {
        required: true,
      },
      doc_title: {
        required: true,
      },
      doc_id: {
        required: true,
      },
      myfile: {
        required: true,
      },
      doc_from: {
        required: true,
      },
    },
    messages: {
      doc_type: {
        required: "ກະລຸນາເລືອກປະເພດເອກະສານ",
      },
      in_date: {
        required: "ກະລຸນາເລືອກວັນທີ່ເພີ່ມ",
      },
      doc_date: {
        required: "ກະລຸນເລືອກວັນທີເອກະສານ",
      },
      doc_title: {
        required: "ກະລຸນພິມເນື້ອໃນເອກະສານ",
      },
      doc_id: {
        required: "ກະລຸນປ້ອນເລກທີເອກະສານ",
      },
      myfile: {
        required: "ກະລຸນເລືອກຟາຍເອກະສານ",
      },
      doc_from: {
        required: "ກະລຸນປ້ອນທີ່ມາຂອງເອກະສານ",
      },
    },
    errorElement: 'sp',
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
  // Handle form submit and validation
  // $( "#frm" ).submit(function(event) {    
  // var error_message = '';
  //   if(!$("#doc_type").val()) {
  //     error_message+="ກະລຸນາພິມຊື່ຜູ້ໃຊ້";
  //   }
  //   if(!$("#doc_title").val()) {
  //     error_message+="<br>ກະລຸນາປ້ອນເນື້ອໃນເອກະສານ";
  //   }
  //   if(!$("#doc_dep").val()) {
  //     error_message+="<br>ກະລຸນາເລືອກພະແນກ";
  //   }
  //   if(!$("#staff").val()) {
  //     error_message+="<br>ກະລຸນາເລືອກພະນັກງານ";
  //   }
  // Display error if any else submit form
  // if(error_message) {
  //   $('.alert-danger').show().html(error_message);
  //     window.setTimeout(function () {
  //         $(".alert").fadeTo(700, 0).slideUp(1000, function () {
  //             $(this).remove()
  //         })
  //     }, 2e3)
  //   return false;
  // } else {
  //   return true;  
  // }    
  // }); 