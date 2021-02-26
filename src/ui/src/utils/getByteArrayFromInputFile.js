const getByteArrayFromInputFile = selector =>
  new Promise((resolve, reject) => {
    const file = document.querySelector(selector).files[0];
    const reader = new FileReader();

    reader.onload = () => {
      resolve(Array.from(new Uint8Array(reader.result)));
    };

    reader.onerror = reject;

    reader.readAsArrayBuffer(file);
  });

export default getByteArrayFromInputFile;
