const validateCuit = cuit => {
  if (!cuit) {
    return false;
  }

  const cuitStr = cuit.toString().replace(/\D/g, '');

  if (cuitStr.length !== 11) {
    return false;
  }

  let acumulado = 0;
  const digitos = cuitStr.split('');
  const digito = digitos.pop();

  for (let i = 0; i < digitos.length; i += 1) {
    acumulado += digitos[9 - i] * (2 + (i % 6));
  }

  let verif = 11 - (acumulado % 11);

  if (verif === 11) {
    verif = 0;
  } else if (verif === 10) {
    verif = 9;
  }

  if (Number(digito) !== Number(verif)) {
    return false;
  }

  const validCheckDigits = ['20', '23', '27', '30', '33'];

  return validCheckDigits.indexOf(cuit.substr(0, 2)) !== -1;
};

export default validateCuit;
