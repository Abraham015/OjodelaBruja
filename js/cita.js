function confirmar() {
  const expresionesRegulares = {
    correo: new RegExp(
      /^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9_.+-]+@[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9-]+\.[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9-.]+$/
    ),
    pass: new RegExp(/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{5,15}$/),
    num: new RegExp(/^\d{2}\d{8}$/),
  };
  var valor_name, valor_mail, valor_numero, valor_fecha;
  var valor_rut_mail, valor_rut_name, valor_rut_numero, valor_rut_fecha;
  valor_name = $("#Nombre");
  valor_mail = $("#Mail");
  valor_numero = $("#Numero");
  valor_fecha = $("#fecha");
  valor_rut_name = valor_name.val();
  valor_rut_mail = valor_mail.val();
  valor_rut_numero = valor_numero.val();
  valor_rut_fecha = valor_fecha.val();
  if (
    valor_rut_name.trim() === "" &&
    valor_rut_mail.trim() === "" &&
    valor_rut_numero.trim() === ""
  ) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Los campos están vacíos, intentalo de nuevo",
    });
    return false;
  } else {
    if (valor_rut_name.trim() === "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "El campo nombre está vacío, intentalo de nuevo",
      });
      return false;
    } else {
      if (valor_rut_mail.trim() === "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "El campo correo está vacío, intentalo de nuevo",
        });
        return false;
      } else {
        const mail = document.getElementById("Mail");
        const textoMail = mail.value;
        if (!expresionesRegulares.correo.test(textoMail)) {
          // Si es inválido, regresamos el mensaje de error.
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "El campo correo no tiene un formato correcto, intentalo de nuevo",
          });
          return false;
        } else {
          if (valor_rut_numero.trim() === "") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "El campo numero esta vacio, intentalo de nuevo",
            });
            return false;
          } else {
            const numero = document.getElementById("Numero");
            const textoNumero = numero.value;
            if (!expresionesRegulares.num.test(textoNumero)) {
              // Si es inválido, regresamos el mensaje de error.
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "El campo numero no tiene un formato correcto, intentalo de nuevo",
              });
              return false;
            } else {

            }
          }
        }
      }
    }
  }
  /*if (valor_rut_mail.trim() === "" && valor_rut_pass.trim() === "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Los campos están vacíos, intentalo de nuevo",
      });
      return false;
    } else {
      if (valor_rut_mail.trim() === "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "El campo usuario está vacío, intentalo de nuevo",
        });
        return false;
      } else {
        if (valor_rut_pass.trim() === "") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "El campo contraseña está vacío, intentalo de nuevo",
          });
          return false;
        } else {
          console.log("Si entra");
          return true;
        }
      }
    }*/
}

$(document).ready(function () {
  var boton_rut;
  boton_rut = $("#Iniciar");
});
