function readURL(input) {
      OnUploadCheck();
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $("#photo_profile").attr("src", e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }
$(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $("#photo").on("change", function(){
      var photo = $(this).val();
      if(photo == ""){
        $(".btn-upload").prop("disabled", true);
      }else{
        $(".btn-upload").prop("disabled", false);
      }
    });
function OnUploadCheck() {
      var extall = "jpg,jpeg,png";
      file = $("#photo").val();
      ext = file.split('.').pop().toLowerCase();
      if (parseInt(extall.indexOf(ext)) < 0) {
          Swal.fire({
            icon: 'error',
            title: 'ເລືອກໄດ້ສະເພາະ File.jpg,jpeg,png'
          })
          $("#photo").val("").focus();
          return false;
      }
      return true;
    }
//alert update complete
      const editdata = $('.edit-data').data('editdata')
        if (editdata) {
          Swal.fire({
            icon: 'success',
            title: 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
            showConfirmButton: false,
            timer: 2000
          })
        }
//alert update complete
      const validdata = $('.valid-data').data('validdata')
        if (validdata) {
          Swal.fire({
            icon: 'error',
            title: 'ແກ້ໄຂບໍ່ສຳເລັດ, ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ',
            showConfirmButton: false,
            timer: 2000
          })
        }
//validate update password
$("#form_pwd").validate({
    rules: {
        curpasswd: {
            required: true,
            minlength: 6,
        },
        newpasswd: {
            required: true,
            minlength: 6
        },
        conpasswd: {
            required: true,
            minlength: 6,
            equalTo: "#newpasswd"
        }
    },
    messages: {
        curpasswd: {
            required: "ກະລຸນາປ້ອນລະຫັດຜ່ານປັດຈຸບັນຂອງທ່ານ",
            minlength: "ລະຫັດຜ່ານຕ້ອງມີຢ່າງໜ້ອຍ 6 ໂຕ"
        },
        newpasswd: {
            required: "ກະລຸນາປ້ອນລະຫັດຜ່ານໃໝ່",
            minlength: "ລະຫັດຜ່ານຕ້ອງມີຢ່າງໜ້ອຍ 6 ໂຕ"
        },
        conpasswd: {
            required: "ກະລຸນາປ້ອນລະຫັດຜ່ານ ເພື່ອຢືນຢັນ",
            minlength: "ລະຫັດຜ່ານຕ້ອງມີຢ່າງໜ້ອຍ 6 ໂຕ",
            equalTo: "ລະຫັດຜ່ານບໍ່ກົງກັນ"
        },
    },
    errorElement: "em",
    errorPlacement: function (error, element) {
      // Add the `invalid-feedback` class to the error element
      error.addClass("invalid-feedback");
      error.insertAfter(element);
      

  },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
    }
})
//validate update profile
  $('#frm_profile').validate({
    rules: {
      user_img:{
        required: true,
      },
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
      position: {
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
      address: {
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
      user_img: {
        required: "ກະລຸນາເລືອກຮູບພາບ"
      },
      username: {
        required: "ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ",
      },
      passwd: {
        required: "ກະລຸນາປ້ອນລະຫັດຜ່ານ",
        minlength: "ຫະຫັດຜ່ານຕ້ອງມີຢ່າງໜ້ອຍ 6 ໂຕ"
      },
      age: {
        required: "ກະລຸນາປ້ອນອາຍຸ",
        minlength: "ອາຍຸຕ້ອງມີຢ່າງໜ້ອຍ 2 ໂຕເລກ"
      },
      bithdate: {
        required: "ກະລຸນາປ້ອນວັນເດືອນປີເກີດ",
      },
      position: {
        required: "ກະລຸນາປ້ອນຕຳແໜ່ງວຽກ",
      },
      mail: {
        required: "ກະລຸນາປ້ອນອີເມວ",
        email: "ກະລຸນາປ້ອນອີເມວໃຫ້ຖືກຕ້ອງ"
      },
      tel: {
        required: "ກະລຸນາປ້ອນເບີໂທ",
        minlength: "ເບີໂທຂອງທ່ານຕ້ອງມີຢ່າງໜ້ອຍ 7 ໂຕເລກ"
      },
      address: {
        required: "ກະລຸນາປ້ອນທີ່ຢູ່ຂອງທ່ານ"
      },
      major: {
        required: "ກະລຸນາປ້ອນສາຂາທີ່ຮຽນ"
      },
      youth_date: {
        required: "ກະລຸນາປ້ອນວັນເດືອນປີເຂົ້າຊາວໜຸ່ມ"
      },
      labor_date: {
        required: "ກະລຸນາປ້ອນວັນເດືອນປີເຂົ້າກຳມະບານ"
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