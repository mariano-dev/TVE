(function ($) {
  // Oculto errores del contactForm
  $('.contactNameError').css('display', 'none');
  $('.contactPhoneError').css('display', 'none');
  $('.contactAreaCodeError').css('display', 'none');
  $('.countryCodeError').css('display', 'none');
  $('.contactEmailError').css('display', 'none');
  $('.contactMessageError').css('display', 'none');
  jQuery('.loader').hide();

  var element = document.getElementById('submitReservation');
  if (element) {
    element.addEventListener('click', function () {
      console.log('Starting AJAX');
      validateReservation();

      if (reservationValidated === false) {
        console.log('Validation FALSE, goodBye AJAX');
        return false;
      }

      var start = $('#start').val().trim();
      var end = $('#end').val().trim();
      var name = $('#name').val().trim();
      var countryCodeWithPlusSign = $('#countryCode').val().trim();
      var countryCode = countryCodeWithPlusSign.replace(/\+/g, '');
      var areaCode = $('#areaCode').val().trim();
      var phoneNumber = $('#phone').val().trim();
      var completePhoneNumber = countryCode + areaCode + phoneNumber;

      console.log(completePhoneNumber);

      var email = $('#mail').val().trim();
      var date = datePicker;
      var passengers = $('#passengers').val().trim();
      var travelInfo = $('#travel-panel').html();
      var travelPrice = price;
      // .replace(/,/g, '.');

      var dataTravelDistance = travelDistance.replace(/,/g, '.');

      function cleanSpecialCharacters(data) {
        data = data.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        data = encodeURIComponent(data);
        return data;
      }

      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success m-3',
          cancelButton: 'btn btn-outline-danger m-3',
        },
        buttonsStyling: false,
      });

      var text =
        '<p align="left"><strong>Nombre : </strong>' +
        name +
        '</p>' +
        '<p align="left"><strong>Telefono : </strong>' +
        countryCodeWithPlusSign +
        areaCode +
        phoneNumber +
        '</p>' +
        '<p align="left"><strong>Email : </strong>' +
        email +
        '</p>' +
        '<p align="left"><strong>Fecha : </strong>' +
        date +
        ' hs' +
        '</p>' +
        '<p align="left"><strong>Pasajeros : </strong>' +
        passengers +
        '</p>' +
        '<p align="left"><strong>Origen : </strong>' +
        start +
        '</p>' +
        '<p align="left"><strong>Destino : </strong>' +
        end +
        '</p>' +
        '<hr><p align="left"><strong>Resumen de viaje :</strong>' +
        travelInfo +
        '</p>';

      swalWithBootstrapButtons
        .fire({
          title: 'Confirmar reserva?',
          html: '<hr>' + text,
          icon: 'question',
          width: '500px',
          showCancelButton: true,
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Si, confirmar reserva',
          cancelButtonText: 'No, cancelar',
          reverseButtons: true,
          showClass: {
            popup: 'animated fadeInDown faster',
          },
          hideClass: {
            popup: 'animated fadeOutUp faster',
          },
        })
        .then((result) => {
          jQuery('.loader').show();

          var mailName = name;
          var mailStart = start;
          var mailEnd = end;
          var mailDate = date;

          name = cleanSpecialCharacters(name);
          start = cleanSpecialCharacters(start);
          end = cleanSpecialCharacters(end);
          date = cleanSpecialCharacters(date);
          travelInfo = cleanSpecialCharacters(travelInfo);

          if (result.value) {
            $.ajax({
              url: script_vars.ajaxurl,
              method: 'POST',
              data: {
                action: 'ajax_test',
                mailName: mailName,
                mailStart: mailStart,
                mailEnd: mailEnd,
                mailDate: mailDate,
                dataStart: start,
                dataEnd: end,
                dataName: name,
                dataPhone: completePhoneNumber,
                dataEmail: email,
                dataDate: date,
                dataPassengers: passengers,
                dataTravelInfo: travelInfo,
                dataPrice: travelPrice,
                dataDistance: dataTravelDistance,
              },
              success: function (resultado) {
                jQuery('.loader').hide();
                swalWithBootstrapButtons.fire({
                  title: 'Reserva Confirmada',
                  html:
                    'Le enviaremos un mensaje de WhatsApp con la confirmación de la reserva y los datos de la unidad asignada para su viaje.',
                  icon: 'success',
                  showCancelButton: false,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  confirmButtonText: 'OK',
                  reverseButtons: true,
                  showClass: {
                    popup: 'animated fadeInDown faster',
                  },
                  hideClass: {
                    popup: 'animated fadeOutUp faster',
                  },
                });

                hideMapAndReservationForm();
                resetFormsValues();
                jQuery('#submit').show();
              },
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            jQuery('.loader').hide();

            // console.log('antes de reseteo');
            resetFormsValues();
            jQuery('#submit').show();

            swalWithBootstrapButtons.fire({
              title: 'Reserva cancelada',
              html: '',
              icon: 'error',
              allowOutsideClick: false,
              allowEscapeKey: false,
              showCancelButton: false,
              confirmButtonText: 'OK',
              reverseButtons: true,
              showClass: {
                popup: 'animated fadeInDown faster',
              },
              hideClass: {
                popup: 'animated fadeOutUp faster',
              },
            });
          }
        });
    });
  }

  var header = document.querySelector(
    '#site-header > div.middle-header > div > div > div.col-lg-9.col-md-9.col-12'
  );
  if (header) {
    header.addEventListener('click', function () {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger',
        },
        buttonsStyling: true,
      });

      swalWithBootstrapButtons
        .fire({
          title: 'Como desea contactarnos?',
          text: 'Llamada telefónica o mensaje de WhatsApp?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'WhatsApp',
          cancelButtonText: 'Llamar',
          confirmButtonColor: '#1ca54f',
          cancelButtonColor: '#127ccc',
          reverseButtons: true,
        })
        .then((result) => {
          if (result.value) {
            location.href = 'https://wa.me/541134509497';
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            location.href = 'tel:541134509497';
          }
        });
    });
  }

  var element1 = document.getElementById('submitContact');
  if (element1) {
    element1.addEventListener('click', function () {
      validateContact();

      if (contactValidated === false) {
        console.log('Contact FALSE, goodBye AJAX');
        return false;
      }
      jQuery('.loader').show();
      var contactName = $('#contactName').val().trim();
      var contactPhone = $('#contactPhone').val().trim();
      var countryCode = $('#countryCode').val().trim();
      var contactAreaCode = $('#areaCode').val().trim();
      var fullContactNumber = countryCode + contactAreaCode + contactPhone;
      var contactEmail = $('#contactEmail').val().trim();
      var contactMsg = $('#contactMessage').val();
      contactMsg = contactMsg.replace(/\n/g, '<br>\n');

      $.ajax({
        url: send_contact.ajaxurl,
        method: 'POST',
        data: {
          action: 'ajax_contact_test',
          dataContactName: contactName,
          dataContactPhone: fullContactNumber,
          dataContactEmail: contactEmail,
          dataContactMsg: contactMsg,
        },
        success: function (resultado) {
          jQuery('.loader').hide();

          resetContactFormsValues();
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success m-3',
              cancelButton: 'btn btn-outline-danger m-3',
            },
            buttonsStyling: false,
          });
          swalWithBootstrapButtons.fire({
            title: 'Mensaje enviado',
            html:
              'Muchas gracias por ponerse en contacto con nosotros, en la brevedad le responderemos.',
            icon: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            reverseButtons: true,
            showClass: {
              popup: 'animated fadeInDown faster',
            },
            hideClass: {
              popup: 'animated fadeOutUp faster',
            },
          });
        },
      });
    });

    var contactErrors = [];
    var contactValidated = false;
    function validateContact() {
      resetContactFormErrors();
      validateContactName();
      validateAreaCode();
      validateContactPhone();
      validateContactEmail();
      validateContactMsg();
      printContactErrors();
      console.log(contactValidated);

      if (contactErrors.length <= 0) {
        console.log('reservation OK');
        contactValidated = true;
        console.log(contactValidated);
        return true;
      }
      console.log('Contact BAD');
      contactValidated = false;
      console.log(contactValidated);
      return false;
    }

    function isEmpty(value) {
      // console.log(value);
      if (!value) {
        return true;
      }
      if (value.length > 0) {
        return false;
      } else {
        return true;
      }
    }

    function isValidName(value) {
      var minLenght = 3;
      var nameLenght = value.length;
      if (nameLenght < minLenght) {
        return false;
      } else {
        return true;
      }
    }

    function isValidMsg(value) {
      var minLenght = 10;
      var msgLenght = value.length;
      if (msgLenght < minLenght) {
        return false;
      } else {
        return true;
      }
    }

    function validateContactName() {
      var value = $('#contactName').val().trim();
      if (isEmpty(value) || !isValidName(value)) {
        contactErrors.push({
          fieldName: 'contactName',
          errorMessage:
            '- El nombre no es válido, porfavor ingrese al menos 3 caracteres.',
        });
        return false;
      }
      console.log('Name validated');
    }

    function validateAreaCode() {
      var areaCode = jQuery('#areaCode').val().trim();
      if (isEmpty(areaCode)) {
        contactErrors.push({
          fieldName: 'contactAreaCode',
          errorMessage: '- El código de area es invalido.',
        });
        return false;
      }
      console.log('Area Code validated');
    }

    function validateContactPhone() {
      var phoneNumber = jQuery('#contactPhone').val().trim();
      var areaCode = jQuery('#areaCode').val().trim();
      var fullNumberPhone = areaCode + phoneNumber;
      // var nano = new libphonenumber.parsePhoneNumberFromString(fullNumberPhone);
      // alert(nano.isPossible());
      var minLength = 10;
      console.log(fullNumberPhone);
      console.log(fullNumberPhone.length < minLength);

      if (
        isEmpty(phoneNumber) ||
        fullNumberPhone.length < minLength ||
        fullNumberPhone.length > minLength
      ) {
        contactErrors.push({
          fieldName: 'contactPhone',
          errorMessage: '- El numero de telefono no es válido.',
        });
        return false;
      } else {
        console.log('Contact Phone validated');
        return true;
      }
    }

    function validateContactEmail() {
      var value = $('#contactEmail').val().trim();
      if (isEmpty(value) || !isValidEmail(value)) {
        contactErrors.push({
          fieldName: 'contactEmail',
          errorMessage: '- El Email no contiene un formato válido.',
        });
        return false;
      }
      console.log('Email validated');
    }

    function isValidEmail(value) {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var regexPattern = new RegExp(regex);
      return regexPattern.test(value);
    }

    function printContactErrors() {
      var html = '';
      if (contactErrors.length > 0) {
        for (var i = 0, len = contactErrors.length; i < len; i++) {
          var item = contactErrors[i];
          var fieldName = item.fieldName;
          html = html += '<b>' + item.errorMessage + '</b><br>';
          $('#' + fieldName).css('border-color', '#ea7600');
          $('.' + fieldName + 'Error').css('display', 'block');
          $('.' + fieldName + 'Error').css('color', '#ea7600');
        }
      }
    }

    function validateContactMsg() {
      var value = $('#contactMessage').val().trim();
      if (isEmpty(value) || !isValidMsg(value)) {
        contactErrors.push({
          fieldName: 'contactMessage',
          errorMessage:
            '- El mensaje no es válido, porfavor ingrese al menos 10 caracteres.',
        });
        return false;
      }
      console.log('msg validated');
    }

    function resetContactFormErrors() {
      $('.contactNameError').css('display', 'none');
      $('.contactPhoneError').css('display', 'none');
      $('.contactEmailError').css('display', 'none');
      $('.contactMsgError').css('display', 'none');
      $('#contactName').css('border-color', '#007b7e');
      $('#contactPhone').css('border-color', '#007b7e');
      $('#areaCode').css('border-color', '#007b7e');
      $('#countryCode').css('border-color', '#007b7e');
      $('#contactEmail').css('border-color', '#007b7e');
      $('#contactMessage').css('border-color', '#007b7e');
      console.log('Contact Form Errors Reset - OK');
      contactErrors = [];
      return true;
    }

    function resetContactFormsValues() {
      jQuery('#contactName').val('');
      jQuery('#contactPhone').val('');
      jQuery('#areaCode').val('');
      jQuery('#contactEmail').val('');
      jQuery('#contactMessage').val('');
      console.log('Contac Form Reset Values  - OK');
    }
  }

  document.querySelector(
    '#site-header > div.middle-header > div > div > div.col-lg-9.col-md-9.col-12'
  );
})(jQuery);
