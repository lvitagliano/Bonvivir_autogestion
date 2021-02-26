const validateCardNumber = value => {
  if (/[^0-9-\s]+/.test(value)) {
    return false;
  }

  const formatValue = value.replace(/\D/g, '');
  let nCheck = 0;
  let nDigit = 0;
  let bEven = false;

  for (let n = formatValue.length - 1; n >= 0; n -= 1) {
    const cDigit = formatValue.charAt(n);

    nDigit = parseInt(cDigit, 10);

    if (bEven) {
      nDigit *= 2;

      if (nDigit > 9) {
        nDigit -= 9;
      }
    }

    nCheck += nDigit;
    bEven = !bEven;
  }

  return nCheck % 10 === 0;
};

export default validateCardNumber;
