function confirmar() {
  const expresionesRegulares = {
    correo: new RegExp(
      /^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9_.+-]+@[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9-]+\.[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ0-9-.]+$/
    ),
    pass: new RegExp(/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{5,15}$/),
  };
  var valor_mail, valor_pass;
  var valor_rut_mail, valor_rut_pass;
  valor_mail = $("#Usuario");
  valor_pass = $("#Password");
  valor_rut_mail = valor_mail.val();
  valor_rut_pass = valor_pass.val();
  if (valor_rut_mail.trim() === "" && valor_rut_pass.trim() === "") {
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
  }
}

$(document).ready(function(){
    var boton_rut;
    boton_rut = $('#Iniciar');

});